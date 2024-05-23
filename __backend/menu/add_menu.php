<?php


if (isset($_POST['submit'])) {

    $array_insert = [
        'menu_name' => $_POST['menu_name'],
        'menu_price' => $_POST['menu_price'],
    ];

    insert_data('menu', $array_insert);
}



?>

<div class="header-text">
    <h1>Add User</h1>
</div>
<form action="" method="POST">
    <div class="flex wrap-form">
        <div class="add-user-img">
            <img src="https://source.unsplash.com/200x200/?nature,water" alt="">
            <input type="file" name="gambar" id="gambar">
            <label for="gambar">Upload Image</label>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="menu_name">Menu Name</label>
                <input type="text" name="menu_name" id="menu_name">
            </div>
            <div class="form-group">
                <label for="menu_price">Menu Price</label>
                <input type="number" name="menu_price" id="menu_price">
            </div>
        </div>
        <!-- <div class="col">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
    </div> -->
    </div>
    <button type="submit" name="submit" class="btn btn-add-user">Save</button>
</form>