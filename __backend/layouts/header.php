<?php


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

?>

<header class="topbar">
    <div class="topbar-logo">
        <button class="toggle nav-toggle" id="navToggle">
            <i class="ri-align-left"></i>
        </button>
        <img src="<?= base_url('assets/picture/logo.png') ?>" width="55" height="55" alt="">
    </div>
    <div class="topbar-img">
        <h3><?= $_SESSION['fullname'] ?></h3>
        <img src="<?= base_url("assets/upload/$_SESSION[user_img]") ?>" width="46" height="46">
    </div>
</header>
<div class="wrap">
    <div class="sidebar none">
        <div class="nav-list">
            <a href="<?= base_url('index.php') ?>">
                <i class="ri-home-6-line"></i>
                <span class="nav-title">
                    Home
                </span>
            </a>
            <a href="index.php?page=index" class="<?= $page === 'index' ? 'active' : '' ?>">
                <i class="ri-gallery-view-2"></i>
                <span class="nav-title">
                    Dashboard
                </span>
            </a>
            <a href="index.php?page=user" class="<?= $page === 'user' ? 'active' : '' ?>">
                <i class="ri-user-line"></i>
                <span class="nav-title">
                    Users
                </span>
            </a>
            <a href="index.php?page=menu" class="<?= $page === 'menu' ? 'active' : '' ?>">
                <i class="ri-file-list-2-line"></i>
                <span class="nav-title">
                    Menus
                </span>
            </a>
            <a href="index.php?page=order" class="<?= $page === 'order' ? 'active' : '' ?>">
                <i class="ri-shopping-cart-2-line"></i>
                <span class="nav-title">
                    Orders
                </span>
            </a>
        </div>
        <a href="logout.php" class="logout">
            <i class="ri-logout-box-line"></i>
            <span class="nav-title">Logout</span>
        </a>
    </div>
    <div class="wrap-content">
        <div class="content">
            <div class="header-text">
                <h1><?= $title ?></h1>
            </div>