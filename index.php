<?php

require_once('function.php');

if (isset($_SESSION['login'])) {
    $users = array_query("SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bowl Realm</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/picture/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/menu.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/cart.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/receipt.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>

    <?php include('layouts/header.php'); ?>

    <?php include('apps/routing_frontend.php'); ?>

    <?php include('layouts/footer.php'); ?>

    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script src="<?= base_url('assets/js/live_search.js') ?>"></script>
    <script src="<?= base_url('assets/js/add_cart.js') ?>"></script>
</body>

</html>