<?php

require_once('../function.php');

if (isset($_POST['register'])) {
    $login = register($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | BowlRealm</title>
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
                <h2>Register</h2>
            </div>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="cPassword">Confirm Password</label>
                    <input type="password" name="cPassword" id="cPassword">
                </div>
                <div class="">
                    <input type="hidden" name="id_role" value="2">
                </div>
                <button type="submit" name="register" class="btn">Register</button>
            </form>
            <div class="login">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>