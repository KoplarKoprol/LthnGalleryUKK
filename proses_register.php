<?php 
    // Buat liat error

    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    include "koneksi.php";

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $namaLengkap=$_POST['namaLengkap'];
    $alamat=$_POST['alamat'];

    $sql = mysqli_query($conn, "INSERT INTO user (username, password, email, namaLengkap, alamat) VALUES ('$username', '$password', '$email', '$namaLengkap', '$alamat')");

    header("location:login.php");
?>