<?php
require_once("models/model_abm.php");
class abmController
{
	private $model;
	private $view;
	function __construct($res)
	{
		$this->view = new jugadoresView($res->usuario);
		$this->model = new ABModel();
	}
	function eliminarJugador($id)
	{
		if (!empty($id)) {
			$this->model->eliminarJugador($id);
			header("Location: " . BASE_URL);
		}
	}
	function agregarJugador()
	{
		if (!empty($_POST["nombre"]) && (!empty($_POST["apellido"])) && (!empty($_POST["edad"]))) {
			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$edad = $_POST["edad"];
			$club = $_POST["id_club"];
			$this->model->agregarJugador($nombre, $apellido, $edad, $club);
		}
		echo BASE_URL . 'jugadores';
		
		header('Location:  '. BASE_URL);
	}
	function editarJugador()
	{
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$edad = $_POST["edad"];
		$club = $_POST["id_club"];
		$id_jugador = $_POST["id_jugador"];
		$this->model->editarJugador($nombre, $apellido, $edad, $club, $id_jugador);
		header("Location: " . BASE_URL);
	}
	function eliminarClub($id){
		if (!empty($id)) {
			$this->model->eliminarClub($id);
			header("Location: " . BASE_URL . "clubes");
		}
	}
	function agregarClub(){
		$nombre_club = $_POST["nombre_club"];
		$anio_fundacion =  $_POST["anio_fundacion"];
		if ((!empty($nombre_club)) && (!empty($anio_fundacion))) {
			$this->model->agregarClub($nombre_club, $anio_fundacion);
			header("Location: " . BASE_URL . "clubes");
		}
	}
	function editarClub(){
		$nombre_club = $_POST["nombre_club"];
		$anio_fundacion =  $_POST["anio_fundacion"];
		$id_club = $_POST["id_club"];
		if ((!empty($nombre_club)) && (!empty($anio_fundacion))) {
			$this->model->editarClub($nombre_club, $anio_fundacion, $id_club);
			header("Location: " . BASE_URL . "clubes");
	}
}
}