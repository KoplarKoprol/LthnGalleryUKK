<?php 
    // Buat liat error

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include "koneksi.php";
    session_start();

    $albumid=$_GET['Albumid'];

    $sql = mysqli_query($conn,"DELETE FROM album WHERE AlbumID='$albumid'");

    header("location:album.php");
?>