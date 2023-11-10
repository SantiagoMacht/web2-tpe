<?php

require_once 'app\models\adminModel.php';
require_once 'app\models\productModel.php';
require_once 'app\views\adminView.php';
require_once 'app\views\errorView.php';
require_once 'app\helper\AuthHelper.php';

class adminController{
	private $model;
	private $view;

	public function __construct(){
		$this->adminModel = new adminModel();
		$this->productModel = new productModel();
		$this->view = new adminView();
		$this->authView = new authView();
		$this->errorView = new errorView();
	}

	public function removeProduct($id){
		if (AuthHelper::isLogged()){
			$this->adminModel->deleteProducts($id);
		}
		header('Location: ' . BASE_URL . '/administrar');
	}

	public function removeCategory($id){
		if (AuthHelper::isLogged()){
			$this->adminModel->deleteCategorys($id);
		}
		 header('Location: ' . BASE_URL . '/administrar');
	}

	
	public function addProduct(){
	    $product_id = $_POST['product_id'];
	    $image = $_POST['image'];
	    $name = $_POST['name'];
	    $price = $_POST['price'];
	    $stock = $_POST['stock'];
	    $categoryId = $_POST['CategoryId'];

	    if (empty($name) || empty($price) || empty($stock) || empty($categoryId)) {
	        $category = $this->productModel->getCategorys();
	        $this->showAddProduct($category, "complete los campos solicitados");
	    } elseif (AuthHelper::isLogged()) {
	        $lastInsertedId = $this->adminModel->insertProduct($product_id, $image, $name, $price, $stock, $categoryId);
	        header('Location: ' . BASE_URL . '/administrar');
	    } else {
	        header('Location: ' . BASE_URL . '/home');
	    }
}

	public function showAddProduct($message = null){
		$category = $this->productModel->getCategorys();
		$this->view->showAddProduct($category, $message);
	}

	/*public function addProduct(){
		$category = $this->productModel->getCategorys();
		if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['stock']) || $_POST['CategoryId']) {
			$this->view->showAddProduct($category, "complete los campos solicitados");
			} elseif (AuthHelper::isLogged()) {
				$this->adminModel->insertProduct();
				header('Location: ' . BASE_URL . '/administrar');
			} else {
				header('Location: ' . BASE_URL . '/home');
			}
		}
	*/

	public function addCategory(){
		if (empty($_POST['category'])) {
			$this->view->showAddCategory("complete los campos solicitados");
		} elseif (AuthHelper::isLogged()) {
			$this->adminModel->insertCategory();
			header('Location: ' . BASE_URL . '/administrar');
		} else {
			header('Location: ' . BASE_URL . '/home');
		}

	}

	public function editProduct($id) {
    $message = null;
    $product = $this->productModel->getProduct($id);
    $category = $this->productModel->getCategorys();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productEdit = new stdClass();

        $productEdit->product_id = $id;
        $productEdit->name = $_POST['name'];
        $productEdit->price = $_POST['price'];
        $productEdit->stock = $_POST['stock'];
        $productEdit->CategoryId = $_POST['CategoryId'];

        // Validaciones
        if (empty($productEdit->name) || empty($productEdit->price) || empty($productEdit->stock) || empty($productEdit->CategoryId)) {
            $message = "Complete los campos solicitados";
        } else {
            $this->adminModel->updateProduct($productEdit);
            header('Location: ' . BASE_URL . '/administrar');
            exit();
        }
    }

    // Cargar la vista correspondiente con los datos y el mensaje
    $this->view->showEditProduct($product, $category, $message);
}
        

	/*public function updateProduct1($id){
		//Traigo de la tabla products y muestro el formulario de modificar
        $product = $this->productModel->getProduct($id);
        $category = $this->productModel->getCategorys();

        $this->view->showEditProduct($product, $category, "");
        //Muestro el form con los datos iniciales
	}


	/*public function updateProduct2($id) {
		//Tomo del formulario editar y hago el update en la tabla products
		 	
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   			 $productEdit = new stdClass();

			    $productEdit->product_id = $id;
			    $productEdit->name = $_POST['name'];
			    $productEdit->price = $_POST['price'];
			    $productEdit->stock = $_POST['stock'];
			    $productEdit->CategoryId = $_POST['CategoryId'];
			    
		    // Validaciones
		    if (empty($productEdit->name) || empty($productEdit->price) || empty($productEdit->stock) || empty($productEdit->CategoryId)) {
		        $category = $this->productModel->getCategorys();
		        $this->view->showEditProduct($productEdit, $category, "complete los campos solicitados");
		    } else {
		        $this->adminModel->updateProduct($productEdit);
		        $this->view->showEditProduct($productEdit, "producto editado");
		        header('Location: ' . BASE_URL . '/administrar');
		    }
		}
	}*/

	public function editCategory($id){
			$message = null;
			$category = $this->productModel->getCategory($id);

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	        $categoryEdit = new stdClass();

	        $categoryEdit->CategoryId = $id;
	        $categoryEdit->type = $_POST['type'];
	        // Validaciones
	        if (empty($categoryEdit->type)) {
	            $message = "Complete los campos solicitados";
	        } else {
	            $this->adminModel->updateCategory($categoryEdit);
	            header('Location: ' . BASE_URL . '/administrar');
	            exit();
	        }
	    }
	     // Cargar la vista correspondiente con los datos y el mensaje
    	$this->view->showEditCategory($category, $message);
	}

	/*public function categoryEdited($id){
		if (AuthHelper::isLogged()){
			$this->adminModel->updateCategory($Id);
		}
		header('Location: ' . BASE_URL . '/administrar');
	}*/

	public function showAdministrar(){
		if (!AuthHelper::isLogged()) {
			$this->authView->viewinicioSesion();
		} elseif (AuthHelper::isLogged()) {
			$products = $this->productModel->getProducts();
			$categorys = $this->productModel->getCategorys();
			$this->view->administrar($products, $categorys);
		} else {
			$this->errorView->showError("ocurrio un error con el registro");
		} 
	}

	public function showAministrarProducts(){
		$products = $this->model->getProducts();
		$categorys = $this->model->getCategorys();
		$this->view->administrar($product, $category);
	}
}