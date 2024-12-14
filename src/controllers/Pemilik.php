<?php

require_once "Controller.php";
require_once "./models/PemilikModel.php";

class Pemilik extends Controller {
    public $default = "dashboard";
    private $model;

    function __construct() {
        $this->model = new PemilikModel();
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
        $this->view("Pemilik/tambahkost", [
            "title" => "tambahkost"
        ]);
    }
    function statistik($params = []) {
        $this->view("Pemilik/statistik", [
            "title" => "statistik"
        ]);
    }

    function kosts($params = []) {
        $this->view("Pemilik/kosts", [
            "title" => "Kosts",
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