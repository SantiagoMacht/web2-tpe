<?php

class productView{
    public function viewHome(){
        require 'templates/header.phtml';
        require 'templates/home.phtml';
        require 'templates/footer.phtml';
    }
    public function showProductsByType($prodByCat, $categorys){
        require 'templates/header.phtml';
        require 'templates/showProductsByType.phtml';
        require 'templates/footer.phtml';
    }
    public function viewProducts($products, $categorys){
        require 'templates/header.phtml';
        require 'templates/products.phtml';
        require 'templates/footer.phtml';
    }
    public function showProduct($product){
        require 'templates/header.phtml';
        require 'templates/productEspecifico.phtml';
        require 'templates/footer.phtml';
    }
    public function showError(){
        require 'templates/header.phtml';
        require 'templates/showError.phtml';
        require 'templates/footer.phtml';
    }
   }