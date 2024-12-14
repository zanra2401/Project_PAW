<?php

session_start();

// DEBUG UNUTUK LOGIN
$_SESSION["username"] = "Irawan12";
$_SESSION["loged_in"] = true;

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