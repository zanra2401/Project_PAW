<?php

require_once "Controller.php";
require_once "./models/AdminModel.php";

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Admin extends Controller
{
    public $default;
    public $model;

    function __construct()
    {
        $this->model = new AdminModel();
        $this->default = "dashboard";
    }

    function default($params = [])
    {
        echo "DEFAULT";
    }

    function pengumuman($params = [])
    {
        $this->view("Admin/pengumuman", [
            "title" => "Pengumuman", 
            "active-menu" => "pengumuman"
        ]);
    }

    function loginAdmin($params = []) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $validator = Validation::createValidator();
    
            $errors = [];
    
            // Validasi username
            $violationUsername = $validator->validate($username, [
                new Assert\NotBlank(["message" => "Username tidak boleh kosong"]),
                new Assert\Length([
                    "min" => 5,
                    "minMessage" => "Username atau password tidak valid",
                    "max" => 30,
                    "maxMessage" => "Username atau password tidak valid"
                ]),
                new Assert\Regex([
                    'pattern' => '/^[A-Za-z0-9]+$/',
                    'message' => 'Username atau password tidak valid'
                ])
            ]);
    
            // Validasi password
            $violationPassword = $validator->validate($password, [
                new Assert\NotBlank(["message" => "Password tidak boleh kosong"]),
                new Assert\Regex([
                    'pattern' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                    'message' => "Username atau password tidak valid"
                ]),
                new Assert\Length([
                    "min" => 8,
                    "minMessage" => "Username atau password tidak valid"
                ])
            ]);
    
            // Periksa jika ada pelanggaran validasi
            if (count($violationUsername) > 0 || count($violationPassword) > 0) {
                $errors[] = "Username atau password tidak valid";
            }
    
            // Ambil data admin dari database
            $dbUsername = $this->model->getOneData('username_admin', $username, 'admin');
            $hashPass = $this->model->getData($username)['password_admin'];
    
            if ($dbUsername == NULL || $hashPass == NULL) {
                $errors[] = "Username atau password tidak valid";
            }
    
            // Verifikasi password
            if (!password_verify($password, $hashPass)) {
                $errors[] = "Username atau password tidak valid";
            }
    
            // Jika ada error, redirect ke halaman login
            if (count($errors) > 0) {
                $_SESSION["error_login"] = [$errors[0]];
                header("Location: /" . PROJECT_NAME . "/admin/login");
                exit;
            }
    
            // Login berhasil, set session
            $_SESSION["loged_in"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["role_user"] = "admin";
            $_SESSION["id_user"] = ($this->model->getData($username))["id_admin"];
    
            // Redirect ke dashboard admin
            header("Location: /" . PROJECT_NAME . "/admin/dashboard");
            exit;
        }
    
        // Jika bukan POST, tampilkan halaman login admin
        $this->view("Admin/login", [
            "title" => "Admin Login"
        ]);
    }

    function logOut()
    {
        session_destroy();
        header("Location: /" . PROJECT_NAME . "/Admin/login");
    }

    function logPengumuman($params = [])
    {
        if (isset($params[0]) and $params[0] == "cari" and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $this->view("Admin/logPengumuman", [
                "title" => "Pengumumanm Log",
                "active-menu" => "pengumuman",
                "active-sub-menu" => ((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua"),
                "pengumuman" => $this->model->getAllPengumuman($_POST['cari'], true),
            ]);
        } else {
        
            $this->view("Admin/logPengumuman", [
                "title" => "Pengumumanm Log",
                "active-menu" => "pengumuman",
                "active-sub-menu" => ((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua"),
                "pengumuman" => $this->model->getAllPengumuman(((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua"), false)
            ]);
        }
    }

    function akunUser($params = [])
    {
        $this->view("Admin/akunuser", [
            "title" => "Data User",
            "active-menu" => "akunuser"
        ]);
    }


    function dashboard($params = [])
    {
        $this->view("Admin/halaman_utama", [
            "title" => "dashboard",
            "active-menu" => "dashboard"
        ]);
    }

    function laporan($params = [])
    {
        $this->view("Admin/laporan", [
            "title" => "laporan",
            "active-menu" => "laporan"
        ]);
    }

    function pertanyaan($params = [])
    {
        $this->view("Admin/pertanyaan", [
            "title" =>  "pertanyaan",
            "active-menu" => "pertanyaan"
        ]);
    }

    function berita($params = [])
    {
        $this->view("Admin/berita", [
            "title" => "berita",
            "active-menu" => "berita"
        ]);
    }

    function tambahBerita($params = [])
    {
        $this->view("Admin/tambahBerita", [
            "title" => "tambahBerita",
            "active-menu" => "berita"
        ]);
    }

    function balaspertanyaan($params = [])
    {
        $this->view("Admin/balaspertanyaan", [
            "title" => "Balas Pertanyaan",
            "active-menu" => "pertanyaan"
        ]);
    }

    function editberita($params = [])
    {
        $this->view("Admin/editberita", [
            "title" => "Edit Berita",
            "active-menu" => "berita"
        ]);
    }

    function uploadPengumuman($params = [])
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $this->model->uploadPengumuman($_POST);
            header("Location: /" . PROJECT_NAME . "/admin/pengumuman");
        }
    }

}
