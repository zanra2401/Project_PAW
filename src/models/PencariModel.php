<?php

require_once "./core/DataBase.php";

class PencariModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function filterKost($nama_lokasi, $tipe){
        $data = [];

        if ($nama_lokasi == "" && $tipe != ""){
            $this->DB->query("SELECT * FROM kost WHERE tipe_kost = '$tipe'");
        } else if ($nama_lokasi != "" && $tipe == ""){
            $this->DB->query("SELECT * FROM kost WHERE (nama_kost LIKE '%$nama_lokasi%' OR kota_kost LIKE '%$nama_lokasi%' OR provinsi_kost LIKE '%$nama_lokasi%')");
        } else {
            $this->DB->query("SELECT * FROM kost WHERE (nama_kost LIKE '%$nama_lokasi%' OR kota_kost LIKE '%$nama_lokasi%' OR provinsi_kost LIKE '%$nama_lokasi%') AND tipe_kost = '$tipe'");
        }

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

            $this->DB->query("SELECT COUNT(*) AS total_kamar FROM kamar WHERE id_kost = {$kost['id_kost']} AND status_kamar = 'kosong'");
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

    function getProfie($id)
    {
        $data = [];
        $this->DB->query("SELECT profile_user FROM user WHERE role_user = 'pencari' AND id_user = $id");
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

    function getOneDataKost($id){
        $data = [];

        $this->DB->query("SELECT * FROM kost WHERE id_kost = $id");
        $kosts = $this->DB->getAll();
    
        foreach ($kosts as $kost)
        {
            $data[$kost['id_kost']] = [
                "data_kost" => $kost,
                "sisa_kamar" => 0,
                "gambar" => [],
                "pemilik" => '',
                "id_pemilik" => 0,
                "profile_pemilik" => ''
            ];

            $this->DB->query("SELECT COUNT(*) AS total_kamar FROM kamar WHERE kamar.id_kost = {$kost['id_kost']} AND kamar.status_kamar = 'kosong'");
            $kamar = $this->DB->getAll();
            $data[$kost['id_kost']]['sisa_kamar'] = $kamar[0]['total_kamar'];

            $this->DB->query("SELECT g.path_gambar FROM gambar_kost as g WHERE g.id_kost = {$kost['id_kost']}");
            $gambar = $this->DB->getAll();
            
            foreach ($gambar as $g)
            {
                $data[$kost['id_kost']]['gambar'][] = $g;
            }

            $this->DB->query("SELECT u.username_user, u.id_user FROM user AS u, kost AS k WHERE k.id_user = u.id_user AND id_kost = {$id}");
            $result = $this->DB->getAll();
            $data[$kost['id_kost']]['pemilik'] = $result[0]['username_user'];
            $data[$kost['id_kost']]['id_pemilik'] = $result[0]['id_user'];

            $this->DB->query("SELECT u.profile_user FROM user AS u, kost AS k WHERE k.id_user = u.id_user");
            $result = $this->DB->getAll();
            $data[$kost['id_kost']]['profile_pemilik'] = $result[0]['profile_user'];
        }
       
        return $data;
    }

    function getImageKost($id){
        $data = [];
        $this->DB->query("SELECT path_gambar FROM gambar_kost WHERE id_kost = '$id'");
        $result = $this->DB->getAll();
        foreach ($result as $res) 
        {
            $data[] = $res;
        }

        return $data;
    }

    function getNamaKost($id)
    {
        $data = '';
        $this->DB->query("SELECT nama_kost FROM kost WHERE id_kost = $id");
        $result = $this->DB->getAll();

        $data = $result[0]['nama_kost'];
        return $data;
    }

    function rekomendasiKost($id){
        $data = [];

        $this->DB->query("SELECT * FROM kost WHERE (kota_kost = (SELECT kota_kost FROM kost WHERE id_kost = $id) OR provinsi_kost = (SELECT provinsi_kost FROM kost WHERE id_kost = $id)) AND id_kost != $id LIMIT 5;");
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
            $data[$kost['id_kost']]['sisa_kamar'] = $kamar[0]['total_kamar'];

            $this->DB->query("SELECT g.path_gambar FROM gambar_kost as g WHERE g.id_kost = {$kost['id_kost']}");
            $gambar = $this->DB->getAll();
            
            foreach ($gambar as $g)
            {
                $data[$kost['id_kost']]['gambar'][] = $g;
            }
        }
        return $data;
    }

    function getKategoriLaporan(){
        $data = [];
        $this->DB->query("SELECT * FROM kategori_laporan");
        $result = $this->DB->getAll();
        foreach ($result as $res) 
        {
            $data[] = $res;
        }

        return $data;
    }

    function insertDataLaporan($kategori, $detail, $id_user, $id_kost){
        $this->DB->query("INSERT INTO laporan (id_user, deskripsi_laporan, id_kost) VALUES (?,?,?)", "isi", [$id_user,$detail,$id_kost]);

        $data = 0;
        $this->DB->query("SELECT id_laporan FROM laporan ORDER BY id_laporan DESC LIMIT 1");
        $result = $this->DB->getAll();
        if (!empty($result)){
            $data = $result[0]['id_laporan'];
        }

        foreach ($kategori as $id_kategori){
            $this->DB->query("INSERT INTO laporantokategori (id_lapora n, id_kategori_laporan) VALUE (?,?)", "ii", [$data, $id_kategori]);
        }
    }

    function cekPelapor($id_user, $id_kost){
        $data = 0;
        $this->DB->query("SELECT COUNT(*) AS jumlah FROM laporan WHERE id_user = $id_user AND id_kost = $id_kost");
        $result = $this->DB->getAll();
        $data = $result[0]['jumlah'];

        if ($data == 0){
            return false;
        } else {
            return true;
        }
    }

    function cekFavorit($id_user, $id_kost)
    {
        $this->DB->query("SELECT COUNT(*) AS jumlah FROM favorit WHERE id_user = ? AND id_kost = ?", "ii", [$id_user, $id_kost]);
        $result = $this->DB->getAll();
        $data = $result[0]['jumlah'];
        if ($data === 0){
            return 'tidak ada';
        } else {
            return 'ada';
        }
    }

    function addToFavorites($id_user, $id_kost)
    {
        $this->DB->query("INSERT INTO favorit (id_kost, id_user) VALUES (?, ?)", "ii", [$id_kost, $id_user]);
    }

    function removeFromFavorites($id_user, $id_kost)
    {
        $this->DB->query("DELETE FROM favorit WHERE id_user = ? AND id_kost = ?", "ii", [$id_user, $id_kost]);
    }

    function getAllReview($id_kost)
    {
        $data = [];
        $this->DB->query("SELECT kl.tanggal_review, kl.isi_review, u.profile_user, u.username_user FROM review AS kl, user AS u WHERE kl.id_kost = $id_kost AND kl.id_user = u.id_user");
        $result = $this->DB->getAll();
        foreach ($result as $res) 
        {
            $data[] = $res;
        }

        return $data;
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

    function getUserById($id)
    {
        $this->DB->query("SELECT * FROM user WHERE id_user = ?", 'i', [$id]);
        return $this->DB->getFirst();
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

    function saveTransaction($notif)
    {
        // $detail_pembayaran = json_decode($data['detail_pembayaran'], true);
        $this->DB->query("SELECT * FROM transaksi WHERE id_transaksi = {$notif['order_id']}");
        $isExist = $this->DB->getFirst() != NULL;
        if ($isExist)
        {   
            $this->DB->query("UPDATE transaksi SET status_transaksi = '{$notif['transaction_status']}' WHERE id_transaksi = {$notif['order_id']}");
        } else 
        {
            $this->DB->query("INSERT INTO transaksi VALUES(?, ?, ?, ?, ?, ?, ?, ?)", "iiiiisss", [$notif['order_id'], 7, 10, 29, $notif['gross_amount'], $notif['transaction_status'], $notif['transaction_time'], $notif['payment_type']]);
        }
        return true;
    }
}