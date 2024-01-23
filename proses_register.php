<?php 
    include "koneksi.php";

    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $email=$_POST['Email'];
    $namaLengkap=$_POST['NamaLengkap'];
    $alamat=$_POST['Alamat'];

    $sql=mysqli_query($conn,"insert into user VALUES
    ('','$username','$password','$email','$namaLengkap','$alamat')");

    header("location:login.php")
?>