<?php

require_once "Controller.php";
require_once "./models/UserModel.php";

class Pencari extends Controller {
    public $default = "homepage";
    private $model;

    function __construct() {
        $this->model = new UserModel();
    }

    function homepage($params = []) {
        $this->view("Pencari/homepage", [
            "title" => "Homepage",
        ]);
    }
    function login($params = []){
        $this->view("Pencari/login", [
            "title" => "Login"
        ]);
    }

    function chat($params = []) {
        $this->view("Pencari/chat", [
            "title" => "Chat"
        ]);
    }

    function regPenyewa($params = []) {
        $this->view("Pencari/regPenyewa", [
            "title" => "regPenyewa"
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
    function regPemilik($params = []) {
        $this->view("Pencari/regPemilik", [
            "title" => "regPemilik"
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
        $this->view("Pencari/KostPage", [
            "title" => "Kost Page"
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
        $this->view("Pencari/profile", [
            "title" => "Profile"
        ]);
    }
    function notifikasi($params = []){
        $this->view("Pencari/notifikasi", [
            "title" => "notifikasi"
        ]);
    }
}