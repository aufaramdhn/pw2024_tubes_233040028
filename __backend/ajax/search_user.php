<?php

require_once('../../function.php');

$keyword = $_GET['keyword'];

$users = live_search_menu("SELECT * FROM user WHERE user_name LIKE '%$keyword%' OR username LIKE '%$keyword%' OR user_email LIKE '%$keyword%'");

?>

<table class="table-user">
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
                    <a class="btn-small btn-danger" href="index.php?page=delete_user&user_id=<?= $user['user_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>