<?php
// Buat liat error
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$FotoID = $_GET['fotoid'];

// Get the file name from the database
$sql = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$FotoID'");
$data = mysqli_fetch_array($sql);
$filename = $data['LokasiFile'];

// Delete the database record
$sql_delete = mysqli_query($conn, "DELETE FROM foto WHERE FotoID='$FotoID'");

// Delete the image file from the folder
if ($sql_delete) {
    $file_path = 'gambar/' . $filename;
    if (file_exists($file_path)) {
        unlink($file_path); // Delete the file
    }
}

header("location:foto.php");
?>