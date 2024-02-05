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
    <title>Halaman Album</title>
</head>

<body>
    <h1>Halaman Album</h1>
    <p>Selamat Datang <b>
            <?= $_SESSION['NamaLengkap'] ?>
        </b></p>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input required type="text" name="namaAlbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Tambahkan"></td>
            </tr>
        </table>
    </form>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid = $_SESSION['UserID'];
        $sql = mysqli_query($conn, "select * from album where UserID='$userid'");
        while ($data = mysqli_fetch_array($sql)) {

            ?>
            <tr>
                <td>
                    <?= $data['AlbumID'] ?>
                </td>
                <td>
                    <?= $data['NamaAlbum'] ?>
                </td>
                <td>
                    <?= $data['Deskripsi'] ?>
                </td>
                <td>
                    <?= $data['TanggalDibuat'] ?>
                </td>
                <td>
                    <a href="hapus_album.php?Albumid=<?= $data['AlbumID'] ?>">Hapus</a>
                    <a href="edit_album.php?Albumid=<?= $data['AlbumID'] ?>">Edit</a>
                </td>
            </tr>
            <?php
        }
        ?>


    </table>
</body>

</html>