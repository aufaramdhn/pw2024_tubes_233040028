<?php


if (isset($_POST['submit'])) {

    $array_insert = [
        'menu_img' => $_FILES['image'],
        'menu_name' => $_POST['menu_name'],
        'menu_price' => $_POST['menu_price'],
    ];

    insert_data('menu', $array_insert);

    header('Location: index.php?page=menu');
}



?>

<div class="header-text">
    <h1>Add User</h1>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="flex wrap-form">
        <div class="add-user-img">
            <img src="" class="img-preview" width="430" height="430">
            <input type="file" name="image" id="image" class="image" onchange="previewImage()">
            <label for="image">Upload Image</label>
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
    </div>
    <button type="submit" name="submit" class="btn btn-add-user">Save</button>
</form>