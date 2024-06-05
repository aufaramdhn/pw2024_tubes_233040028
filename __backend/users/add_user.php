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
}



?>

<div class="page">
    <a href="index.php?page=index">Dashboard</a> / <a href="index.php?page=user">Users</a> / Add Menu
</div>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="flex wrap-form">
        <div class="add-img">
            <img src="" class="img-preview" width="430" height="430">
            <input type="file" name="image" id="image" class="image" onchange="previewImage()">
            <label class="btn" for="image">Upload Image</label>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="role_id">roleid</label>
                <input type="text" name="role_id" id="role_id">
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
</form>