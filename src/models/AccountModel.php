<?php

require_once "./core/DataBase.php";

class AccountModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function register($username, $email, $password, $role, $nohp = "")
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        
        if ($nohp != "")
        {
            $this->DB->query("INSERT INTO user(username_user, email_user, no_hp_user ,password_user, role_user) VALUES(?, ?, ?, ?, ?)", "sssss", [$username, $email, $nohp, $password, $role]);
        }

        $this->DB->query("INSERT INTO user(username_user, email_user, password_user, role_user) VALUES(?, ?, ?, ?)", "ssss", [$username, $email, $password, $role]);
    }

    function resetPassword($id, $risetPassword)
    {
       
        // Hash password baru
        $resetPasswordHash = password_hash($resetPassword, PASSWORD_BCRYPT);

        // Perbarui password di database
        $this->DB->query("UPDATE user SET password_user = ? WHERE id_user = ?", "ss", [$resetPasswordHash, $id]);
        
        return true;
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

    
    function getData($username) 
    {
        $this->DB->query("SELECT * FROM user WHERE username_user = ?", "s", [$username]);
        return $this->DB->getFirst();

    }

    function getDataUser($username)
    {
        $this->DB->query("SELECT username_user, email_user, nama_user, alamat, no_hp_user, role_user FROM user WHERE username_user = ?", 's', [$username]);
        return $this->DB->getFirst();
    }
}