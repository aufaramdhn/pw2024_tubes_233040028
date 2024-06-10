<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

switch ($page) {

    case 'index':
        include('view/landing_page.php');
        break;

    case 'menu':
        include('view/menu.php');
        break;

    case 'detail_menu':
        include('view/detail_menu.php');
        break;

    case 'cart':
        include('view/cart.php');
        break;

    case 'receipt':
        include('view/receipt.php');
        break;

    case 'profile_user';
        include('view/profile/index.php');
        break;

    case 'logout':
        include('auth/logout.php');
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        include('view/404.php');
        break;
}
