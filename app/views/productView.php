<?php

class viewProducts{
    public function viewHome(){
        require 'templates/header.phtml';
        require 'templates/home.phtml';
        require 'templates/footer.phtml';
    }
    public function viewProducts($products, $category){
        require 'templates/header.phtml';
        require 'templates/products.phtml';
        require 'templates/footer.phtml';
    }
    public function showError(){
        require 'templates/header.phtml';
        require 'templates/showError.phtml';
        require 'templates/footer.phtml';
    }
    public function viewAdministrador($products, $category){
        require 'templates/header.phtml';
        require 'templates/adminProducts.phtml';
        require 'templates/footer.phtml';
    }
}