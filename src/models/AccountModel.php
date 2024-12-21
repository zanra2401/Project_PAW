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
        $this->DB->connect();
        if ($nohp != "")
        {
            $this->DB->queryNew("INSERT INTO user(username_user, email_user, no_hp_user ,password_user, role_user, profile_user) VALUES(?, ?, ?, ?, ?, '/public/storage/gambarProfile/pp-default.png')", "sssss", [$username, $email, $nohp, $password, $role]);
        } else {
            $this->DB->queryNew("INSERT INTO user(username_user, email_user, password_user, role_user, profile_user) VALUES(?, ?, ?, ?, '/public/storage/gambarProfile/pp-default.png')", "ssss", [$username, $email, $password, $role]);
        }
        $id = mysqli_insert_id(mysql: $this->DB->getConnection());
        $this->DB->closeConnection();
        return $id;
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

    function isEmailExist($email)
    {
        $this->DB->query("SELECT * FROM user WHERE email_user = ?", "s", [$email]);
        return $this->DB->getFirst() != NULL;
    }



    function insertToken($id, $token, $expired)
    {
        
        $this->DB->query("INSERT INTO token_user VALUES(?, ?, ?)", "iis", [$id, $token, ]);
        return true;
    }


    function updateResetCode($code, $email)
    {
        $this->DB->query("UPDATE user SET reset_code = ? WHERE email_user = ?", "ss", [$code, $email]);
    }

    function resetPassword($id, $resetPassword)
    {
        // Hash password baru
        $resetPasswordHash = password_hash($resetPassword, PASSWORD_BCRYPT);
        $token = bin2hex(random_bytes(50));
        // Perbarui password di database
        $this->DB->query("UPDATE user SET password_user = ? WHERE id_user = ?", "si", [$resetPasswordHash, $id]);
        $this->DB->query("UPDATE user SET reset_code = ? WHERE id_user = ?", "si", [$token, $id]);
        return true;
    }

    function getUserByEmail($email)
    {
        $this->DB->query("SELECT * FROM user WHERE email_user = ?", 's', [$email]);
        return $this->DB->getFirst();
    }

    function getEmailByID($id)
    {
        $this->DB->query("SELECT email_user FROM user WHERE id_user = ?", 'i', [$id]);
        return $this->DB->getFirst()['email_user'];
    }

    function checkToken($id, $token)
    {
        $this->DB->query("SELECT * FROM user WHERE id_user = ? AND reset_code = ?", "is", [$id, $token]);
        return $this->DB->getFirst() != NULL;
    }

    function verifCode($kodeAcak, $id)
    {
        $this->DB->query("UPDATE user SET verif_code = ? WHERE id_user = ?", "si", [$kodeAcak, $id]);
    }

    function isCodeMatch($id,  $kodeAcak)
    {
        $this->DB->query("SELECT * FROM user WHERE id_user = ? AND verif_code = ?", "is", [$id, $kodeAcak]);
        $isMatch = $this->DB->getFirst() != NULL;
        if ($isMatch)
        {
            $this->DB->query("UPDATE user SET status_akun = 'aktif' WHERE id_user = ?", "i", [$id]);
            return true;
        }
        return $isMatch;
    }

    function getUserByID($id)
    {
        $this->DB->query("SELECT * FROM user WHERE id_user = ?", 'i', [$id]);
        return $this->DB->getFirst();
    }
}