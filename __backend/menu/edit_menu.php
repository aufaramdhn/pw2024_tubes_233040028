<?php

if (isset($_GET['menu_id'])) :
    $menu = array_query("SELECT * FROM menu WHERE menu_id = " . $_GET['menu_id']);

endif;

if (isset($_POST['submit'])) {

    $menu_id  = $_GET['menu_id'];

    $array_update = [
        'menu_img' => $_FILES['image'],
        'menu_name' => $_POST['menu_name'],
        'menu_price' => $_POST['menu_price'],
    ];

    $conditions = ['menu_id' => $menu_id];

    update_data('menu', $array_update, $conditions);

    header('Location: index.php?page=menu');
}



?>

<div class="header-text">
    <h1>Add User</h1>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="flex wrap-form">
        <div class="add-user-img">
            <img src="assets/upload/<?= $menu['menu_img'] ?>" class="img-preview" width="430" height="430">
            <input type="file" name="image" style="display: none;" value="<?= $menu['menu_img'] ?>">
            <input type="file" name="image" id="image" class="image" onchange="previewImage()">
            <label for="image">Upload Image</label>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="menu_name">Menu Name</label>
                <input type="text" name="menu_name" id="menu_name" value="<?= $menu['menu_name'] ?>">
            </div>
            <div class="form-group">
                <label for="menu_price">Menu Price</label>
                <input type="number" name="menu_price" id="menu_price" value="<?= $menu['menu_price'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-add-user">Save</button>
</form>