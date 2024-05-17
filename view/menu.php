<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
</body>

</html>