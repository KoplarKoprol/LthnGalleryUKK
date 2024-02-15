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
    <title>Halaman Foto</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>

    <nav>
        <h1>Halaman Foto</h1>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <p>Selamat Datang <b>
            <?= $_SESSION['NamaLengkap'] ?>
        </b></p>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input required type="text" name="judulFoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsiFoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasiFile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php
                        include "koneksi.php";
                        $userid = $_SESSION['UserID'];
                        $sql = mysqli_query($conn, "SELECT * FROM album WHERE UserID='$userid'");
                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?= $data['AlbumID'] ?>">
                                <?= $data['NamaAlbum'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Tambahkan">
                </td>
            </tr>
        </table>
    </form>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Diunggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid = $_SESSION['UserID'];
        $sql = mysqli_query($conn, "SELECT * FROM foto,album where foto.UserID='$userid' AND foto.AlbumID=album.AlbumID");
        while ($data = mysqli_fetch_array($sql)) {

            ?>
            <tr>
                <td>
                    <?= $data['FotoID'] ?>
                </td>
                <td>
                    <?= $data['JudulFoto'] ?>
                </td>
                <td>
                    <?= $data['DeskripsiFoto'] ?>
                </td>
                <td>
                    <?= $data['TanggalUnggah'] ?>
                </td>
                <td>
                    <img width="200" src="gambar/<?= $data['LokasiFile'] ?>" alt="">
                </td>
                <td>
                    <?= $data['NamaAlbum'] ?>
                </td>
                <td>
                    <?php
                    $fotoid = $data['FotoID'];
                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="hapus_foto.php?fotoid=<?= $data['FotoID'] ?>">Hapus</a>
                    <a href="edit_foto.php?fotoid=<?= $data['FotoID'] ?>">Edit</a>
                </td>
            </tr>
            <?php
        }
        ?>


    </table>
</body>

</html>