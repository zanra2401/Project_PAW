<?php

require_once "core/Globals.php";    
require_once "core/DataBase.php";
require_once "core/Router.php";


$hostname = "localhost";
$username = "root";
$password = "Zanra@2401";
$dbname = "buku";

$DB->createConnection($hostname, $username, $password, $dbname);

Router::route();