<?php
// Buat liat error

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$judulFoto = $_POST['judulFoto'];
$deskripsiFoto = $_POST['deskripsi'];
$albumID = $_POST['albumid'];
$tanggalunggah = date("Y-m-d");
$userid = $_SESSION['UserID'];

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
        mysqli_query($conn, "INSERT INTO foto VALUES(NULL,'$judulFoto','$deskripsiFoto','$tanggalunggah','$xx','$albumID','$userid')");
        header("location:foto.php");
    } else {
        header("location:foto.php");
    }
}

?>