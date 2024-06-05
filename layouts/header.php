<?php

if (isset($_SESSION['user_id'])) {
    $cart = array_query("SELECT COUNT(*) as jumlah FROM cart WHERE user_id = $_SESSION[user_id]");
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
                <li><a href="<?= base_url('index.php?page=menu') ?>">Menu</a></li>
            </ul>
        </nav>
        <div class="profile-header">
            <?php if (isset($_SESSION['login'])) :  ?>
                <div class="cart">
                    <a href="<?= base_url('index.php?page=cart') ?>"><i class="ri-shopping-cart-line"></i></a>
                    <div class="cart-count">
                        <?= $cart['jumlah'] ?>
                    </div>
                </div>
                <div class="dropdown">
                    <img src="<?= base_url("assets/upload/$_SESSION[user_img]") ?>" width="50" height="50" alt="">
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <div class="dropdown-menu">
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <a class="dropdown-item" href="<?= base_url('__backend/index.php') ?>">Admin</a>
                    <?php } ?>

                    <a class="dropdown-item" href="index.php?page=profile_user&subpage=profile">Profile</a>


                    <a class="dropdown-item" href="index.php?page=logout">Logout</a>

                </div>
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