<?php

class modelProducts {
	private $db;

	function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=formula1;charset=utf8','root','');
	}

	function getProducts(){
		$query = $this->db->prepare('SELECT * FROM products');
		$query->execute();

		$products = $query->fetchAll(PDO::FETCH_OBJ);
		return $products;
	}
	function getCategorys(){
		$query = $this->db->prepare('SELECT * FROM category');
		$query->execute();

		$categorys = $query->fetchAll(PDO::FETCH_OBJ);
		return $categorys;
	}
	public function nameCategory()
    {
        $query = $this->db->prepare("SELECT * FROM category WHERE Category_id ");
        $query->execute();

        $nameCategory = $query->fetchAll(PDO::FETCH_OBJ);

        return $nameCategory;
    }
	public function getProductsByCategory($id)
    {
        $query = $this->db->prepare("SELECT * FROM products WHERE Category_id =?");
        $query->execute([$id]);

        $id = $query->fetchAll(PDO::FETCH_OBJ);

        return $id;
    }
}