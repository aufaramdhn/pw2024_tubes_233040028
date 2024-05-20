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

    case 'contact':
        include('contact.php');
        break;
}
