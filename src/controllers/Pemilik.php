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

    private $DB;
    function __construct() {
        $this->model = new PemilikModel();
        $this->validator = new KostValidator();
        $this->DB = DataBase::getInstance();
    }

    function dashboard() {
        if ($this->isLogInPemilik())
        {   
            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            $this->view("Pemilik/dashboard", [
                "title" => "dashboard",
                "data_user" => $data
            ]);
        }
        else 
        {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
    
    function review() {
        if ($this->isLogInPemilik()) 
        {
            $this->view("Pemilik/review", [
                "title" => "review" 
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
    
    
    
    function chat($params = []) {
        if ($this->isLogInPemilik()) 
        {
            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            $this->view("Pemilik/chat", [
                "title" => "Chat",
                "contact" => $this->model->getContact(),
                "data_user" => $data
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function editKost($params = []) 
    {
        if ($this->isLogInPemilik()) 
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
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
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
        if ($this->isLogInPemilik()) 
        {
            $trans = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => 10000,
                ),
                'customer_details' => array(
                    'first_name' => 'budi',
                    'last_name' => 'pratama',
                    'email' => 'budi.pra@example.com',
                    'phone' => '08111222333',
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($trans);
            $this->view("Pemilik/iklan", [
                'title' => "Iklan",
                'snapToken' => $snapToken
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function halamanutama($params = []) {
        if ($this->isLogInPemilik()) 
        {
            $this->view("Pemilik/halamanutama", [
                "title" => "halamanutama"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }


    function tambahkost($params = []) {
        if ($this->isLogInPemilik()) 
        {
            $data = $this->model->getAllDataUser($_SESSION['id_user']);
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
                        $_SESSION['success_tambahkost'] = ["Berhasil Menambahkan Kost"];
                        $this->model->tambahKost($_FILES, $_POST);
                        header("Location: /" . PROJECT_NAME . "/pemilik/tambahkost");
                    }
        
                    
                } else {
                    $this->view("Pemilik/tambahkost", [
                        "title" => "tambahkost",
                        "fasilitas_kamar" => $this->model->getFasilitasKamar(),
                        "fasilitas_bersama" =>  $this->model->getFasilitasBersama(),
                        "data_user" => $data
                    ]);
                }
            } else {
                header("Location: /" . PROJECT_NAME ."/account/login");
            }
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
    function statistik($params = []) {
        if ($this->isLogInPemilik()) 
        {
            $this->view("Pemilik/statistik", [
                "title" => "statistik"
            ]);
            
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
        
    }

    function kosts($params = []) {
        if ($this->isLogInPemilik()) 
        {   
            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            if (isset($params[0]) and $params[0] == "cari" and $_SERVER['REQUEST_METHOD'] == "POST") {
                $this->view("Pemilik/kosts", [
                    "title" => "Kosts",
                    "kosts" => $this->model->cariKost($_POST['cari']),
                    "data_user" => $data
                ]);
            }

            $this->view("Pemilik/kosts", [
                "title" => "Kosts",
                "kosts" => $this->model->getMyKost(),
                "data_user" => $data
                
            ]);
            
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function profile($params = [])
    {   
        if ($this->isLogInPemilik())
        {   
            $erors = [];
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {   
                $validator = Validation::createValidator();

                // validasi foto profile

                if (isset($_FILES['ubah_gambar'])){
                    if (!isset($_POST['pp_default'])){
                        $file_path = $_FILES['ubah_gambar']['tmp_name'];
                        if (!empty($file_path)){
                            $mimeType = mime_content_type($file_path);
        
                            if (!in_array($mimeType, ['image/jpeg', 'image/png'])) {
                                $erors['foto_profile'] = 'Gambar harus berformat JPEG atau PNG.';
                            }
                        }
                    }
                } 

                // validasi username

                $username = $_POST["username"];

                $violationUsername = $validator->validate($username, [
                    new Assert\NotBlank(["message" => "Username Tidak Boleh Kosong"]),
                    new Assert\Length([
                        "min" => 5,
                        "minMessage" => "Username Minimal 5 character",
                        "max" => 30,
                        "maxMessage" => "Username Maximal 30 character"
                    ]),
                    new Assert\Regex([
                        'pattern' => '/^[A-Za-z0-9]+$/',
                        'message' => 'Username Hanya mengizinkan Huruf dan angka saja'
                    ])
                ]);

                // validasi nama lengkap 

                $nama_lengkap = $_POST["nama_lengkap"];

                $pattern = "/^[a-zA-Z\s\-]+$/";

                if ($nama_lengkap != ""){
                    if (!preg_match( $pattern, $nama_lengkap)) {
                        $erors['fullname'] = "Nama hanya boleh berupa alfabet";
                    }
                } 

                // jenis kelamin

                $jenis_kelamin = $_POST["kelamin"];

                // validasi email

                $email = $_POST["email"];

                $violatiolnEmail = $validator->validate($email, [
                    new Assert\Email(["message" => "Email Tidak Valid"]),
                    new Assert\NotBlank(["message" => "Email Tidak Boleh Kosong"]),
                ]);
                
                // validasi no hp

                $no_hp = $_POST['no_hp'];

                $pattern = "/^[0-9]+$/";
                if ($no_hp != ""){
                    if (!preg_match($pattern, $no_hp)){
                        $erors['hp'] = "no hp hanya boleh berupa numerik";
                    }
                }

                // input eror username

                foreach ($violationUsername as $violation)
                {
                    $erors['username'] = $violation->getMessage();
                }

                // input eror email

                foreach ($violatiolnEmail as $violation)
                {
                    $erors['email'] = $violation->getMessage();
                }   


                $provinsi = $_POST['provinsi'];
                $kota = $_POST['kota'];


                if (count($erors) == 0) {
                    $this->model->updateProfile($_FILES, $_POST, $_SESSION['id_user']);
                }
            }
            
            $profile = $this->model->getProfie($_SESSION['id_user']);

            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            $this->view("Pemilik/profile", [
                "title" => "Profile",
                "user" => $this->model->getDataUser($_SESSION["username"]),
                "data_user" => $data,
                "profile" => $profile,
                "eror" => $erors
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function updateGambar($params = [])
    {
        if ($this->isLogInPemilik()) 
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
                    $_SESSION['berhasil-update'] = ["Berhasil mengupdate gambar kost"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                }
                else
                {
                    $_SESSION['gagal-update'] = ["Gagal menupdate gambar kost"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                }
            }
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function updateBaseInfo($params = [])
    {
        if ($this->isLogInPemilik()) 
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
                    $_SESSION['berhasil-update'] = ["Berhasil menupdate info kost"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                } else {
                    
                    $_SESSION['gagal-update'] = ["Gagal menupdate info kost"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                }
            }
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function updateLatLong($params = [])
    {
        if ($this->isLogInPemilik()) 
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
                    $_SESSION['berhasil-update'] = ["Berhasil menupdate lokasi kost"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                } else {
                    
                    $_SESSION['gagal-update'] = ["gagal menupdate lokasi kost"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                }
            }
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function updateFasilitas($params = [])
    {
        if ($this->isLogInPemilik()) 
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
                    $_SESSION['berhasil-update'] = ["Berhasil mengupdate fasilitas"];
                    $this->model->updateFasilitas($fasilitas, $fasilitasDel, $_POST['id_kost']);
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                } else {
                    
                    $_SESSION['gagal-update'] = ["Gagal mengupdate fasilitas"];
                    header("Location: /" . PROJECT_NAME . "/pemilik/editkost/{$_POST['id_kost']}");
                }
            }
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }

    }

    function getMessage($params = [])
    {   
        if ($this->isLogInPemilik()) 
        {   
            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            $this->view("Pemilik/getmessage", [
                "title" => "Chat",
                "data_user" => $data
            ]);
            
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
        echo json_encode($this->model->getChat($params[0]));
    }

    function chatting($params = [])
    {
        if ($this->isLogInPemilik()) 
        {
            $this->view("Pemilik/chatting", [
                "title" => "Chat",
                "id_user" => $params[0],
                "user" => $this->model->getUserById($params[0]),
                "chat" => $this->model->getChat($params[0]),
                "contact" => $this->model->getContact(),
            ]);
            
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function sendMessage($params = [])
    {
        if ($this->isLogInPemilik()) 
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $this->model->sendMessage($data['message'], $params[0]);
            echo json_encode("SUCCESS");
        }
    }

    function getAllDataUser($id)
    {
        $data = [];
        $this->DB->query("SELECT username_user, email_user, nama_user, no_HP_user, jenis_kelamin_user, email_user, no_HP_user, provinsi_user, kota_user, profile_user FROM user WHERE id_user = $id");
        $result = $this->DB->getAll();
        foreach($result as $res)
        {
            $data[] = $res;
        }

        return $data;
    }
}