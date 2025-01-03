<?php

require_once "./core/DataBase.php";

class PencariModel
{
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function getAllBerita(){
        $data = [];
        $this->DB->query("SELECT * FROM berita");
        $result = $this->DB->getAll();
        foreach ($result as $res)
        {
            $data[] = $res;
        }

        return $data;
    }

    function searchBerita($search)
    {
        $this->DB->query("SELECT * FROM berita WHERE judul_berita LIKE '%$search%'");
        return $this->DB->getAll();
    }

    function getOneBerita($id){
        $data = [];
        $this->DB->query("SELECT * FROM berita WHERE id_berita=$id");
        $result = $this->DB->getAll();
        foreach ($result as $res)
        {
            $data[] = $res;
        }

        return $data;
    }

    function email($email){
        $data = [];
        $this->DB->query("SELECT * FROM user WHERE email = '$email'");
        $result = $this->DB->getAll();
        foreach($result as $res)
        {
            $data[] = $res;
        }
        return $data;
    }

    function token($token, $email){
        $data = [];
        $this->DB->query("UPDATE user SET reset_code = '$token' WHERE email = '$email'");
        $result = $this->DB->getAll();
        foreach($result as $res)
        {
            $data[] = $res;
        }
        return $data;
    }
    

    function filterKost($nama_lokasi, $tipe, $filter_data, $min_harga, $max_harga, $urutan){
        $data = [];

        $condition = [];
        foreach ($filter_data AS $key => $temp) 
        {
            if(!empty($temp))
            {
                $condition[] = $key = $temp;
            }
        }

        $perintah = "SELECT k.* FROM kost AS k, fasilitas_kost AS fk WHERE k.id_kost = fk.id_kost";

        if ($nama_lokasi != '') {
            $perintah .= " AND (k.nama_kost LIKE '%$nama_lokasi%' OR k.kota_kost LIKE '%$nama_lokasi%' OR k.provinsi_kost LIKE '%$nama_lokasi%')";
        }

        if ($tipe != ''){
            $perintah .= " AND k.tipe_kost = '$tipe'";
        }

        if ($min_harga != 0 && $max_harga != 0){
            $perintah .= " AND k.harga_kost BETWEEN {$min_harga} AND {$max_harga}";
        } else if ($min_harga != 0 && $max_harga == 0) {
            $perintah .= " AND k.harga_kost >= $min_harga";
        } else if ($min_harga == 0 && $max_harga != 0) {
            $perintah .= " AND k.harga_kost <= $min_harga";
        }

        if (!empty($condition))
        {   
            $exc = " AND id_fasilitas IN (";
            for ($i = 0; $i < count($condition);$i++)
            {
                if ($i == (count($condition)-1)){
                    $exc .= $condition[$i];
                } else {
                    $exc .= $condition[$i] . ",";
                }
            }

            $pan = count($condition);
            $perintah .= "$exc) GROUP BY id_kost HAVING COUNT(DISTINCT id_fasilitas) = $pan";
        }

        if ($urutan != ''){
            $perintah .= " ORDER BY harga_kost {$urutan}";
        }

        $perintah .= ";";

        $this->DB->query($perintah);

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

    function getFasilitasKost()
    {   
        $data = [];
        $this->DB->query("SELECT * FROM fasilitas");
        $result = $this->DB->getAll();

        foreach ($result as $res)
        {
            $data[$res['id_fasilitas']] = $res['nama_fasilitas'];
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

    function getFavorit(){
        $this->DB->query("SELECT id_kost,id_favorit FROM favorit WHERE id_user = (?)","i",[$_SESSION['id_user']]);
        $id = $this->DB->getALL();
        $data = [];
        foreach($id as $i){
            $this->DB->query("SELECT k.nama_kost,k.tipe_kost,k.harga_kost,k.provinsi_kost,k.kota_kost ,k.sisa_kamar, gk.path_gambar, k.id_kost FROM kost AS k, gambar_kost AS gk WHERE k.id_kost = ? AND gk.id_kost = ?","ii",[$i["id_kost"],$i["id_kost"]]);
            $result = $this->DB->getFirst();
            $data[$i["id_kost"]] = $result;
        }

        // var_dump($data);
        // die();
        return $data;
    }

    function hapusFavoritById($idKost) {
        $this->DB->query("DELETE FROM favorit WHERE id_user = ? AND id_kost = ? ", "ii" ,[$_SESSION["id_user"], $idKost]);
    }
    

    function getLaporanById($idLaporan)
    {
        $this->DB->query("SELECT l.deskripsi_laporan,l.tanggal_laporan ,u.username_user , kl.nama_laporan FROM user AS u,laporan AS l ,kategori_laporan AS kl WHERE l.id_laporan = ?","i",[$idLaporan]);
        // $this->DB->query("SELECT l.isi_laporan, l.tanggal_melapor, u.username_user, l.id_laporan FROM user AS u, laporan AS l WHERE l.id_laporan = ?","i",[$idLaporan]);
        return $this->DB->getFirst();
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
        $this->DB->query("SELECT profile_user FROM user WHERE id_user = $id");
        $path_profile = $this->DB->getAll();
        foreach($path_profile as $pp)
        {
            $data = $pp;
        };

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

            $this->DB->query("SELECT u.profile_user FROM user AS u, kost AS k WHERE k.id_user = u.id_user AND k.id_kost = $id");
            $result = $this->DB->getAll();
            $data[$kost['id_kost']]['profile_pemilik'] = $result[0]['profile_user'];
        }
        
        return $data;
    }

    function checkIfLiked($id_review, $id_user)
    {
        $this->DB->query("SELECT * FROM suka_review WHERE id_user = $id_user AND id_review = $id_review");
        $result = $this->DB->getAll();
        if (empty($result)){
            return 'tidak ada';
        } else {
            return 'ada';
        }
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
            $this->DB->query("INSERT INTO laporantokategori (id_laporan, id_kategori_laporan) VALUE (?,?)", "ii", [$data, $id_kategori]);

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
        $this->DB->query("
            SELECT kl.id_review, 
                kl.tanggal_review, 
                kl.isi_review, 
                u.profile_user, 
                u.username_user, 
                COUNT(sr.id_review) AS total_suka,
                bl.isi_balasan_review
            FROM review AS kl
            JOIN user AS u ON kl.id_user = u.id_user
            LEFT JOIN suka_review AS sr ON kl.id_review = sr.id_review
            LEFT JOIN balasan_review AS bl ON bl.id_review = kl.id_review
            WHERE kl.id_kost = $id_kost
            GROUP BY kl.id_review, kl.tanggal_review, kl.isi_review, u.profile_user, u.username_user, bl.isi_balasan_review;
        ");
        $result = $this->DB->getAll();
        foreach ($result as $res) 
        {
            $data[] = $res;
        }

        
        return $data;
    }

    function addLikeReview($id_review, $id_user) 
    {
        $this->DB->query("INSERT INTO suka_review (id_user, id_review) VALUES (?,?)", "ii", [$id_user, $id_review]);
    }

    function removeLikeReview($id_review, $id_user)
    {
        $this->DB->query("DELETE FROM suka_review WHERE id_user = $id_user AND id_review = $id_review");
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
        // $detail_pembayaran = $notif['detail_pembayaran'];
        $this->DB->query("SELECT * FROM transaksi WHERE id_transaksi = '{$notif['order_id']}'");
        $array = explode("_", $notif['order_id']);
        $isExist = $this->DB->getFirst() != NULL;
        if ($isExist)
        {   
            $this->DB->query("UPDATE transaksi SET status_transaksi = '{$notif['transaction_status']}' WHERE id_transaksi = '{$notif['order_id']}'  ");
        } else 
        {
            $this->DB->query("INSERT INTO transaksi VALUES(?, {$array[1]}, {$array[2]}, {$array[0]}, ?, ?, ?, ?)", "sisss", [$notif['order_id'],  $notif['gross_amount'], $notif['transaction_status'], $notif['transaction_time'], $notif['payment_type']]);
        }
        return true;
    }

    function getPengumuman($id_user) {
        $data = [];
        
        // Query to fetch data from the 'd_pengumuman' table
        $this->DB->query("SELECT * FROM pengumuman");
        $data = $this->DB->getAll();
        
        // Pass the data to the view
        return $data;
    }

    function getpertanyaan()
    {
        $this->DB->query("SELECT id_pertanyaan FROM pertanyaan ORDER BY id_pertanyaan DESC LIMIT 1");
        $result = $this->DB->getAll();
        $temp = $result[0]['id_pertanyaan'];

        $this->DB->query("SELECT id_jawaban FROM jawaban WHERE id_pertanyaan = $temp");
        $result = $this->DB->getAll();

        if ($result == [])
        {
            $data = [];
            $this->DB->query('SELECT * FROM  pertanyaan');
    
            $pertanyaan = $this->DB->getAll();
    
            foreach ($pertanyaan as $p) {
                $data = [];
                $this->DB->query("SELECT id_pertanyaan FROM pertanyaan");
                $jawaban = $this->DB->getAll();
    
                foreach ($jawaban as $jaw) {
                    $data[$jaw['id_pertanyaan']] = [
                        "pertanyaan" => '',
                        "jawaban" => ''
                    ];

                    $this->DB->query("SELECT id_jawaban FROM jawaban WHERE id_pertanyaan = {$jaw['id_pertanyaan']}");
                    $result = $this->DB->getAll();
                    if($result == []){
                        $this->DB->query("SELECT isi_pertanyaan FROM pertanyaan WHERE id_pertanyaan = {$jaw['id_pertanyaan']}");
                        $result = $this->DB->getAll();
                        $data[$jaw['id_pertanyaan']]['pertanyaan'] = $result[0]['isi_pertanyaan'];
                    } else {
                        $this->DB->query("SELECT p.isi_pertanyaan, j.isi_jawaban FROM pertanyaan AS p, jawaban AS j where j.id_pertanyaan = p.id_pertanyaan AND j.id_pertanyaan = {$jaw['id_pertanyaan']}");
                        $result = $this->DB->getAll();
                        $data[$jaw['id_pertanyaan']]['pertanyaan'] = $result[0]['isi_pertanyaan'];
                        $data[$jaw['id_pertanyaan']]['jawaban'] = $result[0]['isi_jawaban'];

                    }
                }
            }
        } else {
            $data = [];
            $this->DB->query('SELECT * FROM  pertanyaan');
    
            $pertanyaan = $this->DB->getAll();
    
            foreach ($pertanyaan as $p) {
                $data = [];
                $this->DB->query("SELECT id_pertanyaan FROM pertanyaan");
                $jawaban = $this->DB->getAll();
    
    
                foreach ($jawaban as $jaw) {
                    $data[$jaw['id_pertanyaan']] = [
                        "pertanyaan" => '',
                        "jawaban" => ''
                    ];
                    $this->DB->query("SELECT p.isi_pertanyaan, j.isi_jawaban FROM pertanyaan AS p, jawaban AS j where j.id_pertanyaan = p.id_pertanyaan and j.id_pertanyaan = {$jaw['id_pertanyaan']}");
                    $result = $this->DB->getAll();
                    foreach ($result AS $res)
                    {
                        $data[$jaw['id_pertanyaan']]['pertanyaan'] = $res['isi_pertanyaan'];
                        $data[$jaw['id_pertanyaan']]['jawaban'] = $res['isi_jawaban'];
                    }
                }
            }
        }
        return $data;
    }

    function getAllPertanyaan(){
        $data = [];
        $this->DB->query("SELECT isi_pertanyaan, id_pertanyaan FROM pertanyaan");
        $result = $this->DB->getAll();
        
        if (empty($result)){ 
            return $data;
        } else {
            foreach ($result AS $res) {
                $data[$res['id_pertanyaan']]['pertanyaan'] = $res['isi_pertanyaan'];
                $this->DB->query("SELECT isi_jawaban FROM jawaban WHERE id_pertanyaan = {$res['id_pertanyaan']}");
                $jawaban = $this->DB->getFirst();
                if (!empty($jawaban))
                {
                    $data[$res['id_pertanyaan']]['jawaban'] = $jawaban['isi_jawaban'];
                } else {
                    $data[$res['id_pertanyaan']]['jawaban'] = "";
                }
            }

            return $data;
        }
    }

    function addPertanyaan($isi, $id)
    {
        $this->DB->query("INSERT INTO pertanyaan (isi_pertanyaan, id_user) VALUES (?, ?)", "si", [$isi, $id]);
    }

    function getOnlyOnePertanyaan(){
        $data = [];
        $this->DB->query("SELECT id_pertanyaan FROM pertanyaan ORDER BY id_pertanyaan DESC LIMIT 1");
        $result = $this->DB->getAll();
        $temp = $result[0]['id_pertanyaan'];

        $this->DB->query("SELECT isi_pertanyaan FROM pertanyaan WHERE id_pertanyaan = $temp");
        $result = $this->DB->getAll();
        $data = $result[0]['isi_pertanyaan'];

        return$data;
    }

    function transaksiOffline($pemilik, $kost)
    {
        $transaksi_id = (time() * 10000) + random_int(1000, 9999);
        $order_id = $kost . "_" . $pemilik . "_" . $_SESSION['id_user'] . "_" . $transaksi_id;
        $kostData = $this->getOneDataKost($kost)[$kost]['data_kost'];
        date_default_timezone_set('Asia/Jakarta');
        $current_datetime = date('Y-m-d H:i:s');

        $this->DB->query("INSERT INTO transaksi VALUES(?, ?, ?, ?, ?, ?, ?, ?)", "siiiisss", [$order_id, $pemilik, $_SESSION['id_user'], $kost, $kostData['harga_kost'], "pending",$current_datetime, "Offline"]);
        return true;
    }

    function getKostRiwayatBeli($id_user){

        $data = [];
        $this->DB->query("
            SELECT t.id_kost, k.nama_kost, k.harga_kost, 
                (SELECT gk.path_gambar 
                    FROM gambar_kost AS gk 
                    WHERE gk.id_kost = k.id_kost 
                    LIMIT 1) AS gambar_kost,
                t.tanggal_dipesan_transaksi
            FROM transaksi AS t
            INNER JOIN kost AS k ON t.id_kost = k.id_kost
            WHERE t.id_user_pencari = $id_user 
            AND t.status_transaksi = 'settlement'
        ");
    

        $result = $this->DB->getAll();
        foreach($result as $res)
        {
            $this->DB->query("SELECT * FROM review WHERE id_kost = {$res['id_kost']} AND id_user = $id_user");
            $result = $this->DB->getAll();
            if($result){
                $res['status'] = 'sudah';
            } else {
                $res['status'] = 'belum';
            }

            $data[] = $res;

        }

        return $data;
    }

    function addReview($isi, $id_user, $id_kost)
    {
        date_default_timezone_set('Asia/Jakarta'); 
        $time_now = date('Y-m-d H:i:s');

        $this->DB->query("INSERT INTO review (tanggal_review, isi_review, id_kost, id_user) VALUES (?, ?, ?, ?)", "ssii", [$time_now, $isi, $id_kost, $id_user]);
    }

    function tambahPertanyaan($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_datetime = date('Y-m-d H:i:s');
        $this->DB->query("INSERT INTO pertanyaan (tanggal_pertanyaan, isi_pertanyaan, id_user) VALUES(?, ?, ?)", "ssi", [$current_datetime, $post['pertanyaan_user'], $_SESSION['id_user']]);
        return true;
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

    function getReadNotifikasi($id_pengumuman, $id_user)
    {   
        $this->DB->query("INSERT INTO pengumuman_dibaca (id_user, id_pengumuman) VALUES (?, ?)", "ii", [$id_user, $id_pengumuman]);
    }

    function cekSudahDIbaca($id_user)
    {
        $this->DB->query("SELECT id_pengumuman FROM pengumuman_dibaca WHERE id_user = $id_user");
        $result = $this->DB->getAll();

        return $result;
    }
}