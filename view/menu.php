<?php

$menus = query("SELECT * FROM menu");

if (isset($_POST['order'])) {

    $menu_id = $_POST['order'];

    $q_menu = query("SELECT * FROM menu WHERE menu_id = $menu_id");

    foreach ($q_menu as $m) {
        $r_m = $m;
    }

    $q_cart = query("SELECT * FROM cart WHERE menu_id = $menu_id");

    foreach ($q_cart as $c) {
        $r_c = $c;
    }

    $cek = mysqli_num_rows($q_cart);

    if ($cek == 0) {
        $array_insert = [
            'user_id' => $_SESSION['user_id'],
            'menu_id' => $menu_id,
            'menu_img' => $r_m['menu_img'],
            'menu_ctg' => $r_m['menu_ctg'],
            'menu_name' => $r_m['menu_name'],
            'menu_price' => $r_m['menu_price'],
            'menu_qty' => 1
        ];

        insert_data('cart', $array_insert);
        header('Location: ../index.php');
    } else {
        $array_update = [
            'menu_qty' => $r_c['menu_qty'] + 1
        ];

        $conditions = [
            'menu_id' => $r_c['menu_id']
        ];

        update_data('cart', $array_update, $conditions);
        header('Location: ../index.php?page=menu');
    }
    header("Location: ../index.php?page=menu");
}

$_POST['filter'] = isset($_POST['filter']) ? $_POST['filter'] : 'semua';



if ($_POST['filter'] == 'ramen' || $_POST['filter'] == 'donburi' || $_POST['filter'] == 'drink') {
    $menus = query("SELECT * FROM menu WHERE menu_ctg = '$_POST[filter]'");
} else if ($_POST['filter'] == 'semua') {
    $menus = query("SELECT * FROM menu");
} else if ($_POST['filter'] == 'urutkan') {
    $menus = query("SELECT * FROM menu ORDER BY menu_name ASC");
}
?>

<section id="menu" class="container">
    <div class="header-text">
        <h1>Menu Kami</h1>
        <p>Pilih menu makanan favorit Anda dan nikmati makanan lezat yang kami sediakan!</p>
    </div>

    <?php

    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $menus = live_search_menu("SELECT * FROM menu WHERE menu_name LIKE '%$keyword%' OR menu_ctg LIKE '%$keyword%' OR menu_price LIKE '%$keyword%'");
    }

    ?>
    <form action="" method="POST">
        <div class="search-menu">
            <input id="search" type="text" placeholder="Cari menu makanan" name="keyword" class="keyword">
            <button type="submit" name="search" class="btn=search"><i class="ri-search-line"></i></button>
        </div>
        <div class="category">
            <button name="filter" value="semua" class="btn-ctg <?= $_POST['filter'] === 'semua' ? 'active' : '' ?>">All</button>
            <button name="filter" value="ramen" class="btn-ctg <?= $_POST['filter'] === 'ramen' ? 'active' : '' ?>">Ramen</button>
            <button name="filter" value="donburi" class="btn-ctg <?= $_POST['filter'] === 'donburi' ? 'active' : '' ?>">Donburi</button>
            <button name="filter" value="drink" class="btn-ctg <?= $_POST['filter'] === 'drink' ? 'active' : '' ?>">Drink</button>
            <button name="filter" value="urutkan" class="btn-ctg <?= $_POST['filter'] === 'urutkan' ? 'active' : '' ?>">A-Z</button>
        </div>
    </form>
    <div class="wrap-menu wrap-menu-page">
        <?phP

        if (mysqli_num_rows($menus) == 0) {
            echo "<p style='font-size:2rem; margin-top:60px;'>Tidak ada menu yang tersedia</p>";
        }

        ?>
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
</section>