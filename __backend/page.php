<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$pages = [
    'index' => ['title' => null],
    'user' => ['title' => 'Users'],
    'menu' => ['title' => 'Menus'],
    'order' => ['title' => 'Orders'],
    'add_menu' => ['title' => 'Add Menu'],
    'add_user' => ['title' => 'Add User'],
    'detail_order' => ['title' => 'Order Detail'],
    'edit_menu' => ['title' => 'Edit Menu'],
    'edit_user' => ['title' => 'Edit User'],
    'edit_order' => ['title' => 'Edit Order'],
];

$currentPage = isset($pages[$page]) ? $pages[$page] : $pages['index'];
$title = $currentPage['title'];
