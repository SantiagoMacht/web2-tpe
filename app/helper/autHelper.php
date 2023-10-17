<?php

class AuthHelper{

	public static function init(){
		if(session_status() != PHP_SESSION_ACTIVE){
			session_start();
		}
	}

	public static function login ($usuario){
		AuthHelper::init();
		$_SESSION['id_user'] = $usuario->id_user;
		$_SESSION['email_user'] = $usuario->email_user;
	}

	public static function logout(){
		AuthHelper::init();
		session_destroy();
	}

	public static function verify(){
		AuthHelper::init();
		if(!isset($_SESSION['id_user'])){
			header('Location: ' . BASE_URL . 'inicioSesion');
			die();
		}
	}
 }