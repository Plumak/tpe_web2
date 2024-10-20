<?php
require_once('config.php');
class ABModel{
    private $db;
    public function __construct (){
        $this->db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8',MYSQL_USER,MYSQL_PASS);
    }
    function eliminarJugador($id){
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id_jugador = ?');
        $query->execute([$id]);
    }
    function agregarJugador($nombre,$apellido,$edad,$club){
        $query = $this->db->prepare('INSERT INTO `jugadores` (`nombre`, `apellido`, `edad`, `id_club`) VALUES (?,?,?,?)');
        $query->execute([$nombre,$apellido,$edad,$club]);
    }
    
    function editarJugador($nombre,$apellido, $edad, $club, $id_jugador){
        $query = $this->db->prepare('UPDATE jugadores SET nombre = ? , apellido = ?,  edad = ? , id_club = ? WHERE id_jugador = ?');
        $query->execute([$nombre,$apellido, $edad, $club, $id_jugador]);
    }
    function eliminarClub($id){
        $query = $this->db->prepare('DELETE FROM clubes WHERE id_club = ?');
        $query->execute([$id]);
    }
    function agregarClub($nombre_club, $anio_fundacion){
        $query = $this->db->prepare('INSERT INTO `clubes` (`club`, `anio_fundacion`) VALUES (?,?)');
        $query->execute([$nombre_club, $anio_fundacion]);
    }
    function editarClub($nombre_club, $anio_fundacion, $id_club){
        $query = $this->db->prepare('UPDATE clubes SET club = ? , anio_fundacion = ? WHERE id_club = ?');
        $query->execute([$nombre_club, $anio_fundacion, $id_club]);
    }
}
