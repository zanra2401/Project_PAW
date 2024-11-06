<?php

class UserModel {
    function getAllBuku() {
        global $DB;
        $DB->query("SELECT * FROM book");
        return $DB->getAll();
    }

    function getBuku($id) {
        global $DB;
        $DB->query("SELECT * FROM book WHERE id_buku = ?", "i", [$id]);
        return $DB->getFirst();
    }
}