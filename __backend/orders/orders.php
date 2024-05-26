<?php


$users = query("SELECT * FROM menu_order");

if (isset($_GET['user_id'])) :
    delete_data('menu_order', ['user_id' => $_GET['user_id']]);
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
            <th>Name</th>
            <th>Menu Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
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
                <td><?= $user['user_email'] ?></td>
                <td><?= $user['role_id'] ?></td>
                <td>
                    <a href="index.php?page=edit_user&user_id=<?= $user['user_id'] ?>">Edit</a>
                    <a href="index.php?page=users&user_id=<?= $user['user_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>