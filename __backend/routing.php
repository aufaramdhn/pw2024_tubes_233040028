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

    case 'delete_user':
        include('users/delete_user.php');
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

    case 'detail_order':
        include('orders/detail_order.php');
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        include('404.php');
        break;
}
