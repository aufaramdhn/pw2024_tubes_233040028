<?php include('../function.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>

<body>

    <?php include('layouts/header.php'); ?>

    <?php

    $page = $_GET['page']; // To get the page

    if ($page == null) {
        $page = 'index'; // Set page to index, if not set
    }
    switch ($page) {

        case 'index':
            include('dashboard.php');
            break;

        case 'users':
            include('users/users.php');
            break;

        case 'add_user':
            include('users/add_user.php');
            break;

        case 'contact':
            include('contact.php');
            break;
    }

    ?>

    <?php include('layouts/footer.php'); ?>

</body>

</html>