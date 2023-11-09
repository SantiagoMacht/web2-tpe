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
	public function showProductsByCategory($type){
		$prodByCat = $this->model->getProductsByType($type);
		$categorys = $this->model->getCategorys();
		$this->view->showProductsByType($prodByCat, $categorys);
	}
	public function viewProducts($product_id){
		$product = $this->model->getProductsById($product_id);
		$this->view->showProduct($product);
	}
	public function showError(){
		$this->view->showError();		
	}

	public function homeController(){
		$this->view->viewHome();
	}
}