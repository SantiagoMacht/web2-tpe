<?php
require_once "model.php";

class productModel extends Model{


    public function getCategorys(){
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();

        $categorys = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $categorys;
    }

    public function getProducts(){
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();
    
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $tasks;
    }

    public function getProduct($id){
        $query = $this->db->prepare("SELECT * FROM products WHERE product_id = $id");

        $query->execute();

        // $product es un arreglo que contiene un sólo producto
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        $product = $products[0];
        return $product;
    }

    public function getCategory($id){
        $query = $this->db->prepare("SELECT * FROM category WHERE CategoryId = $id");

        $query->execute();

        // $categorys es un arreglo que contiene un sólo producto
        $categorys = $query->fetchAll(PDO::FETCH_OBJ);
        $category = $categorys[0];
        return $category;
    }

    public function nameCategory(){
        $query = $this->db->prepare("SELECT * FROM categorys WHERE CategoryId ");
        $query ->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
    public function getProductsById($product_id){
        $query = $this->db->prepare('SELECT product_id FROM products WHERE product_id=?');
        $query ->execute([$product_id]);
    
        $product = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $product;
    }
    public function getProductsByType($type){
        $query = $this->db->prepare("SELECT * FROM products WHERE CategoryId =?");
        $query->execute([$type]);

        $type = $query->fetchAll(PDO::FETCH_OBJ);

        return $type;
    }
    
}