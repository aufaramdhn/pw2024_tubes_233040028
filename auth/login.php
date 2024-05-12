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
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow-y: hidden;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
        }

        .wrap {
            display: flex;
            align-items: center;
        }

        .wrap-img {
            width: 68%;
            /* height: 100%; */

        }

        .wrap-img img {
            max-width: 100%;
            height: 100vh;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
        }

        .wrap-form {
            /* background-color: red; */
            padding: 80px;
            width: 32%;
            height: 100vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .wrap-form a {
            text-decoration: none;
        }

        .header-text h2 {
            margin-bottom: 20px;
            font-size: 32px;
            font-weight: 600;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 10px;
        }

        .form-group input {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            margin: 0 0 20px 0;
            float: left;
        }

        .forgot-password {
            margin-bottom: 20px;
            float: right;
        }

        .forgot-password a {
            text-decoration: none;
            color: #3498db;
        }

        .form-checkbox input[type="checkbox"] {
            margin-right: 10px;
        }

        .wrap-form button {
            width: 100%;
        }

        .btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-back {
            position: absolute;
            top: 40px;
            right: 80px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .register {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
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
            <a href="../index.php" class="btn btn-back">Back</a>
        </div>
    </div>
</body>

</html>