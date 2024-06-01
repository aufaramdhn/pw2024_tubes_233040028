<section id="home" class="container">
    <div class="wrap-home">
        <div class="deskripsi-home">
            <h1>Selamat Datang di [Nama Situs]: Solusi Pemesanan Makanan yang Praktis dan Lezat!</h1>
            <p>Destinasi online Anda untuk memesan makanan favorit Anda dengan mudah dan cepat. Dengan kami, Anda tidak perlu lagi repot-repot keluar rumah atau menelepon restoran, karena semua pesanan Anda dapat diproses hanya dengan beberapa klik!</p>
            <a href="" class="btn">Pilih Menu</a>
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
        <!-- <div class="vertical-line"></div> -->
        <div class="drink-menu">
            <h3>3+</h3>
            <p>Menu Minuman</p>
        </div>
        <!-- <div class="vertical-line"></div> -->
        <div class="experience">
            <h3>3+</h3>
            <p>Pengalaman Pelayanan</p>
        </div>
    </div>
</section>

<section id="about" class="container">
    <div class="wrap-about">
        <div class="photo-about">
            <img src="https://source.unsplash.com/400x400/?nature,water" alt="" />
        </div>
        <div class="deskripsi-about">
            <h1>About Us</h1>
            <p>FOOD adalah layanan pemesanan makanan online yang menyediakan berbagai macam menu makanan lezat dan bergizi. Kami berkomitmen untuk memberikan layanan terbaik bagi pelanggan kami, dengan menyediakan makanan yang berkual</p>
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
        <p>Pilih menu makanan favorit Anda dan nikmati makanan lezat yang kami sediakan!</p>
    </div>
    <div class="container">
        <div class="wrap-menu">
            <?php
            $menus = array_query("SELECT * FROM menu ORDER BY RAND() LIMIT 4");

            shuffle($menus);
            foreach ($menus as $menu) : ?>
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
            <?php endforeach; ?>
        </div>
        <!-- <a class="btn btn-all-menu" href="index.php?page=menu">See all menu</a> -->
    </div>

</section>

<section id="contact">
    <div class="container">
        <div class="header-text">
            <h1>Contact Us</h1>
            <!-- <p>Hubungi kami jika Anda memiliki pertanyaan atau masalah terkait layanan kami. Kami akan dengan senang hati membantu Anda!</p> -->
        </div>
        <div class="wrap-contact">
            <form action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" type="text" cols="4" rows="4" contenteditable="true"></textarea>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
        </div>
    </div>
</section>