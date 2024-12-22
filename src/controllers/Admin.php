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

    function pengumuman($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $this->view("Admin/pengumuman", [
                "title" => "Pengumuman",
                "active-menu" => "pengumuman"
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function loginAdmin($params = [])
    {
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
                ])
            ]);

            // Validasi password
            $violationPassword = $validator->validate($password, [
                new Assert\NotBlank(["message" => "Password tidak boleh kosong"]),
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
                $_SESSION["errors"] = [$errors[0]];
                header("Location: /" . PROJECT_NAME . "/admin/login");
                return;
            }

            // Login berhasil, set session
            $_SESSION["is_admin_login"] = true;
            $_SESSION["username_admin"] = $username;
            $_SESSION["role_admin"] = "admin";
            $_SESSION["id_user"] = ($this->model->getData($username))["id_admin"];

            // Redirect ke dashboard admin
            header("Location: /" . PROJECT_NAME . "/admin/dashboard");
            return;
        }

        // Jika bukan POST, tampilkan halaman login admin
        $this->view("Admin/login", [
            "title" => "Admin Login"
        ]);
    }

    function logOut()
    {
        if ($this->isLogInAdmin())
        {
            session_destroy();
            header("Location: /" . PROJECT_NAME . "/Admin/login");
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function logPengumuman($params = [])
    {
        if ($this->isLogInAdmin())
        {
            if (isset($params[0]) and $params[0] == "cari" and $_SERVER['REQUEST_METHOD'] == "POST") {
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

            } else {
                $_SESSION['error'] = ['Silakan Log in'];
                header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
            }
    }

    function akunUser($params = [])
    {
        if ($this->isLogInAdmin()) {
            $this->view("Admin/akunuser", [
                "title" => "Data User",
                "active-menu" => "akunuser",
                "user" => $this->model->getAllUser()
            ]);
        }
    }


    function dashboard($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $dataUser = $this->model->getAllUser();
            $jumlahUser = $this->model->getJumlahUser();
            $getAllTransaksi = $this->model->getAllTransaksi();
            $jumlahTransaksi = $this->model->getTotalTransaksi();
            $transaksiBerhasil = $this->model->getTotalBerhasil();
            $transaksiGagal = $this->model->getTotalGagal();
            $this->view("Admin/halaman_utama", [
                "title" => "dashboard",
                "active-menu" => "dashboard",
                "user" => $dataUser,
                "jumlahUser" => $jumlahUser,
                "transaksi" => $getAllTransaksi,
                "totalTransaksi" => $jumlahTransaksi,
                "transaksiBerhasil" => $transaksiBerhasil,
                "transaksiGagal" => $transaksiGagal
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function laporan($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $dataLaporan = $this->model->getAllLaporan();
            $this->view("Admin/laporan", [
                "title" => "laporan",
                "active-menu" => "laporan",
                "laporan" => $dataLaporan
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function pertanyaan($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $this->view("Admin/pertanyaan", [
                "title" =>  "pertanyaan",
                "active-menu" => "pertanyaan",
                "dataPertanyaan" => $this->model->getPertanyaan()
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function berita($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $dataBerita = $this->model->getBerita();
            $this->view("Admin/berita", [
                "title" => "Berita",
                "active-menu" => "berita",
                "berita" => $dataBerita
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function tambahBerita($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $this->view("Admin/tambahBerita", [
                "title" => "Tambah Berita",
                "active-menu" => "berita"
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function balaspertanyaan($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $idPertanyaan = $_POST['idPertanyaan'];
            $this->view("Admin/balaspertanyaan", [
                "title" => "Balas Pertanyaan",
                "active-menu" => "pertanyaan",
                "pertanyaan" => $this->model->getPertanyaanById($idPertanyaan)
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function mengisiBalasan($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $idPertanyaan = $_POST['idPertanyaan'];
            $isiBalasan = $_POST['balasan'];
            $tanggalBalasan = $_POST['hiddenDateTime'];
            $this->model->mengisiBalasan($idPertanyaan, $isiBalasan);
            header("Location: /" . PROJECT_NAME . "/Admin/pertanyaan");
            return;
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function editberita($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $idBerita = $_POST['idBerita']; // Ambil ID Berita dari parameter
            $this->view("Admin/editberita", [
                "title" => "Edit Berita",
                "active-menu" => "berita",
                "berita" => $this->model->getBeritaById($idBerita) // Panggil berita berdasarkan ID
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }


    function updateBerita()
    {
        if ($this->isLogInAdmin())
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->model->updateBerita($_FILES, $_POST);
                header("Location: /" . PROJECT_NAME . "/admin/berita");
            }
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }


    function insertBerita($params = [])
    {
        if ($this->isLogInAdmin())
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->model->insertBerita($_FILES, $_POST);
                header("Location: /" . PROJECT_NAME . "/admin/berita");
            }
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }


    function detailLaporan($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $idLaporan = $_POST['idLaporan']; // Ambil ID Berita dari parameter
            $this->view("Admin/detailLaporan", [
                "title" => "detail",
                "active-menu" => "laporan",
                "laporan" => $this->model->getLaporanById($idLaporan) // Panggil berita berdasarkan ID
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }


    function uploadPengumuman($params = [])
    {
        if ($this->isLogInAdmin())
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $this->model->uploadPengumuman($_POST);
                header("Location: /" . PROJECT_NAME . "/admin/pengumuman");
            }
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }


    function pembayaran($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $this->view("Admin/pembayaran", [
                "tittle" => "pembayaran",
            ]);
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function ban($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $this->model->banUser($params[0]);
            header("Location: /" . PROJECT_NAME . "/admin/akunuser");
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function unBan($params = [])
    {
        if ($this->isLogInAdmin())
        {
            $this->model->unBanUser($params[0]);
            header("Location: /" . PROJECT_NAME . "/admin/akunuser");
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }

    function hapusBerita()
    {
        if ($this->isLogInAdmin())
        {
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $idBerita = $_POST['idBerita'];
                $this->model->hapusBerita($idBerita);
            }
        } else {
            $_SESSION['error'] = ['Silakan Log in'];
            header("Location: /" . PROJECT_NAME . "/admin/loginadmin");
        }
    }


}
