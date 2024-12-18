<?php

require_once "./core/DataBase.php";

class PencariModel {
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
    
}