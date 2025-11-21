<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta nam="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="assets/css/auth.css" rel="stylesheet" type="text/css"/>
</head>
<body>
 <div class="container">
    <div class="auth-card">
    <h2>Sign In</h2>
    <form action="" method="POST">
        <div>
            <label class="labelauth" for="input">Email</label>
            <input class="inputauth" type="email" name="email" placeholder="Masukkan Email">
        </div>
        <div>
            <label class="labelauth" for="input">Password</label>
            <input class="inputauth" type="password" name="password" placeholder="Masukkan Password">
        </div>
        <div>
            <input type="submit" name="login" value="Next" class="nextButton">
        </div>
    </form>
    <p class="authp"><a class="aauth" href="login.php">Forgot Password?</a></p>
    <p class="authp">Belum punya akun? <a class="aauth" href="?pages=register">Register</a>.</p>
    </div>
 </div>
 <?php
require 'Function/function.php';

if (isset($_POST['login'])) {
    $result = login($_POST['email'], $_POST['password']);

    if ($result['status']) {
        if ($result['role'] == 'admin') {
            header("Location: ../Admin/Admin/index.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo $result['msg'];
    }
}
?>
</body>
</html>