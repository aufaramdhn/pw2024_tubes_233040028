<?php

$id = $_SESSION['user_id'];

$carts = query("SELECT * FROM cart WHERE user_id = $id");

$grand_total = 0;

foreach ($carts as $cart) {
    $total = $cart['menu_price'] * $cart['menu_qty'];
    $grand_total += $total;

    $r_cart = $cart;
}


if (isset($_POST['increase'])) {
    $menu_id = $_POST['increase'];


    $current_qty = array_query("SELECT * FROM cart WHERE user_id = '$id' AND menu_id = '$menu_id'")['menu_qty'];


    $new_qty = $current_qty + 1;


    $array_update = [
        'menu_qty' => $new_qty
    ];
    $conditions = [
        'user_id' => $id,
        'menu_id' => $menu_id
    ];

    update_data('cart', $array_update, $conditions);

    header('Location: index.php?page=cart');
    exit;
} elseif (isset($_POST['decrease'])) {
    $menu_id = $_POST['decrease'];


    $current_qty = array_query("SELECT * FROM cart WHERE user_id = '$id' AND menu_id = '$menu_id'")['menu_qty'];


    if ($current_qty > 1) {

        $new_qty = $current_qty - 1;


        $array_update = [
            'menu_qty' => $new_qty
        ];
        $conditions = [
            'user_id' => $id,
            'menu_id' => $menu_id
        ];

        update_data('cart', $array_update, $conditions);
    } else {

        $conditions = [
            'user_id' => $id,
            'menu_id' => $menu_id
        ];
        delete_data('cart', $conditions);
    }

    header('Location: index.php?page=cart');
    exit;
}


if (isset($_POST['checkout'])) {
    $orders = query("SELECT * FROM cart WHERE user_id = $id");

    $rand = generateCryptoRandomString(10);

    foreach ($orders as $order) {
        $array_insert = [
            'trx_id' => $rand,
            'user_id' => $order['user_id'],
            'menu_id' => $order['menu_id'],
            'qty_order' => $order['menu_qty'],
            'order_status' => 'Pending',
            'order_date' => date('Y-m-d')
        ];

        insert_data('menu_order', $array_insert);
    }

    $conditions = [
        'user_id' => $id
    ];

    delete_data('cart', $conditions);
    $_SESSION['message'] = 'Your order has been successfully placed';

    header('Location: index.php?page=receipt&trx_id=' . $rand);
    exit;
}




?>

<section id="cart">
    <div class="header-text">
        <h1>Cart</h1>
    </div>

    <div class="container">
        <?php if (mysqli_num_rows($carts) > 0) : ?>
            <?php foreach ($carts as $cart) :
            ?>
                <form action="" method="POST">
                    <input type="hidden" name="menu_id[]" value="<?= $cart['menu_id'] ?>">
                    <div class="wrap-cart">
                        <div class="wrap-cart-img">
                            <img src="assets/upload/<?= $cart['menu_img'] ?>" alt="cart" width="200" height="200">
                        </div>
                        <div class="cart-content">
                            <div class="wrap-cart-text">
                                <div class="wrap-cart-title">
                                    <h3><?= $cart['menu_name'] ?></h3>
                                    <p>Rp. <?= number_format($cart['menu_price'], '0', '.', '.') ?></p>
                                </div>
                            </div>
                            <div class="wrap-cart-qty">
                                <div class="cart-qty">
                                    <button type="submit" value="<?= $cart['menu_id'] ?>" name="decrease"><i class="ri-subtract-line"></i></button>
                                    <span><?= $cart['menu_qty'] ?></span>
                                    <button type="submit" value="<?= $cart['menu_id'] ?>" name="increase"><i class="ri-add-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="wrap-total">
                    <div class="total">
                        <h3>Total</h3>
                        <p>Rp. <?= number_format($grand_total, '0', '.', '.') ?></p>
                    </div>

                    <button type="submit" class="btn btn-checkout" name="checkout">Checkout</button>
                </div>
                </form>
            <?php else : ?>
                <div class="cart-empty">
                    <h1>Your Cart is Empty</h1>
                    <p>Looks like you haven't added anything to your cart yet</p>
                    <a class="btn" href="index.php?page=menu">Start Shopping</a>
                </div>
            <?php endif ?>
    </div>
</section>