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
        $data = $this->model->getAllKost();
        $profile = $this->model->getProfie();
        $this->view("Pencari/homepage", [
            "title" => "Homepage",
            "data" => $data,
            "profile" => $profile
        ]);
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
        $this->view("Pencari/homeberita", [
            "title" => "homeberita"
        ]);
    }

    function isiberita($params = []) {
        $this->view("Pencari/isiberita", [
            "title" => "isiberita"
        ]);
    }

    function kostPage($params = []) {
        $id = (int) $params[0];
        $data = $this->model->getAllKost();
        $fasilitas = $this->model->getAllFasilitas($id);
        $this->view("Pencari/KostPage", [
            "title" => "Kost Page",
            "id" => $id,
            "data" => $data,
            "fasilitas" => $fasilitas
        ]);
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
        $this->view("Pencari/favorit",[
            "title" => "favorit"
        ]);
    }

    function profile($params = []){
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            $username = $_POST["username"];
            $nama_lengkap = $_POST["nama_lengkap"];
            $jenis_kelamin = $_POST["kelamin"];
            $email = $_POST["email"];
            $no_hp = $_POST['no_hp'];
            $provinsi = $_POST['provinsi'];
            $kota = $_POST['kota'];





            
        }
        
        $data = $this->model->getAllDataUser();
        $this->view("Pencari/profile", [
            "title" => "Profile",
            "data_user" => $data
        ]);
    }

    function reviewGambarKost($params = []){
        $this->view("Pencari/reviewGambarKost", [
            "title" => "ReviewGambarKost"
        ]);
    }

    function faq($params = []){
        $this->view("Pencari/faq", [
            "title" => "faq"
        ]);
    }

    // function test()
    // {
    //     var_dump(count($this->model->unique("username_user", "zanuar", "user")));
 
    // }

    function coba($params = []){
        $this->view("Pencari/coba", [
            "title" => "coba"
        ]);
    }

}