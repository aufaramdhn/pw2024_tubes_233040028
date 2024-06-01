<?php

$menus = query("SELECT * FROM menu");

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
            <th>Menu Image</th>
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
                <td align="center"><img src="assets/upload/<?= $menu['menu_img'] ?>" class="img-preview" width="120" height="120"></td>
                <td><?= $menu['menu_name'] ?></td>
                <td>Rp. <?= number_format($menu['menu_price']) ?></td>
                <td align="center">
                    <a class="btn-small btn-warning" href="index.php?page=edit_menu&menu_id=<?= $menu['menu_id'] ?>">Edit</a>
                    <a class="btn-small btn-danger" href="index.php?page=delete_menu&menu_id=<?= $menu['menu_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>