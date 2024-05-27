<?php

$orders = query("SELECT * FROM cart WHERE user_id = $_SESSION[user_id]");

?>

<section id="cart">
    <div class="header-text">
        <h1>Cart</h1>
        <p>Choose your favorite menu</p>
    </div>

    <div class="container">
        <?php if (empty($_SESSION['cart'])) : ?>
            <h1>Your Cart is Empty</h1>
            <p>Looks like you haven't added anything to your cart yet</p>
            <a href="index.php?page=menu">Start Shopping</a>
        <?php else : ?>
            <?php foreach ($orders as $order) :
            ?>
                <div class="wrap-cart">
                    <div class="wrap-cart-img">
                        <img src="https://source.unsplash.com/200x200/?food" alt="cart">
                    </div>
                    <div class="cart-content">
                        <div class="wrap-cart-text">
                            <div class="wrap-cart-title">
                                <h3><?= $order['menu_name'] ?></h3>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae quis
                                </p>
                            </div>
                            <div class="wrap-cart-price">
                                <p>Rp. <?= number_format($order['menu_price']) ?></p>
                            </div>
                        </div>
                        <div class="wrap-cart-qty">
                            <div class="cart-qty">
                                <button onclick="updateQuantity('<?php echo $order['menu_id']; ?>', 'decrease')"><i class="ri-subtract-line"></i></button>
                                <span><?= $order['menu_qty'] ?></span>
                                <button onclick="updateQuantity('<?php echo $order['menu_id']; ?>', 'increase')"><i class="ri-add-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif ?>
        <div class="wrap-total">
            <div class="total">
                <h3>Total</h3>
                <p>Rp. 1000000</p>
            </div>
            <button class="btn btn-checkout">Checkout</button>
        </div>
    </div>
</section>