<?php

require_once "./core/DataBase.php";

class AdminModel
{
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function getAllLaporan()
    {
        $data = [];
        $this->DB->query("SELECT * FROM laporantokategori");

        foreach ($this->DB->getAll() as $ltk) {
            $this->DB->query("SELECT id_user, deskripsi_laporan, tanggal_laporan FROM laporan WHERE id_laporan = {$ltk['id_laporan']}");
            $dataLaporan = $this->DB->getFirst();
            $this->DB->query("SELECT username_user FROM user WHERE id_user = {$dataLaporan['id_user']}");
            $username = $this->DB->getFirst()['username_user'];
            $this->DB->query("SELECT * FROM kategori_laporan WHERE id_kategori_laporan = {$ltk['id_kategori_laporan']}");
            $nama_laporan = $this->DB->getFirst()['nama_laporan'];

            if (array_key_exists($ltk['id_laporan'], $data)) {
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
        $this->DB->query("SELECT * FROM user;");
        return count($this->DB->getAll());
    }

    function getBerita()
    {
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
                [$post['judulBerita'], $post['deskripsiBerita'], $newDir, $_SESSION['id_user']]
            );
        } else {
            // Jika gagal upload
            echo "Error uploading file.";
        }
    }

    function updateBerita($files, $post)
    {
        
        $uploadDirectory = STORAGE . "/cover_berita";  // Direktori penyimpanan file
        $pathDir = "/public/storage/cover_berita/";    // Direktori untuk disimpan di database
        $tmpName = $files['cover_berita']['tmp_name']; // Nama file sementara yang diupload
        $name = $files['cover_berita']['name'];        // Nama asli file
        $uid = uniqid() . "_" . basename($name);       // Membuat nama file unik
        
        if ($tmpName != "") 
        {

            // Tentukan path lengkap untuk file yang diupload
            $newFileName = $uploadDirectory . '/' . $uid; // Menambahkan '/' agar path valid
            $newDir = $pathDir . $uid; // Path yang disimpan di database
    
            // Pastikan direktori tujuan ada, jika belum buat direktori
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }
    
            // Pindahkan file ke direktori tujuan dan simpan data ke database
            if (move_uploaded_file($tmpName, $newFileName)) {
                $this->DB->query(
                    "UPDATE berita SET judul_berita = ?  ,deskripsi_berita = ? ,cover_berita = ? WHERE id_berita = ?",
                    "sssi",
                    [$post['judul'], $post['deskripsi'], $newDir, $post['idBerita']]
                );
            } else {
                // Jika gagal upload
                echo "Error uploading file.";
            }
        } else {
            $this->DB->query(
                "UPDATE berita SET judul_berita = ?  ,deskripsi_berita = ? WHERE id_berita = ?",
                "ssi",
                [$post['judul'], $post['deskripsi'], $post['idBerita']]
            );
        }
    }


    function getBeritaById($idBerita)
    {
        $this->DB->query("SELECT * FROM berita WHERE id_berita = ?", "i", [$idBerita]);
        return $this->DB->getFirst();
    }

    

    function getLaporanById($idLaporan)
    {
        $data = [];
        $this->DB->query("SELECT * FROM laporantokategori WHERE id_laporan = $idLaporan");

        foreach ($this->DB->getAll() as $ltk) {
            $this->DB->query("SELECT id_user, deskripsi_laporan, tanggal_laporan FROM laporan WHERE id_laporan = {$ltk['id_laporan']}");
            $dataLaporan = $this->DB->getFirst();
            $this->DB->query("SELECT username_user FROM user WHERE id_user = {$dataLaporan['id_user']}");
            $username = $this->DB->getFirst()['username_user'];
            $this->DB->query("SELECT * FROM kategori_laporan WHERE id_kategori_laporan = {$ltk['id_kategori_laporan']}");
            $nama_laporan = $this->DB->getFirst()['nama_laporan'];

            if (array_key_exists($ltk['id_laporan'], $data)) {
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
        $this->DB->query("INSERT INTO pengumuman(tipe_pengumuman, isi_pengumuman, tanggal_pengumuman, id_admin, judul_pengumuman) VALUES (?, ?, NOW(), ?, ?)", "ssis", [$post['tipe_pengumuman'], $post['isi_pengumuman'], $_SESSION['id_user'], $post['judul_pengumuman']]);
        return true;
    }

    function getAllPengumuman($param, $cari = false)
    {
        if ($cari == false) {
            if ($param == "semua") {
                $this->DB->query("SELECT * FROM pengumuman");
            } elseif ($param == "pencari") {
                $this->DB->query("SELECT * FROM pengumuman WHERE tipe_pengumuman = ?", "s", ['pencari']);
            } else {
                $this->DB->query("SELECT * FROM pengumuman WHERE tipe_pengumuman = ?", "s", [$param]);
            }
        } else {
            $this->DB->query("SELECT * FROM pengumuman WHERE judul_pengumuman LIKE ?", "s", [$param]);
        }
        $data = [];
        $result = $this->DB->getAll();

        foreach ($result as $key => $item)
        {
            $data[$key] = [];
            $data[$key]['data_pengumuman'] = $item;
            $this->DB->query("SELECT nama_admin, username_admin FROM admin WHERE id_admin = {$item['id_admin']}");
            $admin  = $this->DB->getFirst(); 
            $data[$key]['pengirim'] = $admin;
        }
        return $data;
    }


    function getPertanyaan()
    {
        $this->DB->query("SELECT p.id_pertanyaan, p.tanggal_pertanyaan, p.isi_pertanyaan, p.id_user, u.username_user, u.id_user 
                          FROM pertanyaan AS p
                          JOIN user AS u ON u.id_user = p.id_user
                          LEFT JOIN jawaban AS j ON j.id_pertanyaan = p.id_pertanyaan");
        return $this->DB->getAll();
    }

    function getPertanyaanById($idPertanyaan)
    {
        $this->DB->query("SELECT p.id_pertanyaan,p.tanggal_pertanyaan,p.isi_pertanyaan,p.id_user,u.username_user,u.id_user FROM pertanyaan AS p,user AS u WHERE id_pertanyaan = $idPertanyaan");
        return $this->DB->getFirst();
    }

    function mengisiBalasan($idPertanyaan, $isiBalasan)
    {
        $this->DB->query("INSERT INTO jawaban(tanggal_jawaban,isi_jawaban,id_pertanyaan) VALUES (NOW(),?,?)", "si", [$isiBalasan, $idPertanyaan]);
        return true;
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

    function banUser($id)
    {
        $this->DB->query("UPDATE user SET status_akun = 'banned' WHERE id_user = ?", 's', [(int)$id]);
    }

    function unBanUser($id)
    {
        $this->DB->query("UPDATE user SET status_akun = 'aktif' WHERE id_user = ?", 's', [(int)$id]);
    }

    function getAllTransaksi()
    {
        $this->DB->query("
            SELECT 
                u.id_user, 
                t.id_user_pencari, 
                u.username_user, 
                t.harga_transaksi, 
                t.tanggal_dipesan_transaksi, 
                t.status_transaksi, 
                t.tipe_transaksi 
            FROM transaksi AS t, user AS u 
            WHERE t.id_user_pencari = u.id_user
        ");
        return $this->DB->getAll();
    }

    function getTotalTransaksi() {
        $this->DB->query("SELECT * FROM transaksi;");
        return count($this->DB->getAll());
    }

    function getTotalBerhasil(){
        $this->DB->query("SELECT * FROM transaksi WHERE status_transaksi = ?" ,"s",["settlement"]);
        return count($this->DB->getAll());
    }

    function getTotalGagal(){
        $this->DB->query("SELECT * FROM transaksi WHERE status_transaksi = ?" ,"s",["expire"]);
        return count($this->DB->getAll());
    }

    function hapusBerita($idBerita){
        $this->DB->query("DELETE FROM berita WHERE id_berita = ?" , "i",[$idBerita]);
    }
}
