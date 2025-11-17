<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta nam="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="assets/css/auth.css" rel="stylesheet" type="text/css"/>
</head>
<body>
 <div class="container">
    <div class="auth-card">
    <h2>Register</h2>
    <form action="" method="POST">
        <div>
            <label class="labelauth" for="input">Nama</label>
            <input class="inputauth" type="text" name="nama" placeholder="Masukkan Nama">
        </div>
        <div>
            <label class="labelauth" for="input">Email</label>
            <input class="inputauth" type="email" name="email" placeholder="Masukkan Email">
        </div>
        <div>
            <label class="labelauth" for="input">Password</label>
            <input class="inputauth" type="password" name="password" placeholder="Masukkan Password">
        </div>
        <div>
            <input type="submit" value="Next" class="nextButton">
        </div>
    </form>
    <p class="authp">Sudah punya akun? <a class="aauth" href="?pages=login">Log-In</a></p>
    <p class="authp">Dengan mendaftar, saya mengakui telah membaca dan menyetujui <a class="aauth" href="">Syarat, Ketentuan dan Kebijakan</a> & <a class="aauth" href="">Kebijakan Privasi</a>.</p>
    </div>
 </div>
</body>
</html>