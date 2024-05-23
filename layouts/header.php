<header class="header-nav">
    <div class="container">
        <div class="logo">
            <h1>FOOD</h1>
        </div>
        <nav>
            <ul>
                <li><a href="<?= base_url('index.php') ?>">Home</a></li>
                <li><a href="<?= base_url('#') ?>">About</a></li>
                <li><a href="<?= base_url('#') ?>">Services</a></li>
                <li><a href="<?= base_url('index.php?page=menu') ?>">Menu</a></li>
                <li><a href="<?= base_url('#') ?>">Contact Us</a></li>
            </ul>
        </nav>
        <div class="profile">
            <div class="cart">
                <a href="<?= base_url('index.php?page=cart') ?>">c</a>
            </div>
            <div class="toggle-dropdown">
                <img src="https://source.unsplash.com/35x35/?nature,water" alt="">
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
<main>