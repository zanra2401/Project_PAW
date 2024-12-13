<?php

require_once "./core/DataBase.php";

class PencariModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function register($username, $email, $password)
    {
        $this->DB->query("INSERT INTO user(id_user, username_user, email_user, password_user) VALUES(?, ?, ?, ?)", "isss", [1, $username, $email, $password]);
    }
}