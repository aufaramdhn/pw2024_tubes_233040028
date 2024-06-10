<?php

$orders = dynamic_join(
    ['menu_order', 'menu', 'user'],
    ['menu.menu_id = menu_order.menu_id', 'user.user_id = menu_order.user_id'],
    'INNER',
    'menu_order.trx_id,
    user.user_name as fullname,
    menu_order.order_status as status, 
    menu_order.order_date as date, 
    menu_order.qty_order as qty, 
    menu.menu_price as price',
    'menu_order.trx_id = ' . $_GET['trx_id'],

);

$grand_total = 0;

if (isset($_GET['user_id'])) :
    delete_data('menu_order', ['user_id' => $_GET['user_id']]);
endif;

?>


<div class="page">
    <a href="index.php?page=index">Dashboard</a> / <a href="index.php?page=order">Order</a> / Order Detail
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>TRX ID</th>
            <th>Name</th>
            <th>Order Date</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        foreach ($orders as $order) :
        ?>
            <tr>
                <td><?= $id++ ?></td>
                <td>#<?= $order['trx_id'] ?></td>
                <td><?= $order['fullname'] ?></td>
                <td><?= $order['date'] ?></td>
                <td><?= $order['qty'] ?></td>
                <td>Rp. <?= number_format($order['price'], '0', '.', '.') ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>