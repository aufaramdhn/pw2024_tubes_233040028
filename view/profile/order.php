<?php

$orders = dynamic_join(
    ['menu_order', 'menu', 'user'],
    ['menu.menu_id = menu_order.menu_id', 'user.user_id = menu_order.user_id'],
    'INNER',
    'menu_order.trx_id,
    MAX(menu_order.order_status) as status, 
    MAX(menu_order.order_date) as date, 
    MAX(menu_order.qty_order) as qty, 
    SUM(menu_order.qty_order * menu.menu_price) as price',
    'menu_order.user_id = ' . $_SESSION['user_id'],
    'menu_order.trx_id'

);


?>

<section id="order">
    <div class="wrap-order">
        <?php

        if (empty($orders)) :
            echo "<h1 style='text-align:center; margin-top:50px;'>You haven't made any orders yet</h1>";
        endif

        ?>
        <?php foreach ($orders as $order) : ?>
            <?php  ?>
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <h3 style="margin-bottom:10px;">#<?= $order['trx_id'] ?></h3>
                        <span style="margin-bottom:10px;">Rp. <?= number_format($order['price']) ?></span>
                    </div>
                    <div class="">
                        <h4><?= $order['date'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="status">
                        <?php if ($order['status'] = 'pending') : ?>
                            <span class="status-pending">Pending</span>
                        <?php elseif ($order['status'] = 'success') : ?>
                            <span class="status-success">Success</span>
                        <?php endif ?>
                    </div>
                    <div class="detail">
                        <a href="index.php?page=receipt&trx_id=<?= $order['trx_id'] ?>">See Detail</a>
                    </div>
                </div>
                <div class="review">
                    <a href="index.php?page=profile_user&subpage=review">leave a review</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>