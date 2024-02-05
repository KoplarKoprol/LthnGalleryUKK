<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "koneksi.php";
session_start();

if (!isset($_SESSION['UserID'])) {
    // Untuk bisa like harus login dahulu
    header("location:index.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['UserID'];
    // cek apakah user ini telah like atau belum

    $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND 
    UserID='$userid'");

    if (mysqli_num_rows($sql) == 1) {
        //user Sudah pernah like foto ini
        header("location:index.php");
    } else {
        $tanggallike = date("Y-m-d");
        mysqli_query($conn, "INSERT INTO likefoto (FotoID, UserID, Tanggallike) VALUES ('$fotoid','$userid','$tanggallike')");
        header("location:index.php");
    }
}

?>