<?php
require_once './app/models/productModel.php';
require_once './app/views/productView.phtml';

class controllerProduct{
	private $model;
	private $view;

	function __construct(){
		$this->model = new modelProducts();
	}

	function showProducts() {
		/*
		* acá ponele iría un
		* $products = $this->model->getProducts
		* consiguiendo los productos desde la base de datos
		*/ 
		echo "productos";
	}
}