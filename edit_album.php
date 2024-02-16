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
    <title>Halaman Pengeditan Album</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>
    <nav class="navbar">
        <h1>Halaman Pengeditan Album</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <p align="center">Selamat Mengedit <b style="color: red ;">
                <?= $_SESSION['NamaLengkap'] ?>
            </b></p>
    <form action="perbarui_album.php" method="post">
        <?php
        include "koneksi.php";
        $albumid = $_GET['Albumid'];
        $sql = mysqli_query($conn, "SELECT * FROM album WHERE AlbumID='$albumid'");
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <input type="text" name="albumID" value="<?= $data['AlbumID'] ?>" hidden>
            <table class="tabelos" cellspacing="5">
                <tr>
                    <td>Nama Album</td>
                    <td><input required type="text" name="namaAlbum" value="<?= $data['NamaAlbum'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi" value="<?= $data['Deskripsi'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><input type="submit" value="Perbarui"></td>
                </tr>
            </table>
            <?php
        }
        ?>
    </form>

</body>

</html>