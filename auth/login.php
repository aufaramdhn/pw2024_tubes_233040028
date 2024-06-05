<?php

require_once('../function.php');

if (isset($_POST['login'])) {
    $login = login($_POST);
}

if (isset($_SESSION['message'])) {
    echo "<script>
        alert('$_SESSION[message]');
    </script>";
    // unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login-register.css">
</head>

<body>
    <div class="container">
        <div class="wrap">
            <div class="wrap-img">
                <img src="../assets/picture/login.jpg" alt="">
            </div>
            <div class="wrap-form">
                <div class="header-text">
                    <h2>Login</h2>
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="form-checkbox">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="forgot-password">
                        <a href="">Forgot Password?</a>
                    </div>
                    <button type="submit" name="login" class="btn">Login</button>
                </form>
                <div class="register">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>