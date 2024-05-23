<?php

if (isset($_GET['id'])) {
    $user = query("SELECT * FROM user WHERE id = " . $_GET['id']);

    foreach ($user as $u) {
        $user = $u;
    }
}

// if (isset($_POST['submit'])) {

//     $array_insert = [
//         'gambar' => 'default.jpg',
//         'username' => $_POST['username'],
//         'email' => $_POST['email'],
//         'password' => $_POST['password'],
//         'id_role' => $_POST['role_id']
//     ];

//     insert_data('user', $array_insert);
// }



?>

<div class="header-text">
    <h1>Add User</h1>
</div>
<form action="" method="POST">
    <div class="flex wrap-form">
        <div class="add-user-img">
            <img src="https://source.unsplash.com/200x200/?food" alt="">
            <input type="file" name="gambar" id="gambar">
            <label for="gambar">Upload Image</label>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $u['username'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?= $u['password'] ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" id="email" value="<?= $u['email'] ?>">
            </div>
            <div class="form-group">
                <label for="role_id">roleid</label>
                <input type="text" name="role_id" id="role_id" value="<?= $u['id_role'] ?>">
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