<?php

require_once "./core/DataBase.php";

class PemilikModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function unique($field, $value, $table)
    {
        $this->DB->query("SELECT {$field} FROM {$table} WHERE {$field} = '{$value}'");
        return $this->DB->getFirst() == NULL;
    }

    function getOneData($field, $value, $table)
    {
        $this->DB->query("SELECT {$field} FROM {$table} WHERE {$field} = '{$value}'");
        return $this->DB->getFirst();
    }

    function getDataUser($username)
    {
        $this->DB->query("SELECT username_user, email_user, nama_user, alamat_user, no_hp_user FROM user WHERE username_user = ?", 's', [$username]);
        return $this->DB->getFirst();
    }

    function getFasilitasKamar()
    {
        $this->DB->query("SELECT id_fasilitas, nama_fasilitas FROM fasilitas WHERE  tipe_fasilitas = 'kamar'");
        return $this->DB->getAll();
    }

    function getFasilitasBersama()
    {
        $this->DB->query("SELECT id_fasilitas, nama_fasilitas FROM fasilitas WHERE tipe_fasilitas = 'bersama'");
        return $this->DB->getAll();
    }

    function getFasilitasBersamaID()
    {
        $data = [];
        $this->DB->query("SELECT id_fasilitas FROM fasilitas WHERE tipe_fasilitas = 'bersama'");
        foreach ($this->DB->getAll() as $id)
        {
            $data[] = $id['id_fasilitas'];
        }

        return $data;
    }

    function getFasilitasKamarID()
    {
        $data = [];
        $this->DB->query("SELECT id_fasilitas FROM fasilitas WHERE tipe_fasilitas = 'kamar'");
        foreach ($this->DB->getAll() as $id)
        {
            $data[] = $id['id_fasilitas'];
        }
        return $data;
    }



    function tambahKost($files, $post)
    {
        $fasilitas = json_decode($_POST['fasilitas'], true);
        
        $this->DB->connect();
        
        $this->DB->queryNew(
            "INSERT INTO kost(id_user, nama_kost, harga_kost, provinsi_kost, kota_kost, tipe_kost, lat, lng) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)", 
            "isiiisdd", 
            [$_SESSION['id_user'], $_POST['nama'], $_POST['harga'], $_POST['provinsiID'], $_POST['kotaID'], $_POST['tipe'], $_POST['lat'], $_POST['long']]
        );

        $id = mysqli_insert_id($this->DB->getConnection());
        
        $this->DB->closeConnection();

        foreach ($fasilitas['kamar'] as $f => $value)
        {
            $this->DB->query("INSERT INTO fasilitas_kost VALUES (?, ?)", "ss", [$id, $f]);
        }

        foreach ($fasilitas['bersama'] as $f => $value)
        {
            $this->DB->query("INSERT INTO fasilitas_kost VALUES (?, ?)", "ss", [$id, $f]);
        }
    
        $uploadDirectory =  STORAGE . 'gambarKost/';
        $pathDir = '/public/storage/gambarKost/';

        foreach ($files['gambar']['name'] as $key => $fileName) {
            $tmpName = $files['gambar']['tmp_name'][$key];
            $fileSize = $files['gambar']['size'][$key];
            $fileType = $files['gambar']['type'][$key];

            $uid = uniqid() . "_" . basename($fileName);

            $newFileName = $uploadDirectory . $uid;

            $newDir = $pathDir . $uid;

            if (move_uploaded_file($tmpName, $newFileName)) {
                $this->DB->query(
                    "INSERT INTO gambar_kost(id_kost, path_gambar) VALUES(?, ?)", 
                    "is", 
                    [$id, $newDir]  
                );
            }
        }
    }

    function getMyKost()
    {
        $data = [];

        $this->DB->query("SELECT * FROM kost WHERE id_user = (?)", "i", [$_SESSION['id_user']]);
        $kosts = $this->DB->getAll();
    
        foreach ($kosts as $kost)
        {
            $data[$kost['id_kost']] = [
                "data_kost" => $kost,
                "sisa_kamar" => 0,
                "gambar" => []
            ];

            // $this->DB->query("SELECT COUNT(*) AS total_kamar FROM kamar WHERE kamar.id_kost = {$kost['id_kost']} AND kamar.status_kamar = 'kosong'");
            // $kamar = $this->DB->getAll();
            // $data[$kost['id_kost']]['sisa_kamar'] = $kamar[0]['total_kamar'];

            $this->DB->query("SELECT g.path_gambar FROM gambar_kost as g WHERE g.id_kost = {$kost['id_kost']}");
            $gambar = $this->DB->getAll();
            
            foreach ($gambar as $g)
            {
                $data[$kost['id_kost']]['gambar'][] = $g;
            }

        }

        return $data;
    }

    function getKost($id)
    {
        $data = [];

        $this->DB->query("SELECT * FROM kost WHERE id_user = (?) AND id_kost = (?)", "ii", [$_SESSION['id_user'], $id]);
        $kost = $this->DB->getFirst();
    
       
        $data = [
            "data_kost" => $kost,
            "sisa_kamar" => 0,
            "gambar" => []
        ];

        // $this->DB->query("SELECT COUNT(*) AS total_kamar FROM kamar WHERE kamar.id_kost = {$kost['id_kost']} AND kamar.status_kamar = 'kosong'");
        // $kamar = $this->DB->getAll();
        // $data[$kost['id_kost']]['sisa_kamar'] = $kamar[0]['total_kamar'];

        $this->DB->query("SELECT g.path_gambar FROM gambar_kost as g WHERE g.id_kost = {$kost['id_kost']}");
        $gambar = $this->DB->getAll();
        
        foreach ($gambar as $g)
        {
            $data['gambar'][] = $g;
        }      

        return $data;
    }

}