<?php
require_once './app/models/productModel.php';
require_once './app/views/productView.phtml';

class controllerProduct{
	private $model;
	private $view;

	function __construct(){
		$this->model = new modelProducts();
		$this->view = new viewProducts();
	}

	function showProducts() {
		$products = $this->model->getProducts();
		$categorys = $this->model->getCategorys();
		$this->view->viewProducts($products, $categorys);
	}

	function showError(){
		$this->view->showError();		
	}

	function homeController(){
		$this->view->viewHome();
	}
}