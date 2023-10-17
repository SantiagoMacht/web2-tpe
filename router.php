<?php
require_once 'app/controllers/productController.php';
require_once 'app/controllers/authController.php';
require_once 'app/controllers/adminController.php';
require_once 'app/controllers/aboutController.php';

//defino la base url para la construccion de links con urls semanticas 
define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// el router va a leer la action desde el paramtro "action"

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

//parsea la accion ej: suma/1/2 --> ['suma',1,2]
$params = explode('/', $action);

switch ($params[0]) { // en la primer posicion tengo la accion real
    case 'listar':
        $controller = new controllerProduct();
        $controller->showProducts();
        break;
    case 'about':
        $controller = new controllerAbout();
        $controller->showAbout();
        break;
    default: 
        echo "page 404 not found";
        break;
}