<?php

require_once('../function.php');

$keyword = $_GET['keyword'];

$menus = live_search_menu("SELECT * FROM menu WHERE menu_name LIKE '%$keyword%' OR menu_ctg LIKE '%$keyword%' OR menu_price LIKE '%$keyword%'");

?>

<div class="wrap-menu wrap-menu-page">
    <?php
    foreach ($menus as $menu) : ?>
        <div class="card">
            <div class="card-img">
                <img src="<?= base_url("assets/upload/$menu[menu_img]") ?>" width="300" height="300" alt="" />
            </div>
            <div class="card-content">
                <div class="card-title">
                    <h3><?= $menu['menu_name'] ?></h3>
                    <span>Rp. <?= number_format($menu['menu_price'], '0', '.', '.') ?></span>
                </div>
                <?php if (isset($_SESSION['login'])) { ?>
                    <form action="" method="POST">
                        <button class="btn" type="submit" name="order" value="<?= $menu['menu_id'] ?>">Order</button>
                    </form>
                <?php } else { ?>
                    <button class="btn" onclick="alert('Silahkan Login terlebih dahulu')">Pesan</button>
                <?php } ?>
            </div>
        </div>
    <?php endforeach ?>
</div>