<?php

require_once "./core/DataBase.php";

class AdminModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function getAllLaporan()
    {
        $this->DB->query("SELECT l.deskripsi_laporan,l.tanggal_laporan ,u.username_user , kl.nama_laporan ,l.id_laporan FROM user AS u,laporan AS l ,kategori_laporan AS kl WHERE l.id_user = u.id_user");
        return $this->DB->getAll();
    }

    function getAllUser()
    {
        $this->DB->query("SELECT * FROM user");
        return $this->DB->getAll();
    }

    function getJumlahUser()
    {
        $result = $this->DB->query("SELECT * FROM user;");
        return count($this->DB->getAll());
    }

    function getBerita(){
        $this->DB->query("SELECT *FROM berita;");
        return $this->DB->getAll();
    }

    function insertBerita($files, $post)
    {
        $uploadDirectory = STORAGE . "/cover_berita";
        $pathDir = "/public/storage/cover_berita";
        $tmpName = $files['cover_berita']['tmp_name'];
        $name = $files['cover_berita']['name'];
        $uid = uniqid() . "_" . basename($name);

        $newFileName = $uploadDirectory . $uid;
        $newDir = $pathDir . $uid;
        if (move_uploaded_file($tmpName, $newFileName)) {
            $this->DB->query("INSERT INTO berita (judul_berita,deskripsi_berita,cover_berita, id_admin) VALUES(?,?,?,?)","sssi",[$post['judulBerita'],$post['deskripsiBerita'],$pathDir, 1]);
        }
    }

    function getBeritaById($idBerita)
    {
        $this->DB->query("SELECT * FROM berita WHERE id_berita = ?", "i", [$idBerita]);
        return $this->DB->getFirst();
    }

    function updateBerita($idBerita, $judul, $deskripsi)
    {
        $this->DB->query(
            "UPDATE berita SET judul_berita = ?, deskripsi_berita = ? WHERE id_berita = ?", 
            "ssi", 
            [$judul, $deskripsi, $idBerita]
        );
    }

    function getLaporanById($idLaporan)
    {
        $this->DB->query("SELECT l.deskripsi_laporan,l.tanggal_laporan ,u.username_user , kl.nama_laporan FROM user AS u,laporan AS l ,kategori_laporan AS kl WHERE l.id_laporan = ?","i",[$id_laporan]);
        // $this->DB->query("SELECT l.isi_laporan, l.tanggal_melapor, u.username_user, l.id_laporan FROM user AS u, laporan AS l WHERE l.id_laporan = ?","i",[$idLaporan]);
        return $this->DB->getFirst();
    }
    
}
