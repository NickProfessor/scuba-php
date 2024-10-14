<?php



$page = $_GET['page'] ?? 'login';
$controller = new Controller;

switch ($page) {
    case 'login':
        echo $controller->do_login();
        break;

    case 'register':
        echo $controller->do_register();
        break;

    default:
        echo $controller->do_not_found();
        break;
}