<?php
class jugadoresView {
    private $usuario = null;
    
    public function __construct($usuario) {
        $this->usuario = $usuario;
    }
    public function mostrarJugadores($jugadores, $clubes){
    require('templates/jugadores.phtml');
   }
     public function mostrarJugador($jugador){
        require('templates/jugador.phtml');
    }
    public function mostrarClubes($clubes){
        require('templates/clubes.phtml');
    }
    public function mostrarClub($clubes){
        require('templates/club.phtml');
    }   
}
?>