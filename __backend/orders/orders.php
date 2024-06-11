<?php

$orders = dynamic_join(
    ['menu_order', 'menu', 'user'],
    ['menu.menu_id = menu_order.menu_id', 'user.user_id = menu_order.user_id'],
    'INNER',
    'menu_order.trx_id,
    MAX(user.user_name) as fullname,
    MAX(menu_order.order_status) as status, 
    MAX(menu_order.order_date) as date, 
    MAX(menu_order.qty_order) as qty, 
    SUM(menu_order.qty_order * menu.menu_price) as price',
    '',
    'menu_order.trx_id'

);

?>


<div class="page">
    <a href="index.php?page=index">Dashboard</a> / Orders
</div>

<div class="add-data">
    <button class="btn" onclick="print()">Print</button>
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
            <th class="action">Action</th>
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
                <td align="center" class="action">
                    <a href="index.php?page=detail_order&trx_id=<?= $order['trx_id'] ?>"> See More</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>