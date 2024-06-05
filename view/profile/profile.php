<div class="header-profile">
    <h2>Profile</h2>
</div>
<form action="">
    <div class="wrap-form">
        <div class="form-col">
            <div class="form-group img">
                <img src="<?= base_url("assets/upload/$users[user_img]") ?>" class="img-preview" width="250" height="250">
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
    <button type="submit" name="save" class="btn">Save</button>
</form>