<?php
 
class adminView {

	public function showAddCategory($message){
		require './templates/addCategory.phtml';
	}

	public function showEditCategory($category, $message){
		require './templates/editCategory.phtml';
	}

	public function showAddProduct($category, $message) {
        require './templates/addProduct.phtml';
    }

    public function showEditProduct($product, $category, $message) {
        require './templates/editProduct.phtml';
    }

    public function administrar($categorysWithProducts){
    	require './templates/administrar.phtml';
    }
}
