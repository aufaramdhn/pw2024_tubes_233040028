<?php

$u = array_query("SELECT * FROM user WHERE user_id = $_GET[user_id]");

if (isset($_POST['submit'])) {

    if ($_FILES['image']['error'] === 4) {
        $image = $_POST['old_img'];
    } else {
        $image = $_FILES['image'];
    }

    $array_update = [
        'user_img' => $image,
        'user_name' => $_POST['user_name'],
        'username' => $_POST['username'],
        'user_email' => $_POST['email'],
        'password' => $_POST['password'],
        'role_id' => $_POST['role_id']
    ];

    $condition = ['user_id' => $_GET['user_id']];

    update_data('user', $array_update, $condition);

    header('Location: index.php?page=user');
}
?>

<div class="page">
    <a href="index.php?page=index">Dashboard</a> / <a href="index.php?page=user">Users</a> / Edit Menu
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="flex wrap-form">
        <div class="add-img">
            <img src="<?= base_url("assets/upload/$u[user_img]") ?>" class="img-preview" width="430" height="430">
            <input type="text" name="old_img" style="display: none;" value="<?= $u['user_img'] ?>">
            <input type="file" name="image" id="image" class="image" onchange="previewImage()">
            <label class="btn" for="image">Upload Image</label>
        </div>
        <div class="wrap-input">
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" name="user_name" id="full-name" value="<?= $u['user_name'] ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" name="username" id="username" value="<?= $u['username'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="<?= $u['user_email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?= $u['password'] ?>">
            </div>
            <div class="form-group">
                <label for="role_id">roleid</label>
                <input type="text" name="role_id" id="role_id" value="<?= $u['role_id'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
</form>