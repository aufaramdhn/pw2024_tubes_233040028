<?php


$users = query("SELECT * FROM user");

if (isset($_GET['user_id'])) :

endif;

if (isset($_POST['search'])) {
    $users = live_search_menu("SELECT * FROM user WHERE user_name LIKE '%$_POST[keyword]%' OR username LIKE '%$_POST[keyword]%' OR user_email LIKE '%$_POST[keyword]%'");
}

?>

<div class="page">
    <a href="index.php?page=index">Dashboard</a> / Users
</div>

<div class="wrap-search">
    <div class="add-data">
        <a href="index.php?page=add_user">Add Data</a>
    </div>
    <form action="" method="POST">
        <div class="search">
            <input type="text" name="keyword" id="keyword" placeholder="Search Menu" class="keyword-user">
            <button type="submit" name="search" class="btn-search">Search</button>
        </div>
    </form>
</div>

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
                    <a onclick="return confirm('Are you sure want to delete this data?')" class="btn-small btn-danger" href="index.php?page=delete_user&user_id=<?= $user['user_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script src="<?= base_url('__backend/assets/live_search_user.js') ?>"></script>