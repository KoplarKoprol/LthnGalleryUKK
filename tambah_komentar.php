<?php
// Buat liat error

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$fotoid = $_POST['fotoid'];
$isikomentar = $_POST['IsiKomentar'];
$tanggalkomentar = date("Y-m-d");
$userid = $_SESSION['UserID'];

$sql = mysqli_query($conn, "INSERT INTO komentarfoto (FotoID, UserID, IsiKomentar, TanggalKomentar) VALUES ('$fotoid','$userid','$isikomentar','$tanggalkomentar')");

header("location:komentar.php?fotoid=" . $fotoid);
?>