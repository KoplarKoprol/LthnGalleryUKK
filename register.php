<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>
    <nav class="navbar">
        <h1>Halaman Registrasi</h1>
        <ul>
            <li><a href="index.php">Beranda</a></li>
        </ul>
    </nav>
    <form action="proses_register.php" method="post">
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <table class="tabelos" cellspacing="20">
            <tr>
                <td>Username</td>
                <td><input required type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input required type="password" name="password"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input required type="email" name="email"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input required type="text" name="namaLengkap"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input required type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>

</html>