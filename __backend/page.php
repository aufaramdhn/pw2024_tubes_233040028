<?php

// $page = isset($_GET['page']) ? $_GET['page'] : 'index';
// $pageNames = [
//     'index' => 'Dashboard',
//     'user' => 'Users',
//     'menu' => 'Menus',
//     'order' => 'Orders'
// ];

// $currentPage = isset($pageNames[$page]) ? $pageNames[$page] : 'Dashboard';

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$pages = [
    'index' => ['title' => null],
    'user' => ['title' => 'Users'],
    'menu' => ['title' => 'Menus'],
    'order' => ['title' => 'Orders'],
    'add_menu' => ['title' => 'Add Menu'],
    'add_user' => ['title' => 'Add User'],
    'add_order' => ['title' => 'Add Order'],
    'edit_menu' => ['title' => 'Edit Menu'],
    'edit_user' => ['title' => 'Edit User'],
    'edit_order' => ['title' => 'Edit Order'],
    // Add more pages and subpages as needed
];

$currentPage = isset($pages[$page]) ? $pages[$page] : $pages['index'];
$title = $currentPage['title'];
