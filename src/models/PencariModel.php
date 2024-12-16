<?php

require_once "./core/DataBase.php";

class PencariModel
{
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }
    function getreview()
    {

        $data = [];


        $this->DB->query("SELECT tanggal_review, isi_review, id_user FROM review");
        $reviews = $this->DB->getAll();
        foreach ($reviews as $review) {
            $this->DB->query("SELECT username_user FROM user WHERE id_user = ?", [$review['id_user']]);
            $user = $this->DB->getOne();
            $data[] = [
                "nama" => $user['username_user'],
                "isi_review" => $review['isi_review'],
                "tanggal" => $review['tanggal_review'],
            ];
        }

        return $data;
    }
}
