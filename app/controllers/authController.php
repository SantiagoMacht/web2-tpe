<?php
require_once './app/models/authModel.php';
require_once './app/views/authView.php';
require_once './app/helper/AuthHelper.php';


class authController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new authModel();
        $this->view = new authView();
    }

    public function showInicioSesion(){
        $this->view->viewInicioSesion();
    }
 
    public function ingreso(){
        
        if(empty($_POST['email_user'])||empty($_POST['password'])){
            $this->view->viewInicioSesion("Complete los campos solicitados");
            die();
        }

        $usuario= $this->model->getUser();
        if(empty($usuario)) {
             $this->view->viewInicioSesion("El usuario no existe");
             die();
        }

        if (!password_verify($_POST['password'], $usuario->password)) {
            $this->view->viewInicioSesion("La contraseña es incorrecta");
        }

        AuthHelper::login($usuario);
        header('Location: ' . 'administrar');

    }
    
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}