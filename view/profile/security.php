<?php

$id = $_SESSION['user_id'];

if (isset($_POST['save'])) {
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    if ($password == $cPassword) {

        $array_update = [
            'password' => $password
        ];

        $conditions = [
            'user_id' => $id
        ];

        update_data('user', $array_update, $conditions);
        header("Location: index.php?page=profile_user&subpage=security");
        exit;
    } else {
        header("Location: index.php?page=profile_user&subpage=security");
        exit;
    }
}

?>

<form action="" method="POST">
    <div class="wrap-form">
        <div class="form-col">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="cPassword">Confirm Password</label>
                <input type="password" name="cPassword" id="cPassword" required>
            </div>
            <small><i>* Password must have greater than 5 character</i></small>
        </div>
    </div>
    <button type="submit" name="save" class="btn" style="float: right;">Save</button>
</form>