<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['UserID'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>
    <nav class="navbar">
        <h1>Halaman Komentar</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <p align="center">Selamat Berkomentar <b style="color: red ;">
            <?= $_SESSION['NamaLengkap'] ?>
        </b></p>
    <form action="tambah_komentar.php" method="post">
        <?php
        include "koneksi.php";
        $fotoid = $_GET['fotoid'];
        $sql = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <input type="text" name="fotoid" value="<?= $data['FotoID'] ?>" hidden>
            <table class="tabelos" cellspacing=5>
                <tr>
                    <td>Judul Foto</td>
                    <td><input required type="text" name="judulFoto" value="<?= $data['JudulFoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi Foto</td>
                    <td><input type="text" name="deskripsiFoto" value="<?= $data['DeskripsiFoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="gambar/<?= $data['LokasiFile'] ?>" width="200"></td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td><textarea rows="4" cols="50" name="IsiKomentar"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambahkan"></td>
                </tr>
            </table>
            <?php
        }
        ?>
    </form>
    <br>
    <table class="tabelos" width="100%" border="1" cellpading=5 cellspacing=5>
        <tr>
            <th width="5%">ID</th>
            <th width="20%">Nama</th>
            <th width="25%">Komentar</th>
            <th width="20%">Tanggal</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid = $_SESSION['UserID'];
        $sql = mysqli_query($conn, "SELECT * FROM komentarfoto,user WHERE komentarfoto.UserID=user.UserID AND FotoID='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {

            ?>
            <tr>
                <td>
                    <?= $data['KomentarID'] ?>
                </td>
                <td>
                    <?= $data['NamaLengkap'] ?>
                </td>
                <td>
                    <?= $data['IsiKomentar'] ?>
                </td>
                <td>
                    <?= $data['TanggalKomentar'] ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>