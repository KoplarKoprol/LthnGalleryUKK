<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="gaya.css">
</head>

<body>
    <nav class="navbar">
        <h1>Halaman Login</h1>
        <ul>
            <li><a href="index.php">Beranda</a></li>
        </ul>
    </nav>
    <form action="proses_login.php" method="post">
        <table class="tabelos" cellspacing="20">
            <tr>
                <td align="center"
                    style="color:gold; font-size: xx-large; background-color:crimson; border-radius:25px;" colspan="2">
                    LOGIN</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td align="right"><input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>