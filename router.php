<?php
require_once 'app/controllers/productController.php';
require_once 'app/controllers/authController.php';
require_once 'app/controllers/adminController.php';
require_once 'app/controllers/aboutController.php'; 

//defino la base url para la construccion de links con urls semanticas 
define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// el router va a leer la action desde el paramtro "action"

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

//parsea la accion ej: suma/1/2 --> ['suma',1,2]
$params = explode('/', $action);

switch ($params[0]) { // en la primer posicion tengo la accion real
    case 'home':
        $controller = new controllerProduct();
        $controller->homeController();
        break;
    case 'productos':
        $controller = new controllerProduct();
        $controller->showProducts();
        break;
    case 'productsbycategory':
        $controller = new controllerProduct();
        $controller->showProductsByCategory($params[1]);
        break;
    case 'product':
        $controller = new controllerProduct();
        $controller->viewProducts($params[1]);
        break;
    case 'inicioSesion':
        $controller = new adminController();
        $controller->showAdministrar();
        break;
    case 'ingreso':
        $controller = new authController();
        $controller->ingreso();
        break;
    case 'logout':
        $controller = new authController();
        $controller->logout();
        break;
    case 'administrar':
        $controller = new adminController();
        $controller->showAdministrar();
        break;
    case 'eliminarProducto':
        $controller = new adminController();
        $controller->removeProduct($params[1]);
        break;
    case 'agregarProducto':
        $controller = new adminController();
        $controller->showAddProduct();
        break;
    case 'formAgregarProducto':
        $controller = new adminController();
        $controller->addProduct();
        break;
    case 'editarProducto':
        $controller = new adminController();
        $controller->editProduct($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new adminController();
        $controller->addCategory();
        break;
    case 'editarCategoria':
        $controller = new adminController();
        $controller->editCategory($params[1]);
        break;
    case 'eliminarCategoria':
        $controller = new adminController();
        $controller->removeCategory($params[1]);
        break;
    case 'about':
        $controller = new controllerAbout();
        $controller->showAbout();
        break;
    default: 
        $controller = new controllerProduct();
        $controller->showError();
        break;
}