<?php
class loginView{
    public function mostrarLogin(){
        require('templates/login.phtml');
    }
    public function mostrarLoginIncorrecto(){
        require('templates/error.phtml');
    }
}
?>