<?php

require_once "Controller.php";
require_once "./models/PemilikModel.php";
require_once "./helper/kostValidator.php";

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Pemilik extends Controller {
    public $default = "dashboard";
    private $model;
    private $validator;

    function __construct() {
        $this->model = new PemilikModel();
        $this->validator = new KostValidator();
    }

    function dashboard() {
        if ($this->isLogInPemilik())
        {
            $this->view("Pemilik/dashboard", [
                "title" => "dashboard"
            ]);
        }
        else 
        {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function review() {
        $this->view("Pemilik/review", [
            "title" => "review" 
        ]);
    }

    function chat($params = []) {
        $this->view("Pemilik/chat", [
            "title" => "Chat"
        ]);
    }

    function editKost($params = []) 
    {
        $this->view("Pemilik/kostedit", [
            "title" => "Edit Kost"
        ]);
    }

    function regPemilik($params = []) {
        $this->view("Pemilik/regPemilik", [
            "title" => "regPemilik"
        ]);
    }

    function transaksiHistory($params = [])
    {
        $this->view("Pemilik/transaksiHistory", 
        [
            "title" => "Transaksi History"
        ]);
    }

    function iklan($params = [])
    {
        $this->view("Pemilik/iklan", [
            'title' => "Iklan"
        ]);
    }

    function halamanutama($params = []) {
        $this->view("Pemilik/halamanutama", [
            "title" => "halamanutama"
        ]);
    }
    function tambahkost($params = []) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $violations = [];
            
            if (isset($_FILES['gambar']) and count($_FILES['gambar']['name']) >= 5)
            {
                $violation = $this->validator->validateGambar($_FILES['gambar']);
                if (count($violation) > 0) {

                    $violations['gambar'] = $violation[0][0]->getMessage();
                }
                
            } else {
                $violations['gambar'] = 'gambar Minimal 5';

            }
            // die();

            
            $violation = $this->validator->validateNamaKost($_POST['nama']);
            if (count($violation) > 0)
            {
                $violations['nama'] = $violation[0]->getMessage();
            }
            
            $violation = $this->validator->validateHargaKost($_POST['harga']);
            if (count($violation) > 0)
            {
                $violations['harga'] = $violation[0]->getMessage();
            }

            $violation = $this->validator->validateTipeKost($_POST['tipe']);
            if (count($violation) > 0)
            {
                $violations['tipe'] = $violation[0]->getMessage();
            }

            $fasilitas = json_decode($_POST['fasilitas'], true);

            foreach ($fasilitas['kamar'] as $f => $value)
            {
                $violation = $this->validator->validateFasilitasKamarKost($f, $this->model->getFasilitasKamarID());
                if (count($violation) > 0)
                {
                    $violations['fasilitas_kamar'] = $violation[0]->getMessage();
                    break;
                }
            }

            foreach ($fasilitas['bersama'] as $f => $value)
            {
                $violation = $this->validator->validateFasilitasBersamaKost($f, $this->model->getFasilitasBersamaID());
                if (count($violation) > 0)
                {
                    $violations['fasilitas_bersama'] = $violation[0]->getMessage();
                    break;
                }
            }

            $violation = $this->validator->validateLatKost($_POST['lat']);

            if (count($violation) > 0)
            {
                $violations['lat'] = $violation[0]->getMessage();
            }

            $violation = $this->validator->validateLatKost($_POST['long']);
            if (count($violation) > 0)
            {
                $violations['long'] = $violation[0]->getMessage();
            }

            if (count($violations) > 0)
            {
                $_SESSION["errors_tambahkost"] = $violations;
                $_SESSION['data_sebelumnya'] = $_POST;
                header("Location: /". PROJECT_NAME . "/pemilik/tambahkost");
            }
            else 
            {
                $_SESSION['success_tambahkost'] = "Berhasil Menambahkan Kost";
                $this->model->tambahKost($_FILES, $_POST);
                header("Location: /" . PROJECT_NAME . "/pemilik/tambahkost");
            }

            
        } else {
            $this->view("Pemilik/tambahkost", [
                "title" => "tambahkost",
                "fasilitas_kamar" => $this->model->getFasilitasKamar(),
                "fasilitas_bersama" =>  $this->model->getFasilitasBersama()
            ]);
        }
    }
    function statistik($params = []) {
        $this->view("Pemilik/statistik", [
            "title" => "statistik"
        ]);
    }

    function kosts($params = []) {
        $this->view("Pemilik/kosts", [
            "title" => "Kosts",
            "kosts" => $this->model->getMyKost(),
        ]);
    }
    function pembayaran($params = []) {
        $this->view("Pemilik/pembayaran", [
            "title" => "pembayaran",
            "pembayaran" => $this->model->getMyKost(),
        ]);
    }

    function profile($params = [])
    {
        if ($this->isLogInPemilik())
        {
            $this->view("Pemilik/profile", [
                "title" => "Profile",
                "user" => $this->model->getDataUser($_SESSION["username"])
            ]);
        }
    }

    
}