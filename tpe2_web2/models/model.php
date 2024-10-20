<?php
require_once('config.php');
class jugadoresModel {
    private $db;
    public function __construct (){
        $this->db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8',MYSQL_USER,MYSQL_PASS);
    }
    function obtenerJugadores(){
        // obtenemos todos los jugadores y los guardamos en un arreglo  //
        $query = $this->db->prepare ('SELECT * FROM jugadores INNER JOIN clubes ON jugadores.id_club = clubes.id_club');
        $query->execute();
       $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
       return $jugadores;
    }
    function obtenerJugador($id){
        // obtenemos el jugador pedido x id // 
        $query = $this->db->prepare ('SELECT * FROM jugadores INNER JOIN clubes ON jugadores.id_club = clubes.id_club WHERE id_jugador = ?');
        $query->execute([$id]);
        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }
    function obtenerClubes(){
        $query = $this->db->prepare ('SELECT * FROM clubes');
        $query->execute();
        $clubes = $query->fetchAll(PDO::FETCH_OBJ);
        return $clubes;
    }
    function obtenerClub($id) {
        $query = $this->db->prepare('SELECT * FROM clubes INNER JOIN jugadores ON clubes.id_club = jugadores.id_club WHERE clubes.id_club = ?');
        $query->execute([$id]);
        $clubes = $query->fetchAll(PDO::FETCH_OBJ);
        return $clubes;
    }
    function obtenerUsuario($usuario){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$usuario]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}
?>