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
        $this->DB->query("SELECT * FROM user WHERE username_user = ?", 's', [$username]);
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



    function getFasilitasBersamaByID($id)
    {
        $this->DB->query("SELECT fk.id_fasilitas, f.nama_fasilitas FROM fasilitas AS f, fasilitas_kost AS fk WHERE f.tipe_fasilitas = 'bersama' AND fk.id_kost = ? AND f.id_fasilitas = fk.id_fasilitas", "i", [$id]);
        return $this->DB->getAll();
    }

    function getUserById($id)
    {
        $this->DB->query("SELECT * FROM user WHERE id_user = ?", 'i', [$id]);
        return $this->DB->getFirst();
    }

    
    function getFasilitasKamarByID($id)
    {
        $this->DB->query("SELECT fk.id_fasilitas, f.nama_fasilitas FROM fasilitas AS f, fasilitas_kost AS fk WHERE f.tipe_fasilitas = 'kamar' AND fk.id_kost = ? AND f.id_fasilitas = fk.id_fasilitas", "i", [$id]);
        return $this->DB->getAll();
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

        $this->DB->query("SELECT g.path_gambar, g.id_gambar_kost FROM gambar_kost as g WHERE g.id_kost = {$kost['id_kost']}");
        $gambar = $this->DB->getAll();
        
        foreach ($gambar as $g)
        {
            $data['gambar'][] = $g;
        }      

        return $data;
    }


    function updateGambar($files, $post)
    {
        if (count(json_decode($post['id_del'], true)) > 0)
        {
            foreach (json_decode($post['id_del'], true) as $id)
            {
                $this->DB->query("DELETE FROM gambar_kost WHERE id_gambar_kost = ? AND id_kost = ?", "ii", [$id, $post['id_kost']]);
            }
        }

        $uploadDirectory =  STORAGE . 'gambarKost/';
        $pathDir = '/public/storage/gambarKost/';
        if ($files != NULl)
        {
            foreach ($files['gambar']['name'] as $key => $fileName) {
                $tmpName = $files['gambar']['tmp_name'][$key];
                
    
                $uid = uniqid() . "_" . basename($fileName);
    
                $newFileName = $uploadDirectory . $uid;
    
                $newDir = $pathDir . $uid;
    
                if (move_uploaded_file($tmpName, $newFileName)) {
                    $this->DB->query(
                        "INSERT INTO gambar_kost(id_kost, path_gambar) VALUES(?, ?)", 
                        "is", 
                        [$post['id_kost'], $newDir]  
                    );
                }
            }
        }
        
    }

    function updateFasilitas($fasilitas, $fasilitasDel, $id)
    {
        if (count($fasilitasDel, true) > 0)
        {
            foreach ($fasilitasDel as $idF)
            {
                $this->DB->query("DELETE FROM fasilitas_kost WHERE id_fasilitas = ? AND id_kost = ?", "ii", [$idF, $id]);
            }
        }

        foreach ($fasilitas['kamar'] as $f => $value)
        {
            $this->DB->query("INSERT INTO fasilitas_kost VALUES (?, ?)", "ss", [$id, $f]);
        }

        foreach ($fasilitas['bersama'] as $f => $value)
        {
            $this->DB->query("INSERT INTO fasilitas_kost VALUES (?, ?)", "ss", [$id, $f]);
        }

    }

    function getJumlahGambarKost($id_kost)
    {
        $this->DB->query("SELECT * FROM gambar_kost WHERE id_kost = ?", "i", [$id_kost]);
        return count($this->DB->getAll());
    }

    function updateBaseInfo($post)
    {
        $this->DB->query("UPDATE kost SET nama_kost = ?, harga_kost = ?, tipe_kost = ?, provinsi_kost = ?, kota_kost = ? WHERE id_kost = ?", "sisiii", [$post['nama'], $post['harga'], $post['tipe'], $post['provinsi'], $post['kota'], $post['id_kost']]);
    }

    function updateLatLong($post)
    {
        $this->DB->query("UPDATE kost SET lat = ?, lng = ? WHERE id_kost = ?", "ddi", [$post['lat'], $post['long'], $post['id_kost']]);
    }

    function getChat($idPengirim, $noUpdate = true)
    {
        if ($noUpdate)
        {
            $this->DB->query("UPDATE chat SET status_chat = 1 WHERE id_user_penerima = ? AND id_user_pengirim = ?", "ii", [$_SESSION['id_user'], $idPengirim]);
        }
        $this->DB->query("SELECT * FROM chat WHERE (id_user_penerima = ? AND id_user_pengirim = ?) OR (id_user_penerima = ? AND id_user_pengirim = ?) ORDER BY tanggal_chat ASC", 'iiii', [$_SESSION['id_user'], $idPengirim, $idPengirim, $_SESSION['id_user']]);
        return $this->DB->getAll();
    }

    function sendMessage($message, $idPenerima)
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_datetime = date('Y-m-d H:i:s');
        $this->DB->query("INSERT INTO chat(id_user_pengirim, id_user_penerima, isi_chat, tanggal_chat, status_chat) VALUES(?, ?, ?, ?, 0)", "iiss", [$_SESSION['id_user'], $idPenerima, $message, $current_datetime]);
        return true;
    }

    function getContact()
    {
        $data = [];
        $this->DB->query("SELECT DISTINCT u.id_user, u.username_user, u.profile_user FROM user u JOIN chat c ON u.id_user = c.id_user_pengirim WHERE c.id_user_penerima = ?;", "i", [$_SESSION['id_user']]);
        foreach ($this->DB->getAll() as $key => $contact) {
            $data[$key][] = $contact;
            $message = $this->getChat($contact['id_user'], false);
            $unread = 0;
            foreach ($message as $chat) 
            {   
                if ($chat['status_chat'] == 0 and $chat['id_user_pengirim'] != $_SESSION['id_user'])
                {
                    $unread += 1;
                }
            }   
            $data[$key]['unread'] = $unread;
        }

        return $data;
    }

    function cariKost($cari)
    {
        $data = [];

        $this->DB->query("SELECT * FROM kost WHERE id_user = {$_SESSION['id_user']} AND nama_kost LIKE '%{$cari}%'");
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
}