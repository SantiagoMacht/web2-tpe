<?php
require_once 'C:/xampp/htdocs/web2-tpe/app/models/productModel.php'; 
require_once 'C:/xampp/htdocs/web2-tpe/app/views/productView.php';


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