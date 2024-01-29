<?php
// Buat liat error

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$albumID = $_POST['albumID'];
$namaalbum = $_POST['namaAlbum'];
$deskripsi = $_POST['deskripsi'];

$sql = mysqli_query($conn, "UPDATE album SET NamaAlbum='$namaalbum',Deskripsi='$deskripsi' WHERE AlbumID='$albumID'");

header("location:album.php");
?>