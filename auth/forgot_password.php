<?php

require_once('../function.php');

if (isset($_POST['forgot'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    $user = array_query("SELECT * FROM user WHERE username = '$username'");

    if ($user['username'] == $username) {
        if ($password == $cPassword) {

            $array_update = [
                'password' => $password
            ];

            $condition = ['username' => $username];

            update_data('user', $array_update, $condition);

            $_SESSION['message'] = "Password berhasil diubah!";
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['message'] = "Password tidak sama!";
            header('Location: forgot_password.php');
            exit;
        }
    } else {
        $_SESSION['message'] = "Username tidak ditemukan!";
        header('Location: forgot_password.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | BowlRealm</title>
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
    }
    unset($_SESSION['message']);
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
                <h2>Forgot Password</h2>
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
                <div class="form-group">
                    <label for="cPassword">Confirm Password</label>
                    <input type="password" name="cPassword" id="cPassword">
                </div>
                <button type="submit" name="forgot" class="btn">Login</button>
            </form>
            <div class="register">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>