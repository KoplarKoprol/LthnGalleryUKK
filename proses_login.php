<?php
// Buat liat error

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "select * from user where Username='$username' and Password='$password'");

$cek = mysqli_num_rows($sql);

if ($cek == 1) {
    while ($data = mysqli_fetch_array($sql)) {
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['NamaLengkap'] = $data['NamaLengkap'];

    }
    header("location:home.php");
} else {
    header("location:login.php");
}

?>