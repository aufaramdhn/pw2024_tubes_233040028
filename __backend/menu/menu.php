<?php


$menus = query("SELECT * FROM menu");

if (isset($_GET['menu_id'])) :
    delete_data('menu', ['menu_id' => $_GET['menu_id']]);
endif;



?>

<div class="add-data">
    <a href="index.php?page=add_menu">Add Data</a>
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
            <th>Menu Name</th>
            <th>Menu Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        foreach ($menus as $menu) :
        ?>
            <tr>
                <td><?= $id++ ?></td>
                <td><?= $menu['menu_name'] ?></td>
                <td><?= $menu['menu_price'] ?></td>
                <td>
                    <a href="index.php?page=edit_menu&menu_id=<?= $menu['menu_id'] ?>">Edit</a>
                    <a href="index.php?page=menu&menu_id=<?= $menu['menu_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>