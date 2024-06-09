<?php



$orders = dynamic_join(
    ['menu_order', 'menu', 'user'],
    ['menu.menu_id = menu_order.menu_id', 'user.user_id = menu_order.user_id'],
    'INNER',
    'menu_order.trx_id, 
    menu.menu_name, 
    menu.menu_price, 
    menu_order.qty_order, 
    SUM(menu_order.qty_order * menu.menu_price) AS total',
    'menu_order.trx_id =  ' . $_GET['trx_id'],
    'menu_order.trx_id, 
    menu.menu_name, 
    menu.menu_price, 
    menu_order.qty_order'
);

$grand_total = 0;

foreach ($orders as $order) {
    $grand_total += $order['total'];
}

?>

<section id="receipt">
    <div class="wrap-receipt container">
        <div class="header-text">
            <h1>Receipt</h1>
        </div>
        <div class="receipt-info">
            <div class="info">
                <h3>Transaction ID : <span>#<?= $_GET['trx_id'] ?></span></h3>

            </div>
            <div class="info">
                <h3>Date : <span><?= date('d F Y') ?></span></h3>

            </div>
        </div>
        <div class="user-info">
            <div class="info">
                <h4>Name : <span><?= $_SESSION['fullname'] ?></span> </h4>
            </div>
            <div class="info">
                <button class="btn" onclick="document.location.href = 'index.php'" style="float: left; margin:20px 0;">Back</button>
                <button onclick="print()" class="btn" style="float: right; margin:20px 0;">Print</button>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $id++ ?></td>
                        <td><?= $order['menu_name'] ?></td>
                        <td>Rp. <?= number_format($order['menu_price']) ?></td>
                        <td><?= $order['qty_order'] ?></td>
                        <td>Rp. <?= number_format($order['total']) ?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td align="right" colspan="4">Grand Total</td>
                    <td>Rp. <?= number_format($grand_total) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>