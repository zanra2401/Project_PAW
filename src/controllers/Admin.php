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
        $dataUser = $this->model->getAllUser();
        $jumlahUser = $this->model->getJumlahUser();
        $this->view("Admin/halaman_utama", [
            "title" => "dashboard",
            "active-menu" => "dashboard",
            "user" => $dataUser,
            "jumlahUser" => $jumlahUser
        ]);
    }

    function laporan($params = [])
    {
        $dataLaporan = $this->model->getAllLaporan();
        $this->view("Admin/laporan", [
            "title" => "laporan",
            "active-menu" => "laporan",
            "laporan" => $dataLaporan
        ]);
    }

    function pertanyaan($params = [])
    {
        $this->view("Admin/pertanyaan", [
            "title" =>  "pertanyaan",
            "active-menu" => "pertanyaan",
            "dataPertanyaan" => $this->model->getPertanyaan()
        ]);
    }

    function berita($params = [])
    {
        $dataBerita = $this->model->getBerita();
        $this->view("Admin/berita", [
            "title" => "Berita",
            "active-menu" => "berita",
            "berita" => $dataBerita
        ]);
    }

    function tambahBerita($params = [])
    {
        $this->view("Admin/tambahBerita", [
            "title" => "Tambah Berita",
            "active-menu" => "berita"
        ]);
    }

    function balaspertanyaan($params = [])
    {
        $idPertanyaan = $_POST['idPertanyaan'];
        $this->view("Admin/balaspertanyaan", [
            "title" => "Balas Pertanyaan",
            "active-menu" => "pertanyaan",
            "pertanyaan" => $this->model->getPertanyaanById($idPertanyaan)
        ]);
    }

    function mengisiBalasan($params = []){
        $idPertanyaan = $_POST['idPertanyaan'];
        $isiBalasan = $_POST['balasan'];
        $tanggalBalasan = $_POST['hiddenDateTime'];
        $this->model->mengisiBalasan($idPertanyaan,$isiBalasan,$tanggalBalasan);
        header("Location: /" . PROJECT_NAME . "/Admin/pertanyaan");
        exit();
    }

    function editberita($params = [])
    {
        $idBerita = $_POST['idBerita']; // Ambil ID Berita dari parameter
        $this->view("Admin/editberita", [
            "title" => "Edit Berita",
            "active-menu" => "berita",
            "berita" => $this->model->getBeritaById($idBerita) // Panggil berita berdasarkan ID
        ]);
    }
    

    function updateBerita()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $this->model->updateBerita($_FILES, $_POST);
            header("Location: /" . PROJECT_NAME . "/admin/berita");
        }
    }


    function insertBerita($params = [])
    {
        var_dump($_FILES['cover_berita']['name']);
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $this->model->insertBerita($_FILES, $_POST);
            header("Location: /" . PROJECT_NAME . "/admin/berita");
        }
    }

    
    function detailLaporan($params = []){
        $idLaporan = $_POST['idLaporan']; // Ambil ID Berita dari parameter
        $this->view("Admin/detailLaporan", [
            "title" => "detail",
            "active-menu" => "laporan",
            "laporan" => $this->model->getLaporanById($idLaporan) // Panggil berita berdasarkan ID
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
