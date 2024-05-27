<?php

require_once('../function.php');

if (isset($_POST['register'])) {
    $login = register($_POST);
}

if (isset($_SESSION['message'])) {
    echo "<script>
        alert('$_SESSION[message]');
    </script>";
    unset($_SESSION['message']);
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
                    <h2>Register</h2>
                </div>
                <form action="" method="POST">
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
    </div>
</body>

</html>