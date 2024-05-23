<?php

require_once('function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>

    <?php include(BASE_PATH . 'layouts\\header.php'); ?>

    <?php include(BASE_PATH . 'apps\\routing_frontend.php'); ?>

    <?php include(BASE_PATH . 'layouts\\footer.php'); ?>


</body>

</html>