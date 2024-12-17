<?php

require_once "Controller.php";
require_once "./models/AdminModel.php";


class Admin extends Controller
{
    public $default;
    public $model;

    function __construct()
    {
        $this->model = new AdminModel();
        $this->default = "dashboard";
    }

    function default($params = [])
    {
        echo "DEFAULT";
    }

    function pengumuman($params = [])
    {
        $this->view("Admin/pengumuman", [
            "title" => "Pengumuman",
            "active-menu" => "pengumuman"
        ]);
    }

    function logPengumuman($params = [])
    {
        if (isset($params[0]) and $params[0] == "cari" and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $this->view("Admin/logPengumuman", [
                "title" => "Pengumumanm Log",
                "active-menu" => "pengumuman",
                "active-sub-menu" => ((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua"),
                "pengumuman" => $this->model->getAllPengumuman($_POST['cari'], true),
            ]);
        } else {
        
            $this->view("Admin/logPengumuman", [
                "title" => "Pengumumanm Log",
                "active-menu" => "pengumuman",
                "active-sub-menu" => ((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua"),
                "pengumuman" => $this->model->getAllPengumuman(((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua"), false)
            ]);
        }
    }

    function akunUser($params = [])
    {
        $this->view("Admin/akunuser", [
            "title" => "Data User",
            "active-menu" => "akunuser"
        ]);
    }


    function dashboard($params = [])
    {
        $this->view("Admin/halaman_utama", [
            "title" => "dashboard",
            "active-menu" => "dashboard"
        ]);
    }

    function laporan($params = [])
    {
        $this->view("Admin/laporan", [
            "title" => "laporan",
            "active-menu" => "laporan"
        ]);
    }

    function pertanyaan($params = [])
    {
        $this->view("Admin/pertanyaan", [
            "title" =>  "pertanyaan",
            "active-menu" => "pertanyaan"
        ]);
    }

    function berita($params = [])
    {
        $this->view("Admin/berita", [
            "title" => "berita",
            "active-menu" => "berita"
        ]);
    }

    function tambahBerita($params = [])
    {
        $this->view("Admin/tambahBerita", [
            "title" => "tambahBerita",
            "active-menu" => "berita"
        ]);
    }

    function balaspertanyaan($params = [])
    {
        $this->view("Admin/balaspertanyaan", [
            "title" => "Balas Pertanyaan",
            "active-menu" => "pertanyaan"
        ]);
    }

    function editberita($params = [])
    {
        $this->view("Admin/editberita", [
            "title" => "Edit Berita",
            "active-menu" => "berita"
        ]);
    }

    function uploadPengumuman($params = [])
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $this->model->uploadPengumuman($_POST);
            header("Location: /" . PROJECT_NAME . "/admin/pengumuman");
        }
    }

}
