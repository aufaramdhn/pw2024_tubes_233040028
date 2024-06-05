<?php

$tables = ['menu_order', 'user', 'menu'];
$conditions = ['menu_order.user_id = user.user_id', 'menu_order.menu_id = menu.menu_id'];
$select = '*';

$users = dynamic_join($tables, $conditions, 'INNER', $select);

if (isset($_GET['user_id'])) :
    delete_data('menu_order', ['user_id' => $_GET['user_id']]);
endif;

?>

<div class="add-data">
    <a href="index.php?page=add_order">Add Data</a>
</div>

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
                    <a class="btn-small btn-warning" href="index.php?page=edit_user&user_id=<?= $user['user_id'] ?>">Edit</a>
                    <a class="btn-small btn-danger" href="index.php?page=users&user_id=<?= $user['user_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>