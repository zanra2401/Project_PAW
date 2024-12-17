<?php

session_start();

// DEBUG UNUTUK LOGIN
// $_SESSION["username"] = "grexgrub";
// $_SESSION["username"] = "bagoes123";
// $_SESSION["loged_in"] = true;
// $_SESSION["role_user"] = "pencari";
// $_SESSION["id_user"] = 2;
// $_SESSION["username"] = "irawan12";

// $_SESSION["loged_in"] = true;
// $_SESSION["role_user"] = "pemilik";
// $_SESSION["id_user"] = 1;
// $_SESSION['id_admin'] = 1;

if (isset($_SESSION["username"]))
{
    unset($_SESSION["username"]);
}

if (isset($_SESSION["loged_in"]))
{
    unset($_SESSION["loged_in"]);
}

require_once "core/Globals.php";    
require_once VENDOR . "autoload.php";
require_once "core/DataBase.php";
require_once "core/Router.php";



$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "cari_kost";

$DB->createConnection($hostname, $username, $password, $dbname);

Router::route();