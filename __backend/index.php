<?php

include('../function.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: ../index.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowl Realm | Admin Page</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/picture/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('__backend/assets/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>

    <?php include('page.php'); ?>

    <?php include('layouts/header.php'); ?>

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
        unset($_SESSION['message']);
    } ?>


    <?php include('routing.php'); ?>

    <?php include('layouts/footer.php'); ?>

    <script src="<?= base_url('__backend/assets/script.js') ?>"></script>

</body>

</html>