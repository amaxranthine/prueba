<?php
enum Genero {
    case pop;
    case rap;
    case balada;
    case rock;
}
class Cancion{
private  string $titulo;
private int $duracion;
private string $album;
private Genero $genero;

//constructor
public function __construct($titulo,$duracion,$album,Genero $genero){
    $this->titulo=$titulo;
    $this->duracion=$duracion;
    $this->album=$album;
    $this->genero=$genero;
}
//getters
public function getTitulo() {
    return $this->titulo;
}

public function getDuracion() {
    return $this->duracion;
}

public function getAlbum() {
    return $this->album;
}

public function getGenero() {
    return $this->genero;
}
}
 class Reserva{




    
 }










?>