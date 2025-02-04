<?php

class authView{
	
	public function viewInicioSesion($error = null){
		require 'templates/form-inicioSesion.phtml';
	}

	public function viewRegister(){
		require 'templates/form-register.phtml';
	}

}