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


 

    
    function getFasilitasKamarByID($id)
    {
        $this->DB->query("SELECT fk.id_fasilitas, f.nama_fasilitas FROM fasilitas AS f, fasilitas_kost AS fk WHERE f.tipe_fasilitas = 'kamar' AND fk.id_kost = ? AND f.id_fasilitas = fk.id_fasilitas", "i", [$id]);
        return $this->DB->getAll();
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

        $id = mysqli_insert_id(mysql: $this->DB->getConnection());
        
        $this->DB->closeConnection();

        foreach ($fasilitas['kamar'] as $f => $value)
        {
            $this->DB->query("INSERT INTO fasilitas_kost VALUES (?, ?)", "ss", [$id, $f]);
        }

        foreach ($fasilitas['bersama'] as $f => $value)
        {
            $this->DB->query("INSERT INTO fasilitas_kost VALUES (?, ?)", "ss", [$id, $f]);
        }
        
        if (isset($post['lantai']))
        {
            $total_kamar = 0;
            $lantai = json_decode($post['lantai'], true);
            foreach ($lantai as $key => $l)
            {
                $total_kamar += $l;
                for ($i = 1; $i <= $l; $i++)
                {
                    $this->DB->query("INSERT INTO kamar(id_kost, nomor_kamar, lokasi_kamar, status_kamar) VALUES ($id, $i, $key, 'kosong')");
                }
            }
            $this->DB->query("UPDATE kost SET sisa_kamar = $total_kamar WHERE id_user = {$_SESSION['id_user']} AND id_kost = $id");
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

    function updateProfile($files, $post, $id)
    {
        $gambar = $_FILES['ubah_gambar'];
        $path_gambar = $gambar['name'];

        if (!($path_gambar == "")){
            $uploadDir = STORAGE . "gambarProfile/";
            $pathDir = "/public/storage/gambarProfile/";
    
            $tmpname = $gambar['tmp_name'];
    
            $uid = uniqid() . "_" . basename($path_gambar);
            $newFileName = $uploadDir . $uid;
            $pathName = $pathDir . $uid;
        } else {
            if (isset($_POST['pp_default'])){
                $pathName = $_POST['pp_default'];
            }
        }

        $username = $post["username"];
        $nama_lengkap = $post["nama_lengkap"];
        $jenis_kelamin = $post["kelamin"];
        $email = $post["email"];

        $no_hp = $post['no_hp'];
        $provinsi = $post['provinsi'];
        $kota = $post['kota'];
        
        if (isset($tmpname) && isset($newFileName)){
            if (move_uploaded_file($tmpname, $newFileName)) {
                $this->DB->query("UPDATE user SET username_user = '$username', email_user = '$email', nama_user = '$nama_lengkap', no_HP_user = '$no_hp', jenis_kelamin_user = '$jenis_kelamin', provinsi_user = $provinsi, kota_user = $kota, profile_user = '$pathName' WHERE id_user = $id");
            } else {
                $this->DB->query("UPDATE user SET username_user = '$username', email_user = '$email', nama_user = '$nama_lengkap', no_HP_user = '$no_hp', jenis_kelamin_user = '$jenis_kelamin', provinsi_user = $provinsi, kota_user = $kota WHERE id_user = $id");
            }
        } else if (isset($pathName)) {
            $this->DB->query("UPDATE user SET username_user = '$username', email_user = '$email', nama_user = '$nama_lengkap', no_HP_user = '$no_hp', jenis_kelamin_user = '$jenis_kelamin', provinsi_user = $provinsi, kota_user = $kota, profile_user = '$pathName' WHERE id_user = $id");
        } else {
            $this->DB->query("UPDATE user SET username_user = '$username', email_user = '$email', nama_user = '$nama_lengkap', no_HP_user = '$no_hp', jenis_kelamin_user = '$jenis_kelamin', provinsi_user = $provinsi, kota_user = $kota WHERE id_user = $id");
        }
    }

    function getProfie($id)
    {
        $data = [];
        $this->DB->query("SELECT profile_user FROM user WHERE id_user = $id");
        $path_profile = $this->DB->getAll();
        foreach($path_profile as $pp)
        {
            $data = $pp;
        }
      
        return $data;
    }

    function getAllDataUser($id)
    {
        $data = [];
        $this->DB->query("SELECT username_user, email_user, nama_user, no_HP_user, jenis_kelamin_user, email_user, no_HP_user, provinsi_user, kota_user, profile_user FROM user WHERE id_user = $id");
        $result = $this->DB->getAll();
        foreach($result as $res)
        {
            $data[] = $res;
        }

        return $data;
    }
    
    function getAllKamar($id)
    {
        $this->DB->query("SELECT lokasi_kamar,  GROUP_CONCAT(CONCAT(nomor_kamar, '|', status_kamar)) AS kamar_status_array FROM kamar WHERE id_kost = $id GROUP BY lokasi_kamar;");
        $data = $this->DB->getAll();

        $finalResult = [];

        foreach ($data as $row) {
            $kamarStatus = explode(',', $row['kamar_status_array']); // Pisahkan data GROUP_CONCAT
            $kamarArray = [];
        
            foreach ($kamarStatus as $kamar) {
                list($nomor, $status) = explode('|', $kamar); // Pisahkan nomor dan status
                $kamarArray[] = [(int)$nomor, $status];
            }
        
            $finalResult[$row['lokasi_kamar']] = $kamarArray;
        }
       
        return $finalResult;
    }

    function tambahKamar($id_kost, $lantai)
    {
        $this->DB->query("UPDATE kost SET sisa_kamar = sisa_kamar + 1 WHERE id_user = {$_SESSION['id_user']} AND id_kost = $id_kost");
        $this->DB->query("SELECT * FROM kamar WHERE id_kost = $id_kost AND lokasi_kamar = $lantai");
        $total_kamar = count($this->DB->getAll()) + 1;
        $this->DB->query("INSERT INTO kamar(id_kost, nomor_kamar, lokasi_kamar, status_kamar) VALUES ($id_kost, $total_kamar, $lantai, 'kosong')");
        $this->DB->query("SELECT * FROM kamar WHERE id_kost = $id_kost AND lokasi_kamar = $lantai ORDER BY nomor_kamar DESC");
        return $this->DB->getFirst();
    }

    function changeStatusKamar($kost, $lantai, $kamar, $status)
    {
        if ($status == "terisi")
        {
            $this->DB->query("UPDATE kost SET sisa_kamar = sisa_kamar - 1 WHERE id_user = {$_SESSION['id_user']} AND id_kost = $kost");
        } else {
            $this->DB->query("UPDATE kost SET sisa_kamar = sisa_kamar + 1 WHERE id_user = {$_SESSION['id_user']} AND id_kost = $kost");
        }
        $this->DB->query("UPDATE kamar SET status_kamar = ? WHERE id_kost = ? AND lokasi_kamar = ? AND nomor_kamar = ?", 'siii', [$status, $kost, $lantai, $kamar]);
        return true;
    }

    function tambahLantai($id_kost, $kamar)
    {
        $this->DB->query("SELECT lokasi_kamar FROM kamar WHERE id_kost = $id_kost ORDER BY lokasi_kamar DESC");
        $lantai = $this->DB->getFirst()['lokasi_kamar'] + 1;

       
        for ($i = 1; $i <= $kamar; $i++)
        {
            $this->DB->query("INSERT INTO kamar(id_kost, nomor_kamar, lokasi_kamar, status_kamar) VALUES ($id_kost, $i, $lantai, 'kosong')");
        }
        
        return true;
    }

    function getReview($id_kost)
    {
        $data = [];
        $this->DB->query("SELECT * FROM review WHERE id_kost = $id_kost");
        $result =  $this->DB->getAll();
        foreach ($result as $key => $review)
        {
            $data[$key] = [];
            $data[$key]['review'] = $review;
            $this->DB->query("SELECT id_user, username_user, profile_user FROM user WHERE id_user = {$review['id_user']}");
            $data[$key]['user'] = $this->DB->getFirst();
            $this->DB->query("SELECT id_suka_review FROM suka_review WHERE id_review = {$review['id_review']}");
            $like = $this->DB->getAll();
            $data[$key]['like'] = ( $like != NULL) ? count($like) : 0;
            $this->DB->query("SELECT * FROM balasan_review WHERE id_review = {$review['id_review']}");
            $balasan = $this->DB->getFirst();
            if ($balasan != NULL)
            {
                $data[$key]['balasan']['balasan_data'] = $balasan;

                $this->DB->query("SELECT * FROM user WHERE id_user = {$balasan['id_user']}");

                $data[$key]['balasan']['user'] = $this->DB->getFirst();
            }
        }
        
        return $data;
    }

    function balasReview($id_review, $isi_balasan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_datetime = date('Y-m-d H:i:s');
        $this->DB->query("INSERT INTO balasan_review(tanggal_dibalas_review, isi_balasan_review, id_review, id_user) VALUES(?, ?, ?, {$_SESSION['id_user']})", "ssi", [$current_datetime, $isi_balasan ,$id_review]);
    }

    function sukaReview($id_review)
    {
        $this->DB->query("SELECT * FROM suka_review WHERE id_review = $id_review AND id_user = {$_SESSION['id_user']}");
        if ($this->DB->getFirst() != NULL)
        {
            $this->DB->query("DELETE FROM suka_review WHERE  id_review = ? AND id_user = ?", "ii", [$id_review, $_SESSION['id_user']]);
            return;
        }
        $this->DB->query("INSERT INTO suka_review(id_user,  id_review) VALUES({$_SESSION['id_user']}, ?)", "i", [$id_review]);
        return true;
    }

    function getTransaksiByID() {
        $this->DB->query("SELECT * FROM transaksi AS t, user AS u WHERE t.id_user_pemilik = {$_SESSION['id_user']} AND t.id_user_pencari = u.id_user");
        return $this->DB->getAll();
    }

    function selesaiTransaksi($id)
    {
        $this->DB->query("UPDATE transaksi SET status_transaksi = 'settlement' WHERE id_transaksi = '$id'");
        return true;
    }

    function batalTransaksi($id)
    {
        $this->DB->query("UPDATE transaksi SET status_transaksi = 'failure' WHERE id_transaksi = '$id'");
        return true;
    }

    function getTransaksi($idTransaksi)
    {
        $this->DB->query("SELECT * FROM transaksi AS t, user AS u WHERE (t.id_transaksi LIKE '%$idTransaksi%' OR u.username_user LIKE '%$idTransaksi%') AND t.id_user_pencari = u.id_user AND t.id_user_pemilik = {$_SESSION['id_user']}");
        return $this->DB->getAll();
    }

    function getTransaksiWithDate()
    {
        $this->DB->query("SELECT tanggal_dipesan_transaksi, COUNT(*) AS total_transaksi FROM transaksi  WHERE id_user_pemilik = {$_SESSION['id_user']} GROUP BY tanggal_dipesan_transaksi");
        $result = $this->DB->getAll();
        $data = [];
        foreach ($result as $item)
        {
            $data[$item['tanggal_dipesan_transaksi']] = $item['total_transaksi'];
        }
        return $data;
    }

    function getNotifSemua()
    {
        $this->DB->query("SELECT * FROM pengumuman WHERE tipe_pengumuman = 'semua'");
        return $this->DB->getAll();
    }

    function getNotifPemilik()
    {
        $this->DB->query("SELECT * FROM pengumuman WHERE tipe_pengumuman = 'pemilik'");
        return $this->DB->getAll();
    }
}

