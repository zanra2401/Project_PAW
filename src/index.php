<?php

session_start();

// DEBUG UNUTUK LOGIN
$_SESSION["username"] = "bagoes12";
$_SESSION["loged_in"] = true;
$_SESSION["role"] = "pemilik";
$_SESSION["id_user"] = 2;

// if (isset($_SESSION["username"]))
// {
//     unset($_SESSION["username"]);
// }

// if (isset($_SESSION["loged_in"]))
// {
//     unset($_SESSION["loged_in"]);
// }

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