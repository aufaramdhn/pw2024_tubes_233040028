<?php

if (isset($_SESSION['user_id'])) {
    $cart = array_query("SELECT * FROM cart WHERE user_id = {$_SESSION['user_id']}");
} else {
    $cart = [];
}

?>

<header class="header-nav">
    <div class="container">
        <div class="logo">
            <h1>FOOD</h1>
        </div>
        <nav>
            <ul>
                <li><a href="<?= base_url('index.php') ?>">Home</a></li>
                <li><a href="<?= base_url('#') ?>">About</a></li>
                <li><a href="<?= base_url('#') ?>">Services</a></li>
                <li><a href="<?= base_url('index.php?page=menu') ?>">Menu</a></li>
                <li><a href="<?= base_url('#') ?>">Contact Us</a></li>
            </ul>
        </nav>
        <div class="profile-header">
            <?php if (isset($_SESSION['login'])) :  ?>
                <div class="cart">
                    <a href="<?= base_url('index.php?page=cart') ?>"><i class="ri-shopping-cart-line"></i></a>
                    <div class="cart-count">
                        <?= count($cart) ?>
                    </div>
                </div>
                <div class="dropdown">
                    <img src="https://source.unsplash.com/35x35/?nature,water" alt="">
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <ul class="dropdown-menu">
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <li><a href="index.php?page=admin">Admin</a></li>
                    <?php } ?>
                    <li>
                        <a href="index.php?page=profile">Profile</a>
                    </li>
                    <li>
                        <a href="index.php?page=logout">Logout</a>
                    </li>
                </ul>
            <?php else : ?>
                <a href="auth/login.php">Login</a>
            <?php endif ?>
        </div>
    </div>
</header>
<main>
    <?php

    if (isset($_SESSION['message'])) { ?>
        <div class="alert">
            <div class="alert-content">
                <span id="alert"><?= $_SESSION['message'] ?></span>
                <button><i class="ri-close-large-line"></i></button>
            </div>
        </div>
        </script>
    <?php
        unset($_SESSION['message']);
    } ?>