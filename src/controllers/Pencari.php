<?php

require_once "Controller.php";
require_once "./models/PencariModel.php";


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Pencari extends Controller
{
    public $default = "homepage";
    private $model;

    function __construct()
    {
        $this->model = new PencariModel();
    }

    function homepage($params = [])
    {
        $this->view("Pencari/homepage", [
            "title" => "Homepage",
        ]);
    }


    function chat($params = [])
    {
        $this->view("Pencari/chat", [
            "title" => "Chat"
        ]);
    }

    function regPenyewa($params = [])
    {
        $this->view("Pencari/regPenyewa", [
            "title" => "regPenyewa",
        ]);
    }

    function kode($params = [])
    {
        $this->view("Pencari/kode", [
            "title" => "kode"
        ]);
    }

    function berita($params = [])
    {
        $this->view("Pencari/berita", [
            "title" => "berita"
        ]);
    }


    function lupapassword($params = [])
    {
        $this->view("Pencari/lupapassword", [
            "title" => "lupapassword"
        ]);
    }

    function ubahpassword($params = [])
    {
        $this->view("Pencari/ubahpassword", [
            "title" => "ubahpassword"
        ]);
    }

    function finishpassword($params = [])
    {
        $this->view("Pencari/finishpassword", [
            "title" => "finishpassword"
        ]);
    }

    function finishreg($params = [])
    {
        $this->view("Pencari/finishreg", [
            "title" => "finishreg"
        ]);
    }

    function kodegagal($params = [])
    {
        $this->view("Pencari/kodegagal", [
            "title" => "kodegagal"
        ]);
    }

    function finishregpemilik($params = [])
    {
        $this->view("Pencari/finishregpemilik", [
            "title" => "finishregpemilik"
        ]);
    }
    function homeberita($params = [])
    {
        $this->view("Pencari/homeberita", [
            "title" => "homeberita"
        ]);
    }
    function isiberita($params = [])
    {
        $this->view("Pencari/isiberita", [
            "title" => "isiberita"
        ]);
    }

    function kostPage($params = [])
    {
        $this->view("Pencari/KostPage", [
            "title" => "Kost Page"
        ]);
    }
    function kebijakan($params = [])
    {
        $this->view("Pencari/kebijakan", [
            "title" => "kebijakan"
        ]);
    }
    function tentangkami($params = [])
    {
        $this->view("Pencari/tentangkami", [
            "title" => "tentangkami"
        ]);
    }
    function riwayatpemesanan($params = [])
    {
        $this->view("Pencari/riwayatpemesanan", [
            "title" => "riwayatpemesanan"
        ]);
    }
    function pembayaran($params = [])
    {
        $this->view("Pencari/pembayaran", [
            "title" => "pembayaran"
        ]);
    }

    function favorit($params = [])
    {
        $this->view("Pencari/favorit", [
            "title" => "favorit"
        ]);
    }

    function profile($params = [])
    {
        $this->view("Pencari/profile", [
            "title" => "Profile"
        ]);
    }

    function faq($params = [])
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $isi = $_POST['pertanyaan_user'];
            $this->model->addPertanyaan($isi, $_SESSION['id_user']);
        } 
        
        $pertanyan = ($this->model->getpertanyaan());
        $this->view("Pencari/faq", [
            "title" => "faq",
            "pertanyaan" => $pertanyan
        ]);


        
    }


    function reviewGambarKost($params = [])
    {
        $this->view("Pencari/reviewGambarKost", [
            "title" => "ReviewGambarKost"
        ]);
    }

    function test()
    {
        var_dump(count($this->model->unique("username_user", "zanuar", "user")));
    }

    // function pertanyaan($params = [])
    // {
    //     var_dump($this->model->getpertanyaan());
    // }
}
