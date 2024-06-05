<?php


$users = query("SELECT * FROM user");

if (isset($_GET['user_id'])) :
    delete_data('user', ['user_id' => $_GET['user_id']]);
endif;

?>

<div class="page">
    <a href="index.php?page=index">Dashboard</a> / Users
</div>

<div class="add-data">
    <a href="index.php?page=add_user">Add User</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Image</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        foreach ($users as $user) :
        ?>
            <tr>
                <td><?= $id++ ?></td>
                <td align="center">
                    <img src="<?= base_url("assets/upload/$user[user_img]") ?>" width="120" height="120">
                </td>
                <td><?= $user['user_name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['user_email'] ?></td>
                <td align="center">
                    <a class="btn-small btn-danger" href="index.php?page=users&user_id=<?= $user['user_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>