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
    <title>Halaman Pengeditan Foto</title>
</head>

<body>
    <h1>Halaman Pengeditan Foto</h1>
    <p>Selamat Datang <b>
            <?= $_SESSION['NamaLengkap'] ?>
        </b></p>

    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="perbarui_foto.php" method="post" enctype="multipart/form-data">
        <?php
        include "koneksi.php";
        $ftoid = $_GET['fotoid'];
        $sql = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$ftoid'");
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <input type="text" name="fotoID" value="<?= $data['FotoID'] ?>" hidden>
            <table>
                <tr>
                    <td>Judul Foto</td>
                    <td><input required type="text" name="jdlFoto" value="<?= $data['JudulFoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskfoto" value="<?= $data['DeskripsiFoto'] ?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Lokasi File</td>
                    <td><input type="file" name="locFile"></td>
                </tr>
                <tr>
                    <td>Album</td>
                    <td>
                        <select name="albumid">
                            <?php
                            $userid = $_SESSION['UserID'];
                            $sql2 = mysqli_query($conn, "SELECT * FROM album WHERE UserID='$userid'");
                            while ($data2 = mysqli_fetch_array($sql2)) {
                                ?>
                                <option value="<?php if ($data2['AlbumID'] == $data['AlbumID']) {
                                    echo 'selected';
                                } ?>">
                                    <?= $data2['NamaAlbum'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Ubah"></td>
                </tr>
            </table>
            <?php
        }
        ?>
    </form>

</body>

</html>