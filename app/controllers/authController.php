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
        $email = $_POST['email_user'];
        $password = $_POST['password'];

        $usuario= $this->model->getUserByEmail($email);
        if(empty($usuario)) {
             $this->view->viewInicioSesion("El usuario no existe");
             die();
        }

        if (!password_verify($password, $usuario->password)) {
            $this->view->viewInicioSesion("La contraseña es incorrecta");
            die();
        }

        AuthHelper::login($usuario);
        header('Location: ' . 'administrar');

    }
    
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }

    public function showRegistro(){
        $this->view->viewRegister();
    }

    public function registro(){
        if(empty($_POST['email_user'])||empty($_POST['password'])||empty($_POST['name'])){
            $this->view->viewInicioSesion("Complete los campos solicitados");
            die();
        }else{
            $email = $_POST['email_user'];
            $pw = $_POST['password'];
            $nombre = $_POST['name'];

            $password = password_hash($pw, PASSWORD_DEFAULT);
            $this->model->register($email, $password, $nombre);
        }
    }
}