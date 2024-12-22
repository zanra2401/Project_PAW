<?php

session_start();

// DEBUG UNUTUK LOGIN
// $_SESSION["username"] = "grexgrub";
// $_SESSION["username"] = "tuhu01";
// $_SESSION["loged_in"] = true;
// $_SESSION["role"] = "pemilik";
// $_SESSION["id_user"] = 1;


// $_SESSION["loged_in"] = true;
// $_SESSION["role"] = "pemilik";
// $_SESSION["id_user"] = 1;
// $_SESSION["username"] = "grexgrub";
// $_SESSION["loged_in"] = true;
// $_SESSION["role"] = "pemilik";

// $_SESSION["username"] = "bagoes123";
// $_SESSION["loged_in"] = true;
// $_SESSION["role_user"] = "pencari";
// $_SESSION["id_user"] = 10;
// $_SESSION["username"] = "irawan12";

// $_SESSION["loged_in"] = true;
// $_SESSION["role_user"] = "pemilik";
// $_SESSION["id_user"] = 1;
// $_SESSION['id_admin'] = 1;


// if (isset($_SESSION["username"]))
// {
//     unset($_SESSION["username"]);
// }


// if (isset($_SESSION["username"]))
// {
//     unset($_SESSION["username"]);
// }

// if (isset($_SESSION["loged_in"]))
// {
//     unset($_SESSION["loged_in"]);
// }

require_once "core/Globals.php";
require_once "midtrans-php-master/Midtrans.php";

require_once VENDOR . "autoload.php";
require_once "core/DataBase.php";
require_once "core/Router.php";

\Midtrans\Config::$serverKey = 'SB-Mid-server-sQHnNKLANytZ8Vf6KNx5bSHN';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;


$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "cariKost";

$DB->createConnection($hostname, $username, $password, $dbname);

Router::route();
