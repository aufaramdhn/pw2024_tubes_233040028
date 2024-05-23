<?php


$users = query("SELECT * FROM menu_order");

if (isset($_GET['id'])) :
    delete_data('menu_order', ['id' => $_GET['id']]);
endif;

?>

<div class="add-data">
    <a href="index.php?page=add_user">Add Data</a>
</div>

<?php

if (isset($_SESSION['message'])) :

    echo $_SESSION['message'];
    unset($_SESSION['message']);

endif;

?>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Role</th>
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
                <td><?= $user['username'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['id_role'] ?></td>
                <td>
                    <a href="index.php?page=edit_user&id=<?= $user['id'] ?>">Edit</a>
                    <a href="index.php?page=users&id=<?= $user['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>