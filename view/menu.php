<?php

$menus = query("SELECT * FROM menu");

if (isset($_POST['search'])) {
    $menus = live_search_menu('menu', $_POST['keyword']);
}

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
?>

<section id="menu" class="container">
    <div class="header-text">
        <h1>Menu Kami</h1>
        <p>Pilih menu makanan favorit Anda dan nikmati makanan lezat yang kami sediakan!</p>
    </div>
    <form action="" method="POST">
        <div class="search-menu">
            <input id="search" type="text" placeholder="Cari menu makanan" name="keyword" class="keyword">
            <button type="submit" name="search" class="btn=search"><i class="ri-search-line"></i></button>
        </div>
    </form>
    <!-- <div class="wrap-menu-category">
        <label for="All">All</label>
        <input type="checkbox" name="" id="All" value="All">
        <label for="Pizza">Pizza</label>
        <input type="checkbox" name="" id="Pizza" value="Pizza">
        <label for="Burger">Burger</label>
        <input type="checkbox" name="" id="Burger" value="Burger">
        <label for="Fried">Fried</label>
        <input type="checkbox" name="" id="Fried" value="Fried">
    </div> -->
    <div class="wrap-menu wrap-menu-page">
        <?phP

        if (mysqli_num_rows($menus) == 0) {
            echo "<p style='font-size:2rem; margin-top:60px;'>Tidak ada menu yang tersedia</p>";
        }

        ?>
        <?php foreach ($menus as $menu) : ?>
            <div class="card">
                <div class="card-img">
                    <!-- <img src="https://source.unsplash.com/300x300/?food" alt="" /> -->
                </div>
                <div class="card-content">
                    <div class="card-title">
                        <h3><?= $menu['menu_name'] ?></h3>
                        <span>Rp. <?= number_format($menu['menu_price']) ?></span>
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