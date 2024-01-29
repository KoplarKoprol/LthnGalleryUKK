<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>

<body>
    <h1>Halaman Registrasi</h1>
    <form action="proses_register.php" method="post">
        <table>
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