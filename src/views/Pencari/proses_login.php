<?php
$koneksi = mysqli_connect("localhost", "root", "", "cari_kost");

session_start();
$username = $_POST['id_username'];
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE id_username = '$username' AND password_user = '$password'";
$result = mysqli_query($koneksi, $query);
if($row = mysqli_fetch_assoc($result)) {
    $_SESSION['id_username'] = $row['username_user'];
    header("homepage.php");
} else {
    // Jika login gagal
    header("Location: login.php");
}
?>