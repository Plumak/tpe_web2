<?php
require_once("models/model.php");
require_once("views/view.php");

class jugadoresController {
private $model;
private $view;

public function __construct($res){
    $this->model = new jugadoresModel();
    $this->view = new jugadoresView($res->usuario);
}
function mostrarJugadores(){
    // obtenemos todos los jugadores de la BD //
$jugadores = $this->model->obtenerJugadores();
$clubes = $this->model->obtenerClubes();
// mandamos a la vista los datos obtenidos en el modelo //
$this->view->mostrarJugadores($jugadores, $clubes);
}
function mostrarJugador($id){
    // obtenemos y mostramos un jugador en especial que el usuario solicite ver //
    $jugador = $this->model->obtenerJugador($id);
    $this->view->mostrarJugador($jugador);
}
function mostrarClubes(){
    $clubes = $this->model->obtenerClubes();
    $this->view->mostrarClubes($clubes);
}
function mostrarClub($id){
    $clubes = $this->model->obtenerClub($id);
    $this->view->mostrarClub($clubes);
}
}
?>