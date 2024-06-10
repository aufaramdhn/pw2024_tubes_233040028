<?php

require_once('../function.php');

if (isset($_POST['login'])) {
    $login = login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BowlRealm</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/picture/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login-register.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <?php
    if (isset($_SESSION['message'])) { ?>
        <div class="alert">
            <div class="alert-content">
                <span id="alert"><?= $_SESSION['message'] ?></span>
                <button id="close-alert" onclick="closeAlert()"><i class="ri-close-large-line"></i></button>
            </div>
        </div>
        </script>
    <?php
    } else {
        unset($_SESSION['message']);
    }

    ?>
    <div class="wrap">
        <div class="wrap-img">
            <img src="../assets/picture/login.jpg" alt="">
        </div>
        <div class="wrap-form">
            <div class="logo">
                <img src="../assets/picture/logo.png" alt="" width="150" height="150">
            </div>
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
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
            <div class="register">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>