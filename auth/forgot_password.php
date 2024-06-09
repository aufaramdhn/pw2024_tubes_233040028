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

            header('Location: login.php');
        } else {
            echo "<script>
                alert('Password tidak sama!');
            </script>";
        }
    } else {
        echo "<script>
            alert('Username tidak ditemukan!');
        </script>";
    }
}

// if (isset($_SESSION['message'])) {
//     echo "<script>
//         alert('$_SESSION[message]');
//     </script>";
//     unset($_SESSION['message']);
// }

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
</body>

</html>