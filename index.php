<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['UserID'])) {
        ?>
        <nav>
            <tr>
                <td><a href="index.php">Beranda</a></td>
                <td><a href="register.php">Register</a></td>
                <td><a href="login.php">Login</a></td>
            </tr>
        </nav>
        <?php
    } else {
        ?>
        <nav>
            <h1>Beranda</h1>
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
        <?php
    }
    ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Pengunggah</th>
            <th>Jumlah Suka</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, "SELECT * FROM foto,user WHERE  foto.UserID=user.UserID");
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
                    <img src="gambar/<?= $data['LokasiFile'] ?>" width="200">
                </td>
                <td>
                    <?= $data['NamaLengkap'] ?>
                </td>
                <td>
                    <?php
                    $fotoid = $data['FotoID'];
                    $sql2 = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
                    echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="like.php?fotoid=<?= $data['FotoID'] ?>">Suka</a>
                    <a href="komentar.php?fotoid=<?= $data['FotoID'] ?>">Komentar</a>
                </td>

            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>