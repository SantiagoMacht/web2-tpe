<?php
require_once "model.php";


class adminModel extends Model {

	public function deleteProducts($id){
		$query = $this->db->prepare('DELETE FROM products WHERE product_id = ?');
		$query->execute([$id]);
	}

	public function deleteCategorys($id){
		$query = $this->db->prepare('DELETE FROM category WHERE CategoryId = ?');
		$query->execute([$id]);
	}

	public function insertProduct($product_id, $image, $name, $price, $stock, $categoryId){
	    $query = $this->db->prepare('INSERT INTO products (`product_id`, `image`, `name`, `price`, `stock`, `CategoryId` ) VALUES(:product_id, :image, :name, :price, :stock, :CategoryId)');
	    $params = array(
	        'product_id' => $product_id,
	        'image' => $image,
	        'name' => $name,
	        'price' => $price,
	        'stock' => $stock,
	        'CategoryId' => $categoryId
	    );
	    $query->execute($params);
	    return $this->db->lastInsertID();
}


	/*public function insertProduct(){
    	$query = $this->db->prepare('INSERT INTO products (`product_id`, `image`, `name`, `price`, `stock`, `CategoryId` ) VALUES(?, ?, ?, ?, ?, ?)');
  		$query->execute([$_POST['product_id'], $_POST['image'], $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['CategoryId']]);
  		return $this->db->lastInsertID();
	}*/

	public function insertCategory(){
		$query = $this->db->prepare('INSERT INTO category (type) VALUES(?)');
		$query->execute([$_POST['category']]);
		return $this->db->lastInsertID();
	}

	public function updateProduct($product){
		$query = $this->db->prepare('UPDATE `products` SET `name` = ?, `price` = ?, `stock` = ?, `CategoryId` = ? WHERE `products`.`product_id` = ?');
		$query->execute(array($product->name, $product->price, $product->stock, $product->CategoryId, $product->product_id ) );
	}

	public function updateCategory($category){
		$query = $this->db->prepare('UPDATE `category` SET `type` = ? WHERE `category`.`CategoryId` = ?');
		$query->execute(array($category->type, $category->CategoryId));
	}	


}