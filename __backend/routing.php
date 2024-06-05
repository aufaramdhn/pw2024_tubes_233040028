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

    case 'user':
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

    case 'edit_menu':
        include('menu/edit_menu.php');
        break;

    case 'delete_menu':
        include('menu/delete_menu.php');
        break;

    case 'order':
        include('orders/orders.php');
        break;

    case 'add_order':
        include('orders/add_order.php');
        break;

    case 'logout';
        include('logout.php');
        break;
}
