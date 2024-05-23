<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

switch ($page) {

    case 'index':
        include('dashboard.php');
        break;

    case 'users':
        include('users/users.php');
        break;

    case 'add_user':
        include('users/add_user.php');
        break;

    case 'edit_user':
        include('users/edit_user.php');
        break;

    case 'menu':
        include('menu/menu.php');
        break;

    case 'add_menu':
        include('menu/add_menu.php');
        break;

    case 'orders':
        include('orders/orders.php');
        break;
}
