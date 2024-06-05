<?php


if (isset($_POST['submit'])) {

    $array_insert = [
        'user_id' => $_FILES['image'],
        'menu_id' => $_POST['fullname'],
        'qty_order' => $_POST['username'],
        'order_time' => $_POST['email'],
    ];

    insert_data('user', $array_insert);
}



?>

<div class="page">
    <a href="index.php?page=index">Dashboard</a> / <a href="index.php?page=user">Order</a> / Add Order
</div>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="flex wrap-form">
        <div class="col">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <select name="" id="">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Menu</label>
                <select name="" id="">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label for="qty_order">Quantity</label>
                <input type="qty_order" name="qty_order" id="qty_order">
            </div>
            <div class="form-group">
                <label for="date">Order Time</label>
                <input type="date" name="date" id="date">
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
</form>