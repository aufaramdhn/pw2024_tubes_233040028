<?php


if (isset($_POST['submit'])) {

    $array_insert = [
        'user_img' => $_FILES['image'],
        'user_name' => $_POST['fullname'],
        'username' => $_POST['username'],
        'user_email' => $_POST['email'],
        'password' => $_POST['password'],
        'role_id' => $_POST['role_id']
    ];

    insert_data('user', $array_insert);
    header('Location: index.php?page=user');
    exit;
}



?>

<div class="page">
    <a href="index.php?page=index">Dashboard</a> / <a href="index.php?page=user">Users</a> / Add Menu
</div>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="flex wrap-form">
        <div class="add-img">
            <img src="<?= base_url('assets/upload/nophoto.jpg') ?>" class="img-preview">
            <input type="file" name="image" id="image" class="image" onchange="previewImage()">
            <label class="btn" for="image">Upload Image</label>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="Enter fullname">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id">
                    <?php

                    $role = array_query("SELECT * FROM role");
                    foreach ($role as $r) :

                    ?>
                        <option value="<?= $r['role_id'] ?>"><?= $r['role_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
</form>