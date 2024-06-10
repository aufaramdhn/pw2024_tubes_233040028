<?php

require_once('../../function.php');

$keyword = $_GET['keyword'];

$menus = live_search_menu("SELECT * FROM menu WHERE menu_name LIKE '%$keyword%' OR menu_ctg LIKE '%$keyword%' OR menu_price LIKE '%$keyword%'");

?>

<table class="table-menu">
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
                <td align="center"><img src="<?= base_url("assets/upload/$menu[menu_img]") ?>" class="img-preview" width="120" height="120"></td>
                <td><?= $menu['menu_name'] ?></td>
                <td>Rp. <?= number_format($menu['menu_price'], '0', '.', '.') ?></td>
                <td align="center">
                    <a class="btn-small btn-warning" href="index.php?page=edit_menu&menu_id=<?= $menu['menu_id'] ?>">Edit</a>
                    <a class="btn-small btn-danger" href="index.php?page=menu&menu_id=<?= $menu['menu_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>