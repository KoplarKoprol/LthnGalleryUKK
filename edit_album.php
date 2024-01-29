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
</head>

<body>
    <h1>Halaman Pengeditan Album</h1>
    <p>Selamat Datang <b>
            <?= $_SESSION['NamaLengkap'] ?>
        </b></p>

    <ul>
        <li><a href="home.php">Beranda</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="perbarui_album.php" method="post">
        <?php
        include "koneksi.php";
        $albumid = $_GET['Albumid'];
        $sql = mysqli_query($conn, "SELECT * FROM album WHERE AlbumID='$albumid'");
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <input type="text" name="albumID" value="<?= $data['AlbumID'] ?>" hidden>
            <table>
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
                    <td><input type="submit" name="Perbarui"></td>
                </tr>
            </table>
            <?php
        }
        ?>
    </form>

</body>

</html>