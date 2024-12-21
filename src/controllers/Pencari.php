<?php

require_once "Controller.php";
require_once "./models/PencariModel.php";


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Pencari extends Controller {
    public $default = "homepage";
    private $model; 

    function __construct() {
        $this->model = new PencariModel();
    }

    function homepage($params = []) {
        if ($this->isLogInPencari()) 
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $nama_lokasi = isset($_POST['lokasi_nama'])? $_POST['lokasi_nama'] : '';
                $tipe = isset($_POST['tipe'])? $_POST['tipe'] : '';
                if ($nama_lokasi == "" && $tipe == ""){
                    $data = $this->model->getAllKost();
                    $profile = $this->model->getProfie($_SESSION['id_user']);
                } else {
                    $data = $this->model->filterKost($nama_lokasi, $tipe);
                    $profile = $this->model->getProfie($_SESSION['id_user']);
                }
            } else {
                $data = $this->model->getAllKost();
                $profile = $this->model->getProfie($_SESSION['id_user']);
            }

            if ($profile == []){
                $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
            }
            $this->view("Pencari/homepage", [
                "title" => "Homepage",
                "data" => $data,
                "profile" => $profile
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }

    }



    function chat($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/chat", [
                "title" => "Chat",
                "contact" => $this->model->getContact(),
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function regPenyewa($params = []) {
      
        $this->view("Pencari/regPenyewa", [
            "title" => "regPenyewa",
        ]);
       
    }

    function verifikasiKode($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/verifikasiKode", [
                "title" => "verifikasiKode"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function berita($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/berita", [
                "title" => "berita"
                
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
 

    function lupapassword($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/lupapassword", [
                "title" => "lupapassword"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function ubahpassword($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/ubahpassword", [
                "title" => "ubahpassword"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function finishpassword($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/finishpassword", [
                "title" => "finishpassword"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function finishreg($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/finishreg", [
                "title" => "finishreg"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function kodegagal($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/kodegagal", [
                "title" => "kodegagal"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function finishregpemilik($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/finishregpemilik", [
                "title" => "finishregpemilik"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
        
    }
    function homeberita($params = []) {
        if ($this->isLogInPencari()) 
        {
            $profile = $this->model->getProfie($_SESSION['id_user']);
            if ($profile['profile_user'] == ""){
                $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
            }
            $this->view("Pencari/homeberita", [
                "title" => "homeberita",
                "profile" => $profile
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function isiberita($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/isiberita", [
                "title" => "isiberita"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function kostPage($params = []) {
        if ($this->isLogInPencari()) 
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {   
                if(isset($_POST['id_user_favorit'])){

                    $id_user = $_POST['id_user_favorit'];
                    $id_kost = $_POST['id_kost_favorit'];
                    $isFavorited = $_POST['isFavorited'];

                    if ($isFavorited === 'tidak ada') {

                        $this->model->removeFromFavorites($id_user, $id_kost);
                    } else {

                        $this->model->addToFavorites($id_user, $id_kost);
                    }
                    
                    header("Location: /project_paw/pencari/kostPage/$id_kost");
                    exit;
                } else {
                    $kategori = $_POST['kategori_laporan'];
                    $detail = $_POST['detail_laporan'];
                    $id = $_SESSION['id_user'];
                    $id_kost = $_POST['id_kost'];
        
                    $erors = [];
        
                    if (empty($kategori)) {
                        $erors['kategori'] = "Pilih salah satu";
                    } 
        
                    if (empty($detail)) {
                        $erors['detail'] = "inputan tidak boleh kosong";
                    } else if (strlen($detail) <= 10){
                        $erors['detail'] = "inputan harus lebih dari 11 karakter";
                    }
                    
                    if (empty($erors)){
                        $this->model->insertDataLaporan($kategori, $detail, $id, $id_kost);
                        header("Location: /project_paw/pencari/kostPage/$id_kost");
                        exit;
                    }
                }
                
            }
            else 
            {   
                $id = (int) $params[0];
                $data = $this->model->getOneDataKost($id);
            
                $fasilitas = $this->model->getAllFasilitas($id);
                $profile = $this->model->getProfie($_SESSION['id_user']);
                if ($profile == []){
                    $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
                }
                $rekomendasi = $this->model->rekomendasiKost($id);
                $kategori_laporan = $this->model->getKategoriLaporan();
                $id_user = $_SESSION['id_user'];

                $review = $this->model->getAllReview($id);
                $udah_lapor = $this->model->cekPelapor($id_user, $id);
                $cekFavorit = $this->model->cekFavorit($id_user, $id);
                $this->view("Pencari/KostPage", [
                    "title" => "Kost Page",
                    "id" => $id,
                    "data" => $data,
                    "fasilitas" => $fasilitas,
                    "profile" => $profile,
                    "rekomendasi" => $rekomendasi,
                    "kategori_laporan" => $kategori_laporan,
                    "sudah_lapor" => $udah_lapor,
                    "id_user" => $id_user,
                    "check_favorit" => $cekFavorit,
                    "review" => $review,
                    "id_pemilik" => $data[$id]['id_pemilik']
                ]);
            }
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
        
    }
    function kebijakan($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/kebijakan", [
                "title" => "kebijakan"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
    function tentangkami($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/tentangkami", [
                "title" => "tentangkami"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
    function riwayatpemesanan($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/riwayatpemesanan", [
                "title" => "riwayatpemesanan"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }
    function pembayaran($params = []) {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/pembayaran", [
                "title" => "pembayaran"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function favorit($params = []){
        if ($this->isLogInPencari()) 
        {
            $profile = $this->model->getProfie($_SESSION['id_user']);
            if ($profile['profile_user'] == ""){
                $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
            }
            $this->view("Pencari/favorit",[
                "title" => "favorit",
                "profile" => $profile
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function profile($params = []){
        if ($this->isLogInPencari()) 
        {
            $erors = [];
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {   
                $validator = Validation::createValidator();
                $hapus = false;

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
            if ($profile['profile_user'] == ""){
                $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
            }

            $data = $this->model->getAllDataUser($_SESSION['id_user']);
            $this->view("Pencari/profile", [
                "title" => "Profile",
                "data_user" => $data,
                "profile" => $profile,
                "eror" => $erors
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }


    function reviewGambarKost($params = []){
        if ($this->isLogInPencari()) 
        {
            $id = (int) $params[0];
            $gambar = $this->model->getImageKost($id);
            $judul = $this->model->getNamaKost($id);
            $this->view("Pencari/reviewGambarKost", [
                "title" => "ReviewGambarKost",
                "gambar" => $gambar,
                "id" => $id,
                "judul" => $judul,
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function faq($params = []){
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/faq", [
                "title" => "faq"
            ]);
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }


    function getMessage($params = [])
    {   
        
        echo json_encode($this->model->getChat($params[0]));
    }

    
    function chatting($params = [])
    {
        if ($this->isLogInPencari()) 
        {
            $this->view("Pencari/chatting", [
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
        if ($this->isLogInPencari()) 
        {
            $data = json_decode(file_get_contents('php://input'), true);
            $this->model->sendMessage($data['message'], $params[0]);
            echo json_encode("SUCCESS");
        } else {
            header("Location: /" . PROJECT_NAME ."/account/login");
        }
    }

    function getContact()
    {
        echo json_encode($this->model->getContact());
    }

    function notifikasi($params = []){
        $data = $this->model->getPengumuman($_SESSION["id_user"]);
        $this->view("Pencari/notifikasi", [
            "title" => "notifikasi",
            "data" => $data
        ]);
    }
    
}