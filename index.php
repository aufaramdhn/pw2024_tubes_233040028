<?php

require_once('function.php');

// if (!isset($_SESSION['login'])) {
//     header("Location: login.php");
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header-nav">
        <div class="container">
            <div class="logo">
                <h1>FOOD</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Menu</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </nav>
            <div class="profile">
                <div class="toggle-dropdown">
                    <button>X</button>
                </div>
                <?php if (isset($_SESSION['login'])) :  ?>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="">Logout</a>
                            <a href="">Logout</a>
                            <a href="">Logout</a>
                            </ul>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="auth/login.php">Login</a>
                <?php endif ?>
            </div>
        </div>
    </header>
    <section id="home" class="container">
        <div class="wrap-home">
            <div class="deskripsi-home">
                <h1>Selamat Datang di [Nama Situs]: Solusi Pemesanan Makanan yang Praktis dan Lezat!</h1>
                <p>Destinasi online Anda untuk memesan makanan favorit Anda dengan mudah dan cepat. Dengan kami, Anda tidak perlu lagi repot-repot keluar rumah atau menelepon restoran, karena semua pesanan Anda dapat diproses hanya dengan beberapa klik!</p>
                <a href="" class="btn">Pilih Menu</a>
            </div>
            <div class="photo-home">
                <img src="https://source.unsplash.com/400x400/?nature,water" alt="" />
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

    <section id="menu" class="container">
        <div class="header-text">
            <h1>Menu Kami</h1>
            <p>Pilih menu makanan favorit Anda dan nikmati makanan lezat yang kami sediakan!</p>
        </div>
        <div class="wrap-menu">
            <div class="card">
                <div class="card-img">
                    <img src="https://source.unsplash.com/300x300/?food" alt="" />
                </div>
                <div class="card-content">
                    <h3>Menu 1</h3>
                    <p>$13</p>
                    <a href="" class="btn">Pesan</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://source.unsplash.com/300x300/?food" alt="" />
                </div>
                <div class="card-content">
                    <h3>Menu 1</h3>
                    <p>$13</p>
                    <a href="" class="btn">Pesan</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://source.unsplash.com/300x300/?food" alt="" />
                </div>
                <div class="card-content">
                    <h3>Menu 1</h3>
                    <p>$13</p>
                    <a href="" class="btn">Pesan</a>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="https://source.unsplash.com/300x300/?food" alt="" />
                </div>
                <div class="card-content">
                    <h3>Menu 1</h3>
                    <p>$13</p>
                    <a href="" class="btn">Pesan</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="wrap-footer">
                <div class="footer-logo">
                    <h1>FOOD</h1>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Menu</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-social">
                    <ul>
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Instagram</a></li>
                        <li><a href="">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 FOOD. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>