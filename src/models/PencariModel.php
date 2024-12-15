<?php

require_once "./core/DataBase.php";

class PencariModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function getAllKost()
    {
        $data = [];

        $this->DB->query("SELECT * FROM kost");
        $kosts = $this->DB->getAll();
    
        foreach ($kosts as $kost)
        {
            $data[$kost['id_kost']] = [
                "data_kost" => $kost,
                "sisa_kamar" => 0,
                "gambar" => []
            ];

            $this->DB->query("SELECT COUNT(*) AS total_kamar FROM kamar WHERE kamar.id_kost = {$kost['id_kost']} AND kamar.status_kamar = 'kosong'");
            $kamar = $this->DB->getAll();
            $data[$kost['id_kost']]['sisa_kamar'] = $kamar[0]['total_kamar'];;

            $this->DB->query("SELECT g.path_gambar FROM gambar_kost as g WHERE g.id_kost = {$kost['id_kost']}");
            $gambar = $this->DB->getAll();
            
            foreach ($gambar as $g)
            {
                $data[$kost['id_kost']]['gambar'][] = $g;
            }
        }

        return $data;
    }

    function getAllFasilitas($id_kost)
    {
        
        $data = [
            "kamar" => [],
            "bersama" => []
        ];
        $this->DB->query("SELECT tf.nama_fasilitas, tf.tipe_fasilitas FROM fasilitas_kost AS f, fasilitas AS tf WHERE f.id_fasilitas = tf.id_fasilitas AND f.id_kost = {$id_kost}");
        $fasilitas = $this->DB->getAll();
        foreach ($fasilitas as $g) {
            if ($g['tipe_fasilitas'] == 'kamar'){
                $data["kamar"][] = $g['nama_fasilitas'];
            } else {
                $data["bersama"][] = $g['nama_fasilitas'];
            }
        }

        return $data;

    }

    function getProfie()
    {
        $data = '';
        $this->DB->query("SELECT profile_user FROM user WHERE role_user = 'pencari' AND id_user = 2");
        $path_profile = $this->DB->getAll();
        foreach($path_profile as $pp)
        {
            $data = $pp;
        }

        return $data;
    }

    function getAllDataUser()
    {
        $data = [];
        $this->DB->query("SELECT username_user, email_user, nama_user, no_HP_user, jenis_kelamin_user, email_user, no_HP_user, provinsi_user, kota_user, profile_user FROM user WHERE id_user = 2");
        $result = $this->DB->getAll();
        foreach($result as $res)
        {
            $data[] = $res;
        }

        return $data;
    }
}