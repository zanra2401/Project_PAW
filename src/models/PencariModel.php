<?php

require_once "./core/DataBase.php";

class PencariModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }

    function getChat($idPengirim, $noUpdate = true)
    {
        if ($noUpdate)
        {
            $this->DB->query("UPDATE chat SET status_chat = 1 WHERE id_user_penerima = ? AND id_user_pengirim = ?", "ii", [$_SESSION['id_user'], $idPengirim]);
        }
        $this->DB->query("SELECT * FROM chat WHERE (id_user_penerima = ? AND id_user_pengirim = ?) OR (id_user_penerima = ? AND id_user_pengirim = ?) ORDER BY tanggal_chat ASC", 'iiii', [$_SESSION['id_user'], $idPengirim, $idPengirim, $_SESSION['id_user']]);
        return $this->DB->getAll();
    }

    function sendMessage($message, $idPenerima)
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_datetime = date('Y-m-d H:i:s');
        $this->DB->query("INSERT INTO chat(id_user_pengirim, id_user_penerima, isi_chat, tanggal_chat, status_chat) VALUES(?, ?, ?, ?, 0)", "iiss", [$_SESSION['id_user'], $idPenerima, $message, $current_datetime]);
        return true;
    }

    function getUserById($id)
    {
        $this->DB->query("SELECT username_user, email_user, nama_user, alamat_user, no_hp_user, profile_user FROM user WHERE id_user = ?", 'i', [$id]);
        return $this->DB->getFirst();
    }


    function getContact()
    {
        $data = [];
        $this->DB->query("SELECT DISTINCT u.id_user, u.username_user, u.profile_user FROM user u JOIN chat c ON u.id_user = c.id_user_pengirim WHERE c.id_user_penerima = ?;", "i", [$_SESSION['id_user']]);
        foreach ($this->DB->getAll() as $key => $contact) {
            $data[$key][] = $contact;
            $message = $this->getChat($contact['id_user'], false);
            $unread = 0;
            foreach ($message as $chat) 
            {   
                if ($chat['status_chat'] == 0 and $chat['id_user_pengirim'] != $_SESSION['id_user'])
                {
                    $unread += 1;
                }
            }   
            $data[$key]['unread'] = $unread;
        }

        return $data;
    }
}