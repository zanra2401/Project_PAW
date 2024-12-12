<?php

require_once "Controller.php";

class Admin extends Controller
{
    public $default;

    function __construct()
    {
        $this->default = "default.php";
    }

    function default($params = [])
    {
        echo "DEFAULT";
    }

    function pengumuman($params = [])
    {
        $this->view("Admin/pengumuman", [
            "title" => "Pengumuman"
        ]);
    }

    function logPengumuman($params = [])
    {

        $this->view("Admin/logPengumuman", [
            "title" => "Pengumumanm Log",
            "active-menu" => ((count($params) > 0) ? (($params[0] == "semua") ? "semua" : (($params[0] == "pencari") ? "pencari" : (($params[0] == "pemilik") ? "pemilik" : ""))) : "semua")
        ]);
    }

    function akunUser($params = [])
    {
        $this->view("Admin/akunuser", [
            "title" => "Data User"
        ]);
    }
}
