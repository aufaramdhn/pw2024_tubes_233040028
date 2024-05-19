<?php


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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
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
                    <li><a href="view/menu.php">Menu</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </nav>
            <div class="profile">
                <div class="cart">
                    C
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

    <section id="profile">
        <div class="wrap-profile container">
            <div class="navigation">
                <div class="profile-img">
                    <img src="https://source.unsplash.com/250x250/?nature,water" alt="">
                </div>
                <div class="profile-nav">
                    <a href=""><i class="ri-user-line"></i> Profile</a>
                    <a href=""><i class="ri-shopping-cart-line"></i> Cart</a>
                    <a href=""><i class="ri-file-list-2-line"></i> Order</a>
                </div>
            </div>
            <div class="profile-content">
                <div class="header-profile">
                    <h2>Profile</h2>
                </div>
                <form action="">
                    <div class="wrap-form">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="cPassword">Confirm Password</label>
                                <input type="password" name="cPassword" id="cPassword">
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="cPassword">Confirm Password</label>
                                <input type="password" name="cPassword" id="cPassword">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="register" class="btn">Register</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>