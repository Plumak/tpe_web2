<?php
require_once('models/model.php');
require_once('views/view_login.php');
require_once('views/view.php');

class loginController{
    private $model;
    private $view;

public function __construct () {
    $this->model = new jugadoresModel();
    $this->view = new loginView();
}
 function mostrarLogin(){
    $this->view->mostrarLogin();
}
function autenticarUsuario(){
    // obtenemos la informacion del formulario //
    if(!empty ($_POST["usuario"]) && ($_POST["contrasenia"])){
    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];
    }
    //obtenemos de la DB el usuario registrado //

$informacion = $this->model->obtenerUsuario($usuario);

if (!empty ($informacion)){
    if (password_verify($contrasenia, $informacion->contrasenia)){
        session_start();
        $_SESSION["usuario"] = $informacion->usuario;
        $_SESSION["contrasenia"] = $informacion->contrasenia;
        $_SESSION["logueado"] = true;
     header("Location: " . BASE_URL);
    }
} 
else{
$this->view->mostrarLoginIncorrecto();
}
}
function logout() {
    session_start ();
    session_destroy();
    header("Location: " . BASE_URL);
}
}
?>