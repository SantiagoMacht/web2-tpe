<?php
require_once './app/models/productModel.php'; 
require_once './app/views/productView.php';


class controllerProduct{
	private $model;
	private $view;

	public function __construct(){
		$this->model = new productModel();
		$this->view = new productView();
	}

	public function showProducts() {
		$products = $this->model->getProducts();
		$categorys = $this->model->getCategorys();
		$this->view->viewProducts($products, $categorys);
	}

	public function showError(){
		$this->view->showError();		
	}

	public function homeController(){
		$this->view->viewHome();
	}
}