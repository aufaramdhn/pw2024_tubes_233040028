<?php

$users = array_query("SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'");

var_dump($users);

?>

<section id="profile">
    <div class="wrap-profile container">
        <div class="navigation">
            <div class="profile-img">
                <img src="<?= base_url("assets/upload/$_SESSION[user_img]") ?>" alt="" width="250" height="250">
            </div>
            <div class="profile-nav">
                <a href="index.php?page=profile_user&subpage=profile"><i class="ri-user-line"></i> Profile</a>
                <!-- <a href=""><i class="ri-shopping-cart-line"></i> Cart</a> -->
                <a href="index.php?page=profile_user&subpage=order"><i class="ri-file-list-2-line"></i> Order</a>
            </div>
        </div>
        <div class="profile-content">
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
            }


            ?>
        </div>
    </div>
</section>