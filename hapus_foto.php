<?php
// Buat liat error

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
session_start();

$FotoID = $_GET['fotoid'];

$sql = mysqli_query($conn, "DELETE FROM foto WHERE FotoID='$FotoID'");

header("location:foto.php");
?>