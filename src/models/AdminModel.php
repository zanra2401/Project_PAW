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
        $this->DB->query("SELECT l.isi_laporan, l.tanggal_melapor, u.username_user FROM user AS u, laporan AS l WHERE l.id_user = u.id_user");
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
        $pathDir = "/public/storage/cover_berita";
        $tmpName = $files['cover_berita']['tmp_name'][$key];
        $uid = uniqid() . "_" . basename($fileName);

        $newFileName = $uploadDirectory . $uid;

        $newDir = $pathDir . $uid;
        var_dump($pathDir);
        if (move_uploaded_file($tmpName, $newFileName)) {
            $this->DB->query("INSERT INTO berita (judul_berita,deskripsi_berita,cover_berita) VALUES(?,?,?)","sss",[$post['judulBerita'],$post['deskripsiBerita'],$pathDir]);
        }
    }
}
