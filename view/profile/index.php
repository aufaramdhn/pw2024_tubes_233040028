<?php

$page = isset($_GET['subpage']) ? $_GET['subpage'] : 'profile';

$pages = [
    'profile' => ['title' => 'Profile User'],
    'order' => ['title' => 'Orders'],
    'security' => ['title' => 'Change Password'],
    'review' => ['title' => 'Review'],
];

$currentPage = isset($pages[$page]) ? $pages[$page] : $pages['profile'];
$title = $currentPage['title'];
?>

<section id="profile">
    <div class="wrap-profile container">
        <div class="navigation">
            <div class="profile-img">
                <img src="<?= base_url("assets/upload/$users[user_img]") ?>" alt="" width="250" height="250">
            </div>
            <div class="profile-nav">
                <a class="<?= $page === 'profile' ? 'active' : '' ?>" href="index.php?page=profile_user&subpage=profile"><i class="ri-user-line"></i> Profile</a>
                <!-- <a href=""><i class="ri-shopping-cart-line"></i> Cart</a> -->
                <a class="<?= $page === 'order' ? 'active' : '' ?>" href="index.php?page=profile_user&subpage=order"><i class="ri-file-list-2-line"></i> Order</a>
                <a class="<?= $page === 'security' ? 'active' : '' ?>" href="index.php?page=profile_user&subpage=security"><i class="ri-git-repository-private-line"></i> Security</a>
            </div>
        </div>
        <div class="profile-content">

            <div class="header-profile">
                <h2><?= $title ?></h2>
            </div>

            <?php
            if (isset($_GET['subpage'])) {
                $page = $_GET['subpage'];
            } else {
                $page = 'profile_user';
            }

            switch ($page) {

                case 'profile':
                    include('profile.php');
                    break;

                case 'order':
                    include('order.php');
                    break;

                case 'security':
                    include('security.php');
                    break;

                case 'review':
                    include('review.php');
                    break;
            }


            ?>
        </div>
    </div>
</section>