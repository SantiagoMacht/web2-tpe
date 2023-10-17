<?php

require_once './app/models/adminModel.php';
require_once './app/views/productView.phtml';
require_once './app/helper/autHelper.php';

class adminController{
	private $model;
	private $view;

	public function __construct(){
		$this->model = new adminModel();
		$this->view = new productView();
	}

	public function removeProduct(){
		AuthHelper::verify();
		$id = $_POST['id'];
		if (empty($id)) {
			$this->view->showError("Elija un id");
			return;
		}
		$this->model->deleteProduct($id);
		header('Location: ' . 'administrar');
	}

	public function removeCategory(){
		AuthHelper::verify();
		$id = $_POST['Category_id'];
		if (empty($Category_id)) {
			$this->view->showError("complete los campos solicitados");
			return;
		}
		$this->model->deleteCategory($CategoryId);
		header('Location: ' . 'administrar');
	}

	public function addProduct(){
		AuthHelper::verify();
		$name = $_POST['name'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$CategoryId = $_POST['CategoryId'];
		if (empty($name) || empty($price) || empty($price) || empty($stock) || empty($Category_id)) {
			$this->view->showError("complete los campos solicitados");
			return;
		}

		if ($stock >= 1 && $price >= 0) {
			$id = $this->model->insertProduct($name, $price, $stock, $CategoryId);
			header('Location: ' . 'administrar');
		} else {
			$this->view->showError();
			return;
		}
	}

	public function addCategory(){
		AuthHelper::verify();
		$category = $$_POST['type'];
		if (empty($category)) {
			$this->view->showError("complete los campos solicitados");
			return;
		}
		$this->model->insertCategory($category);
		header('Location: ' . 'administrar');
	}

	public function updateProduct(){
		AuthHelper::verify();
		$categoryName = $_POST['name'];
	}










}