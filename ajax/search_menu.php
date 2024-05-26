<?php

require_once('../function.php');

$keyword = $_GET['keyword'];

$menus = live_search_menu('menu', $keyword);

?>

<div class="wrap-menu wrap-menu-page">
    <?php foreach ($menus as $menu) : ?>
        <div class="card">
            <div class="card-img">
                <img src="https://source.unsplash.com/300x300/?food" alt="" />
            </div>
            <div class="card-content">
                <div class="card-title">
                    <h3><?= $menu['menu_name'] ?></h3>
                    <span>Rp. <?= number_format($menu['menu_price']) ?></span>
                </div>
                <button href="" class="btn">Pesan</button>
            </div>
        </div>
    <?php endforeach ?>
</div>