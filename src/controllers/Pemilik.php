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
            "title" => "Chat",
            "contact" => $this->model->getContact(),
        ]);
    }

    function editKost($params = []) 
    {
        if ($this->isLogInPemilik()) 
        {
            $this->view("Pemilik/kostedit", [
                "title" => "Edit Kost",
                "kost" => $this->model->getKost($params[0]),
                "fasilitas_kamar" => $this->model->getFasilitasKamar(),
                "fasilitas_bersama" =>  $this->model->getFasilitasBersama(),
                "fasilitas_kamar_info" => $this->model->getFasilitasKamarByID($params[0]),
                "fasilitas_bersama_info" => $this->model->getFasilitasBersamaByID($params[0])
            ]);
        }
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
        if ($this->isLogInPemilik())
        {
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
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
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

    function updateGambar($params = [])
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $violations = [];

    
            
            $jumlahGambar = $this->model->getJumlahGambarKost($_POST['id_kost']);

           
            if (isset($_FILES['gambar']) and count($_FILES['gambar']['name']) + ($jumlahGambar - count(json_decode($_POST['id_del'], true)))  >= 5)
            {
                $violation = $this->validator->validateGambar($_FILES['gambar']);
                if (count($violation) > 0) {

                    $violations['gambar'] = $violation[0][0]->getMessage();
                }
            } elseif (($jumlahGambar - count(json_decode($_POST['id_del'], true)))  >= 5) {
                $this->model->updateGambar(NULL, $_POST);
                header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
            } else {
                $violations['gambar'] = 'gambar Minimal 5';
            }

            if (count($violations) < 1)
            {
                $this->model->updateGambar($_FILES, $_POST);
                header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
            }
            else
            {
                var_dump($violations);
            }
        }
    }

    function updateBaseInfo($params = [])
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $violations = [];

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

            if (count($violations) < 1)
            {
                $this->model->updateBaseInfo($_POST);
                header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
            }
        }
    }

    function updateLatLong($params = [])
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $violations = [];
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

            if (count($violations) < 1)
            {
                $this->model->updateLatLong($_POST);
                $_SESSION['berhasil-update'] = "Berhasil menupdate lokasi kost";
                header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
            }
        }
    }

    function updateFasilitas($params = [])
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $violations = [];
            $fasilitas = json_decode($_POST['fasilitas'], true);
            $fasilitasDel = json_decode($_POST['fasilitasDel'], true);
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



            if (count($violations) < 1){
                $_SESSION['berhasil-update'] = "Berhasil mengupdate fasilitas";
                $this->model->updateFasilitas($fasilitas, $fasilitasDel, $_POST['id_kost']);
                header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
            }
        }

    }
    
    function getMessage($params = [])
    {

    }

    function chatting($params = [])
    {
        $this->view("Pemilik/chatting", [
            "title" => "Chat",
            "id_user" => $params[0],
            "chat" => $this->model->getChat($params[0])
        ]);
    }

    function sendMessage($params = [])
    {
        
        $data = json_decode(file_get_contents('php://input'), true);
        $this->model->sendMessage($data['message'], $params[0]);
        echo json_encode("SUCCESS");
    }
}