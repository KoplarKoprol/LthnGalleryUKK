<?php 
    // Buat liat error

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include "koneksi.php";
    session_start();

    $namaalbum=$_POST['namaAlbum'];
    $deskripsi=$_POST['deskripsi'];
    $tanggaldibuat=date("Y-m-d");
    $userid=$_SESSION['UserID'];

    $sql = mysqli_query($conn, "INSERT INTO album (namaalbum, deskripsi, tanggaldibuat, UserID) VALUES ('$namaalbum', '$deskripsi', '$tanggaldibuat', '$userid')");

    header("location:album.php");
?>