<?php

require_once "./core/DataBase.php";

class PencariModel {
    private $DB;
    function __construct()
    {
        $this->DB = DataBase::getInstance();
    }
   
    
    // Assuming $this->DB is your database connection object

function getPengumuman($id_user) {
    $data = [];
    
    // Query to fetch data from the 'd_pengumuman' table
    $this->DB->query("SELECT * FROM pengumuman WHERE id_user = $id_user");
    $data = $this->DB->getAll();
    
    // Pass the data to the view
    return $data;
}

    
}