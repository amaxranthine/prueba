<?php
Enum Genero{
    case pop;
    case rap;
    case balada;
    case rock;
 }
class Cancion{
    private string $titulo;
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
class Album {
    private  $nombre;
    private $canciones;

    //constructor
    public function __construct($nombre, array $canciones){
        $this->nombre=$nombre;
        $this->canciones=$canciones;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function getCanciones() {
        return $this->canciones;
    }
}
class Concierto{
    private string $banda;
    private int $fecha;
    private string $lugar;
    private string $genero_principal;
    private int $duracion_total;
    private $canciones;

    public function __construct($banda,$fecha,$lugar, $genero_principal,$duracion_total, array $canciones){
    $this->banda=$banda;
    $this->fecha = $fecha;
    $this->lugar= $lugar;
    $this->genero =$genero_principal;
    $this->duracion_total=0;
    $this->canciones=[];
    }
//metodos
public function agregarCancion(Cancion $cancion){
$this->canciones[]= $cancion;
$this->duracion_total+= $cancion->duracion;
}
public function calcularDuracionTotal(){
    $this->duracion_total=0;
    foreach($this->canciones as $cancion){
        $this->duracion_total += $cancion->duracion;
    }  
}
//el siguiente metodo busca y devuelve una lista de canciones  del setlist
public function obtenerCancionesAlbum($album){
$canciones_album=[];
foreach($this->canciones as $cancion){
    if($cancion->album ==$album){
        $canciones_album[]=$cancion;
    }
}
return $canciones_album;
}
}
class Index {
    public function main() {
// Creamos el objeto Concierto
$concierto = new Concierto("Seventeen", "2024-04-07", "Palau Sant Jordi", "K-pop");

// Creamos las canciones
$cancion1 = new Cancion("Ready to Love", 3.06, "An Ode", "K-pop, pop");
$cancion2 = new Cancion("Rock with you", 3.10, "Face the Sun", "K-pop, pop rock");
$cancion3 = new Cancion("Very Nice", 3.09, "Love & Letter", "K-pop, funk");
$cancion4 = new Cancion("Don't Wanna Cry", 3.33, "Al1", "K-pop, pop balada");

// Agregamos las canciones al setlist
$concierto->agregar_cancion($cancion1);
$concierto->agregar_cancion($cancion2);
$concierto->agregar_cancion($cancion3);
$concierto->agregar_cancion($cancion4);

// Calculamos la duración total del setlist
$concierto->calcularDuracionTotal();

// Imprimimos el setlist
//$concierto->imprimir_setlist();

// Obtenemos las canciones del álbum An Ode
$canciones_album_ode = $concierto->obtenerCancionesAlbum("An Ode");

// Imprimimos las canciones del álbum An Ode
foreach ($canciones_album_ode as $cancion) {
    echo $cancion->titulo . "\n";
}
}
}



?>