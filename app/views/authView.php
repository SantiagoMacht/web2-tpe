<?php

class authView{
	public function viewInicioSesion($error = null){
		require 'templates/form-inicioSesion.phtml';
	}

	public function showError($error){
		require 'templates/showError.phtml';
	}
}