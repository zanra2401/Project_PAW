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
        $data = [];
        $this->DB->query("SELECT * FROM laporantokategori");

        foreach ($this->DB->getAll() as $ltk)
        {
            $this->DB->query("SELECT id_user, deskripsi_laporan, tanggal_laporan FROM laporan WHERE id_laporan = {$ltk['id_laporan']}");
            $dataLaporan = $this->DB->getFirst();
            $this->DB->query("SELECT username_user FROM user WHERE id_user = {$dataLaporan['id_user']}");
            $username = $this->DB->getFirst()['username_user'];
            $this->DB->query("SELECT * FROM kategori_laporan WHERE id_kategori_laporan = {$ltk['id_kategori_laporan']}");
            $nama_laporan = $this->DB->getFirst()['nama_laporan'];

            if (array_key_exists($ltk['id_laporan'], $data))
            {
                $data[$ltk['id_laporan']]['kategori'][] = $nama_laporan;
                continue;
            }

            $data[$ltk['id_laporan']] = [];
            $data[$ltk['id_laporan']]['kategori'][] = $nama_laporan;
            $data[$ltk['id_laporan']]['username'] = $username;
            $data[$ltk['id_laporan']]['data'] = $dataLaporan;

        }

        return $data;   
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
        $uploadDirectory = STORAGE . "/cover_berita";  // Direktori penyimpanan file
        $pathDir = "/public/storage/cover_berita/";    // Direktori untuk disimpan di database
        $tmpName = $files['cover_berita']['tmp_name']; // Nama file sementara yang diupload
        $name = $files['cover_berita']['name'];        // Nama asli file
        $uid = uniqid() . "_" . basename($name);       // Membuat nama file unik
    
        // Tentukan path lengkap untuk file yang diupload
        $newFileName = $uploadDirectory . '/' . $uid; // Menambahkan '/' agar path valid
        $newDir = $pathDir . $uid;                    // Path yang disimpan di database
    
        // Pastikan direktori tujuan ada, jika belum buat direktori
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
    
        // Pindahkan file ke direktori tujuan dan simpan data ke database
        if (move_uploaded_file($tmpName, $newFileName)) {
            $this->DB->query(
                "INSERT INTO berita (judul_berita, deskripsi_berita, cover_berita, id_admin) VALUES(?, ?, ?, ?)",
                "sssi",
                [$post['judulBerita'], $post['deskripsiBerita'], $newDir, 1]
            );
        } else {
            // Jika gagal upload
            echo "Error uploading file.";
        }
    }
    

    function getBeritaById($idBerita)
    {
        $this->DB->query("SELECT * FROM berita WHERE id_berita = ?", "i", [$idBerita]);
        return $this->DB->getFirst();
    }

    function updateBerita($files,$post)
    {
        $uploadDirectory = STORAGE . "/cover_berita";  // Direktori penyimpanan file
        $pathDir = "/public/storage/cover_berita/";    // Direktori untuk disimpan di database
        $tmpName = $files['cover_berita']['tmp_name']; // Nama file sementara yang diupload
        $name = $files['cover_berita']['name'];        // Nama asli file
        $uid = uniqid() . "_" . basename($name);       // Membuat nama file unik
    
        // Tentukan path lengkap untuk file yang diupload
        $newFileName = $uploadDirectory . '/' . $uid; // Menambahkan '/' agar path valid
        $newDir = $pathDir . $uid;                    // Path yang disimpan di database
    
        // Pastikan direktori tujuan ada, jika belum buat direktori
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
    
        // Pindahkan file ke direktori tujuan dan simpan data ke database
        if (move_uploaded_file($tmpName, $newFileName)) {
            $this->DB->query(
                "UPDATE berita SET judul_berita = ?  ,deskripsi_berita = ? ,cover_berita = ?",
                "sss",
                [$post['judul'], $post['deskripsi'], $newDir]
            );
        } else {
            // Jika gagal upload
            echo "Error uploading file.";
        }
    }

    function getLaporanById($idLaporan)
    {
        $data = [];
        $this->DB->query("SELECT * FROM laporantokategori WHERE id_laporan = $idLaporan");

        foreach ($this->DB->getAll() as $ltk)
        {
            $this->DB->query("SELECT id_user, deskripsi_laporan, tanggal_laporan FROM laporan WHERE id_laporan = {$ltk['id_laporan']}");
            $dataLaporan = $this->DB->getFirst();
            $this->DB->query("SELECT username_user FROM user WHERE id_user = {$dataLaporan['id_user']}");
            $username = $this->DB->getFirst()['username_user'];
            $this->DB->query("SELECT * FROM kategori_laporan WHERE id_kategori_laporan = {$ltk['id_kategori_laporan']}");
            $nama_laporan = $this->DB->getFirst()['nama_laporan'];

            if (array_key_exists($ltk['id_laporan'], $data))
            {
                $data[$ltk['id_laporan']]['kategori'][] = $nama_laporan;
                continue;
            }

            $data[$ltk['id_laporan']] = [];
            $data[$ltk['id_laporan']]['kategori'][] = $nama_laporan;
            $data[$ltk['id_laporan']]['username'] = $username;
            $data[$ltk['id_laporan']]['data'] = $dataLaporan;

        }

        return $data; 
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

    function getPertanyaan(){
        $this->DB->query("SELECT p.id_pertanyaan, p.tanggal_pertanyaan, p.isi_pertanyaan, p.id_user, u.username_user, u.id_user 
                          FROM pertanyaan AS p
                          JOIN user AS u ON u.id_user = p.id_user
                          LEFT JOIN jawaban AS j ON j.id_pertanyaan = p.id_pertanyaan");
        return $this->DB->getAll();
    }

    function getPertanyaanById($idPertanyaan){
        $this->DB->query("SELECT p.id_pertanyaan,p.tanggal_pertanyaan,p.isi_pertanyaan,p.id_user,u.username_user,u.id_user FROM pertanyaan AS p,user AS u WHERE id_pertanyaan = $idPertanyaan");
        return $this->DB->getFirst();
    }

    function mengisiBalasan($idPertanyaan,$isiBalasan){
        $this->DB->query("INSERT INTO jawaban(tanggal_jawaban,isi_jawaban,id_pertanyaan) VALUES (NOW(),?,?)","si",[$isiBalasan,$idPertanyaan]);
        return true;
    }
    
    
}
