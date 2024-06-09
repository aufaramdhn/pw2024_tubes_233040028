<?php

if (isset($_POST['save'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if ($_FILES['image']['error'] === 4) {
        $image = $_POST['old_img'];
    } else {
        $image = $_FILES['image'];
    }


    $array_update = [
        'user_img' => $image,
        'user_name' => $fullname,
        'username' => $username,
        'user_email' => $email
    ];

    $conditions = [
        'user_id' => $users['user_id']
    ];

    update_data('user', $array_update, $conditions);
    header("Location: index.php?page=profile_user&subpage=profile");
    exit;
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="wrap-form">
        <div class="form-col">
            <div class="form-group img">
                <img src="<?= base_url("assets/upload/$users[user_img]") ?>" class="img-preview" width="250" height="250">
                <input type="text" name="old_img" style="display: none;" value="<?= $users['user_img'] ?>">
                <input type="file" name="image" id="image" class="image" onchange="previewImage()">
                <label class="btn btn-img" for="image">Upload Image</label>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname" value="<?= $users['user_name'] ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $users['username'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="<?= $users['user_email'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" name="save" class="btn" style="float: right;">Save</button>
</form>