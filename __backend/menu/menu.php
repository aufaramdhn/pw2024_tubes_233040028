<?php

$menus = query("SELECT * FROM menu");

if (isset($_POST['search'])) {
    $menus = live_search_menu("SELECT * FROM menu WHERE menu_name LIKE '%$_POST[keyword]%' or menu_price LIKE '%$_POST[keyword]%' or menu_ctg LIKE '%$_POST[keyword]%'");
}

?>

<div class="div">
    <a href="">Dashboard</a> / Menus
</div>

<div class="wrap-search">
    <div class="add-data">
        <a href="index.php?page=add_menu">Add Data</a>
    </div>
    <form action="" method="POST">
        <div class="search">
            <input type="text" name="keyword" id="keyword" placeholder="Search Menu" class="keyword-menu">
            <button type="submit" name="search" class="btn-search">Search</button>
        </div>
    </form>
</div>

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
                    <a onclick="return confirm('Are you sure want to delete this data?')" class="btn-small btn-danger" href="index.php?page=menu&menu_id=<?= $menu['menu_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script src="<?= base_url('__backend/assets/live_search_menu.js') ?>"></script>