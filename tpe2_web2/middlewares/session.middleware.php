<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION["usuario"])){
            $res->usuario = new stdClass();
            $res->usuario->usuario = $_SESSION["usuario"];
            return;
        }
    }
?>
