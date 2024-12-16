<?php

require_once "Controller.php";
require_once "./models/AdminModel.php";


class Admin extends Controller
{
    public $default = "dashboard";
    protected $model;

    function __construct()
    {
        $this->model = new AdminModel();
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

        $this->view("Admin/logPengumuman", [
            "title" => "Pengumumanm Log",
            "active-menu" => "pengumuman",
            "active-sub-menu" => ((count($params) > 0) ? (($params[0] == "pemilik") ? "pemilik" : (($params[0] == "pencari") ? "pencari" : "semua")) : "semua")
        ]);
    }

    function akunUser($params = [])
    {

        $this->view("Admin/akunuser", [
            "title" => "Data User",
            "active-menu" => "akunuser",
            "user" => $this->model->getAllUser()
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

    function ban($params = [])
    {
        $this->model->banUser($params[0]);
        header("Location: /" . PROJECT_NAME . "/admin/akunuser");
    }

    function unBan($params = [])
    {
        $this->model->unBanUser($params[0]);
        header("Location: /" . PROJECT_NAME . "/admin/akunuser");
    }
}
