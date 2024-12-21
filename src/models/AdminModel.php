<?php

require_once "./core/DataBase.php";

class AdminModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function uploadPengumuman($post)
    {
        $this->DB->query("INSERT INTO pengumuman(tipe_pengumuman, isi_pengumuman, tanggal_pengumuman, id_admin, judul_pengumuman) VALUES (?, ?, NOW(), ?, ?)", "ssis", [$post['tipe_pengumuman'], $post['isi_pengumuman'], $_SESSION['id_admin'], $post['judul_pengumuman']]);
        return true;
    }

    function getAllPengumuman($param, $cari = false)
    {
        if ($cari == false)
        {
            if ($param == "semua")
            {
                $this->DB->query("SELECT * FROM pengumuman");
            }elseif ($param == "pencari") {
                $this->DB->query("SELECT * FROM pengumuman WHERE tipe_pengumuman = ?", "s", ['pencari']);
            }else {
                $this->DB->query("SELECT * FROM pengumuman WHERE tipe_pengumuman = ?", "s", [$param]);
            }
        } else 
        {
            $this->DB->query("SELECT * FROM pengumuman WHERE judul_pengumuman LIKE ?", "s", [$param]);
        }
        return $this->DB->getAll();


    }

    function getOneData($field, $value, $table)
    {
        $this->DB->query("SELECT {$field} FROM {$table} WHERE {$field} = '{$value}'");
        return $this->DB->getFirst();
    }

    function getData($admin_username) 
    {
        $this->DB->query("SELECT * FROM admin WHERE username_admin = ?", "s", [$admin_username]);
        return $this->DB->getFirst();

    }

    
}