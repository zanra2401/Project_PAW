<?php

require_once "Controller.php";

class Admin extends Controller
{
    public $default;

    function __construct()
    {
        $this->default = "default.php";
    }

    function default($params = [])
    {
        echo "DEFAULT";
    }

    function pengumuman($params = [])
    {
        $this->view("Admin/pengumuman", [
            "title" => "Pengumuman"
        ]);
    }

    function logPengumuman($params = [])
    {

        $this->view("Admin/logPengumuman", [
            "title" => "Pengumumanm Log",
            "active-menu" => ((count($params) > 0) ? (($params[0] == "semua") ? "semua" : (($params[0] == "pencari") ? "pencari" : (($params[0] == "pemilik") ? "pemilik" : ""))) : "semua")
        ]);
    }

    function akunUser($params = [])
    {
        $this->view("Admin/akunuser", [
            "title" => "Data User"
        ]);
    }


    function dashboard($params = [])
    {
        $this->view("Admin/halaman_utama", [
            "title" => "dashboard",
        ]);
    }

    function laporan($params = [])
    {
        $this->view("Admin/laporan", [
            "title" => "laporan",
        ]);
    }

    function pertanyaan($params = [])
    {
        $this->view("Admin/pertanyaan", [
            "title" =>  "pertanyaan",
        ]);
    }

    function berita($params = [])
    {
        $this->view("Admin/berita", [
            "title" => "Berita",
        ]);
    }

    function tambahBerita($params = [])
    {
        $this->view("Admin/tambahBerita", [
            "title" => "Tambah Berita",
        ]);
    }

    function balaspertanyaan($params = [])
    {
        $this->view("Admin/balaspertanyaan", [
            "title" => "Balas Pertanyaan",
        ]);
    }

    function editberita($params = [])
    {
        $this->view("Admin/editberita", [
            "title" => "Edit Berita",
        ]);
    }
}
