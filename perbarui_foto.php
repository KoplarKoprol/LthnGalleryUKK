<?php
// Buat liat error

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$JudulFoto = $_POST['judulFoto'];
$deskripsi = $_POST['deskripsiFoto'];
$albumID = $_POST['albumid'];
$fotoid = $_POST['fotoid'];

// Jika, Diubah ke gambar baru
if ($_FILES['lokasiFile']['name'] != "") {
    $rand = rand();
    $ekstensi = array('png', 'jpg', 'JPG', 'jpeg', 'gif');
    $filename = $_FILES['lokasiFile']['name'];
    $ukuran = $_FILES['lokasiFile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:foto.php");
    } else {
        if ($ukuran < 1044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['lokasiFile']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
            mysqli_query($conn, "UPDATE foto SET JudulFoto='$JudulFoto',DeskripsiFoto='$deskripsi',lokasiFile='$xx',AlbumID='$albumID' WHERE FotoID='$fotoid'");
            header("location:foto.php");
        } else {
            header("location:foto.php");
        }
    }
} else {
    mysqli_query($conn, "UPDATE foto SET JudulFoto='$JudulFoto',DeskripsiFoto='$deskripsi',AlbumID='$albumID' WHERE FotoID='$fotoid'");
    header("location:foto.php");
}
?>