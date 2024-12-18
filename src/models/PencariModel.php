<?php

require_once "./core/DataBase.php";

class PencariModel
{
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
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
}
