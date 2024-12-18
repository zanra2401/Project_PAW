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

    function getFavorit(){
        $this->DB->query("SELECT id_kost,id_favorit FROM favorit WHERE id_user = (?)","i",[1]);
        $id = $this->DB->getALL();
        $data = [];
        foreach($id as $i){
            $this->DB->query("SELECT * FROM kost WHERE id_kost = ?","i",[$i["id_kost"]]);
            $data[] = $this->DB->getFirst();
        }
        
        return $data;
    }

    function hapusFavoritById($idKost) {
        $this->DB->query("DELETE FROM favorit WHERE id_user = ? AND id_kost = ? ", "ii" ,[$_SESSION["id_user"], $idKost]);
    }
    

    // function hapusFavorit($idFav,$idUser){
    //     $this->DB->query("DELETE FROM favorit WHERE id_user = ? AND id_favorit = ?","ii",[1],[$idFav]);
    // }

    function getLaporanById($idLaporan)
    {
        $this->DB->query("SELECT l.deskripsi_laporan,l.tanggal_laporan ,u.username_user , kl.nama_laporan FROM user AS u,laporan AS l ,kategori_laporan AS kl WHERE l.id_laporan = ?","i",[$id_laporan]);
        // $this->DB->query("SELECT l.isi_laporan, l.tanggal_melapor, u.username_user, l.id_laporan FROM user AS u, laporan AS l WHERE l.id_laporan = ?","i",[$idLaporan]);
        return $this->DB->getFirst();
    }
}

