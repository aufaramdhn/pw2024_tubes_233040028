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

    case 'profile':
        include('view/profile.php');
        break;

    case 'cart':
        include('view/cart.php');
        break;

    case 'profile';
        include('view/profile.php');
        break;

    case 'logout':
        include('auth/logout.php');
        break;

    case 'admin':
        include('__backend/index.php');
        break;
}
