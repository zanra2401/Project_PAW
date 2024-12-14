<?php

require_once "./core/DataBase.php";

class PemilikModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function unique($field, $value, $table)
    {
        $this->DB->query("SELECT {$field} FROM {$table} WHERE {$field} = '{$value}'");
        return $this->DB->getFirst() == NULL;
    }

    function getOneData($field, $value, $table)
    {
        $this->DB->query("SELECT {$field} FROM {$table} WHERE {$field} = '{$value}'");
        return $this->DB->getFirst();
    }

    function getDataUser($username)
    {
        $this->DB->query("SELECT username_user, email_user, nama_user, alamat_user, no_hp_user FROM user WHERE username_user = ?", 's', [$username]);
        return $this->DB->getFirst();
    }
}