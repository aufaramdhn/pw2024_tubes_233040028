<section id="home" class="container">
    <div class="wrap-home">
        <div class="deskripsi-home">
            <h1>Welcome to BowlRealm A Practical and Delicious Food Ordering Solution!</h1>
            <p>Your online destination to order your favorite food easily and quickly. With us, you no longer need to bother leaving the house or calling restaurants, as all your orders can be processed with just a few clicks!</p>
            <a href="" class="btn">Select Menu</a>
        </div>
        <div class="img-home">
            <img src="/assets/picture/login.jpg" alt="" />
        </div>
    </div>
</section>

<section id="menu-count" class="container">
    <div class="wrap-menu-count">
        <div class="food-menu">
            <h3>3+</h3>
            <p>Menu Makanan</p>
        </div>
        <div class="experience">
            <h3>3+</h3>
            <p>Pengalaman Pelayanan</p>
        </div>
    </div>
</section>

<section id="about" class="container">
    <div class="header-text">
        <h1>About Us</h1>
    </div>
    <div class="wrap-about">
        <div class="photo-about">
            <img src="<?= base_url('assets/picture/about.png') ?>" alt="" />
        </div>
        <div class="deskripsi-about">
            <p>Welcome to BowlRealm, your ultimate destination for an authentic Japanese culinary experience! At BowlRealm, we are passionate about bringing the rich flavors and traditions of Japan to your table through our carefully crafted donburi and ramen dishes.</p>

            <p>
                Founded by a team of food enthusiasts with a deep love for Japanese cuisine, BowlRealm was born out of a desire to share the exquisite taste and cultural heritage of Japan with the world. Our journey began with a simple mission: to create a space where people can enjoy the finest Japanese bowls made with the freshest ingredients and time-honored techniques.</p>

            <p>
                At BowlRealm, we believe in the power of a great meal to bring people together and create lasting memories. We are committed to providing an exceptional dining experience that combines traditional Japanese recipes with a modern twist. Each bowl we serve is a testament to our dedication to quality, authenticity, and innovation.</p>
        </div>
</section>

<?php

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
        header('Location: ../index.php');
    }
    header("Location: ../index.php");
}

?>

<section id="menu-page">
    <div class="header-text">
        <h1>Our Menus</h1>
        <p class="container">Choose your favorite meal menu and enjoy the delicious food we provide!</p>
    </div>
    <div class="container">
        <div class="wrap-menu">
            <?php
            $menus = query("SELECT * FROM menu ORDER BY RAND() LIMIT 4");
            if (mysqli_num_rows($menus) == 0) {
                echo "<p style='font-size:2rem; margin-top:60px;'>Tidak ada menu yang tersedia</p>";
            }
            foreach ($menus as $menu) : ?>
                <div class="card">
                    <div class="card-img">
                        <img src="<?= base_url("assets/upload/$menu[menu_img]") ?>" alt="" />
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
            <?php endforeach; ?>
        </div>
        <!-- <a class="btn btn-all-menu" href="index.php?page=menu">See all menu</a> -->
    </div>

</section>


<section id="review">
    <div class="header-text">
        <h1>Reviews</h1>
    </div>


    <div class="wrap-review">
        <?php

        $reviews = array_query("SELECT * FROM review NATURAL JOIN user ORDER BY RAND() LIMIT 10");

        foreach ($reviews as $review) :

        ?>
            <div class="card">
                <div class="card-img img-review">
                    <img src="/assets/upload/<?= $review['user_img'] ?>" alt="">
                </div>
                <div class="card-body">
                    <h3><?= $review['user_name'] ?></h3>
                    <p><?= $review['review_text'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>