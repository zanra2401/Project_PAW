<?php

require_once "./core/DataBase.php";

class AdminModel
{
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function getAllUser()
    {
        $this->DB->query("SELECT * FROM user");
        return $this->DB->getAll();
    }


    function banUser($id)
    {
        $this->DB->query("UPDATE user SET status_akun = 'banned' WHERE id_user = ?", 's', [(int)$id]);
    }

    function unBanUser($id)
    {
        $this->DB->query("UPDATE user SET status_akun = 'unbanned' WHERE id_user = ?", 's', [(int)$id]);
    }
}
