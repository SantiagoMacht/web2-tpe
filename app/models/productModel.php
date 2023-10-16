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
}