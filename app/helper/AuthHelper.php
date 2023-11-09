<?php

class AuthHelper{

	public static function init(){
		if(session_status() != PHP_SESSION_ACTIVE){
			session_start();
		}
	}

	public static function login($usuario){
		AuthHelper::init();
		$_SESSION['email_user'] = $usuario->email_user;
	}

	public static function logout(){
		AuthHelper::init();
		session_destroy();
	}

	public static function isLogged(){
		AuthHelper::init();
		return isset($_SESSION['email_user']);
	}
 }