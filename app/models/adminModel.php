<?php
class modelAdmin {
	private $db;

	function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=formula1;charset=utf8','root','');
	}

	function getProducts(){
		$quey = $this->db->prepare('SELECT * FROM products');
		$query->execute();

		$products = $query->fetchAll(PDO::FETCH_OBJ);

		return $products;
	}

	function getCategory(){

		$quey = $this->db->prepare('SELECT * FROM category');
		$query->execute();

		$categorys = $query->fetchAll(PDO::FETCH_OBJ);

		return $categorys;
	}

	function deleteProducts($id){
		$query = $this->db->prepare('DELETE FROM products WHERE product_id = ?');
		$query->execute([$id]);
	}

	function deteteCategory($id){
		$query = $this->db->prepare('DELETE FROM category WHERE CategoryId = ?');
		$query->execute([$id]);
	}

	function insertProduct($name, $price, $stock, $CategoryId){
		$query = $this->db->prepare('INSERT INTO products (name, price, stock, CategoryId) VALUES(?,?,?,?,?)');
		$query->execute([$name, $price, $stock, $CategoryId]);

		return $this->db->lastInsertID();
	}

	function insertCategory($type){
		$query = $this->db->prepare('INSERT INTO Category (type) VALUES(?)');
		$query->execute([$type]);

		return $this->db->lastInsertID();
	}

	function updateProduct($name, $price, $stock, $CategoryId, $id){
		$query = this->db->prepare('UPDATE `products` SET `name` = ?, `price` = ?, `stock` = ? `CategoryId` = ? WHERE `products`.`product_id` = ?;');
		$query->execute([$name,$price,$stock,$CategoryId, $id]);
	}

	function updateCategory($type, $CategoryId){
		$query = this->db->prepare('UPDATE `CategoryId` SET `type` = ? WHERE `Category`.`CategoryId` = ?;');
		$query->execute([$type, $CategoryId]);
	}	


