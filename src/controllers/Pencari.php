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
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $nama_lokasi = isset($_POST['lokasi_nama'])? $_POST['lokasi_nama'] : '';
            $tipe = isset($_POST['tipe'])? $_POST['tipe'] : '';
            $data = $this->model->filterKost($nama_lokasi, $tipe);
            $profile = $this->model->getProfie($_SESSION['id_user']);
            if ($profile['profile_user'] == ""){
                $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
            }
            $this->view("Pencari/homepage", [
                "title" => "Homepage",
                "data" => $data,
                "profile" => $profile
            ]);
        } else {
            $data = $this->model->getAllKost();
            $profile = $this->model->getProfie($_SESSION['id_user']);
            if ($profile['profile_user'] == ""){
                $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
            }
            $this->view("Pencari/homepage", [
                "title" => "Homepage",
                "data" => $data,
                "profile" => $profile
            ]);
        }

    }



    function chat($params = []) {
        $this->view("Pencari/chat", [
            "title" => "Chat"
        ]);
    }

    function regPenyewa($params = []) {
        $this->view("Pencari/regPenyewa", [
            "title" => "regPenyewa",
        ]);
    }

    function kode($params = []) {
        $this->view("Pencari/kode", [
            "title" => "kode"
        ]);
    }

    function berita($params = []) {
        $this->view("Pencari/berita", [
            "title" => "berita"
            
        ]);
    }
 

    function lupapassword($params = []) {
        $this->view("Pencari/lupapassword", [
            "title" => "lupapassword"
        ]);
    }

    function ubahpassword($params = []) {
        $this->view("Pencari/ubahpassword", [
            "title" => "ubahpassword"
        ]);
    }

    function finishpassword($params = []) {
        $this->view("Pencari/finishpassword", [
            "title" => "finishpassword"
        ]);
    }

    function finishreg($params = []) {
        $this->view("Pencari/finishreg", [
            "title" => "finishreg"
        ]);
    }

    function kodegagal($params = []) {
        $this->view("Pencari/kodegagal", [
            "title" => "kodegagal"
        ]);
    }

    function finishregpemilik($params = []) {
        $this->view("Pencari/finishregpemilik", [
            "title" => "finishregpemilik"
        ]);
    }
    function homeberita($params = []) {
        $profile = $this->model->getProfie($_SESSION['id_user']);
        if ($profile['profile_user'] == ""){
            $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
        }
        $this->view("Pencari/homeberita", [
            "title" => "homeberita",
            "profile" => $profile
        ]);
    }

    function isiberita($params = []) {
        $this->view("Pencari/isiberita", [
            "title" => "isiberita"
        ]);
    }

    function kostPage($params = []) {
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
            if ($profile['profile_user'] == ""){
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
                "review" => $review
            ]);
        }
        
    }
    function kebijakan($params = []) {
        $this->view("Pencari/kebijakan", [
            "title" => "kebijakan"
        ]);
    }
    function tentangkami($params = []) {
        $this->view("Pencari/tentangkami", [
            "title" => "tentangkami"
        ]);
    }
    function riwayatpemesanan($params = []) {
        $this->view("Pencari/riwayatpemesanan", [
            "title" => "riwayatpemesanan"
        ]);
    }
    function pembayaran($params = []) {
        $this->view("Pencari/pembayaran", [
            "title" => "pembayaran"
        ]);
    }

    function favorit($params = []){
        $profile = $this->model->getProfie($_SESSION['id_user']);
        if ($profile['profile_user'] == ""){
            $profile['profile_user'] = '/public/storage/gambarProfile/pp_kosong.jpeg';
        }
        $this->view("Pencari/favorit",[
            "title" => "favorit",
            "profile" => $profile
        ]);
    }

    function profile($params = []){
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

            if (!preg_match( $pattern, $nama_lengkap)) {
                $erors['fullname'] = "Nama hanya boleh berupa alfabet";
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

            $violationNoHp = $validator->validate($no_hp, [
                new Assert\NotBlank(["message" => "Nomor Hanphone tidak boleh kosong"]),
                new Assert\Regex([
                    'pattern' => "/^[0-9]+$/",
                    'message' => "No handphone hanya boleh angka"
                ]),
                new Assert\Length([
                    'min' => 10,
                    'minMessage' => "no handphone minimal 10 character",
                    'max' => 13,
                    'maxMessage' => "no handphone maximal 13 character"
                ])
            ]);

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

            // input eror no hp

            foreach ($violationNoHp as $violation)
            {
                $erors['hp'] = $violation->getMessage();
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
    }


    function reviewGambarKost($params = []){
        $id = (int) $params[0];
        $gambar = $this->model->getImageKost($id);
        $judul = $this->model->getNamaKost($id);
        $this->view("Pencari/reviewGambarKost", [
            "title" => "ReviewGambarKost",
            "gambar" => $gambar,
            "id" => $id,
            "judul" => $judul,
        ]);
    }

    function faq($params = []){
        $this->view("Pencari/faq", [
            "title" => "faq"
        ]);
    }

    function coba($params = []){
        $this->view("Pencari/coba", [
            "title" => "coba"
        ]);
    }

}