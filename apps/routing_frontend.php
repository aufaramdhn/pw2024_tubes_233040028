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

    case 'profile':
        include('view/profile.php');
        break;

    case 'cart':
        include('view/cart.php');
        break;
}
