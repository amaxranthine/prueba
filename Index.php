<?php
 Enum Genero{
    case pop;
    case rap;
    case balada;
    case rock;
 }
class Cancion {
    private string $nom;
    private int $duracion;
    private string $disco;
    protected Genero $genero;

    // constructor 
   public function __construct( $nom,$duracion, $disco, Genero $genero ){
    $this->nom=$nom;
    $this->duracion = $duracion;
    $this->disco= $disco;
    $this->genero =$genero;
   } 
   //getter
   public function getNombre() {
      return $this->nombre;
    }
  
    public function getDuracion() {
      return $this->duracion;
    }
  
    public function getDisco() {
      return $this->disco;
    }
  
    public function getGenero() {
      return $this->genero;
    }
  }

  class Setlist {
   private $canciones;
 
   public function __construct() {
     $this->canciones = array();
   }
 public function agregarCancion(Cancion $cancion){
   $this->canciones[]= $cancion;
 }
 //metodo para obtenerla cancion
 public function obtenerDuracionTotal(){
   $duracion_total= 0;
   foreach ($this->canciones as $cancion){
      $duracion_total += $cancion->getDuracion();
   }
   return $duracion_total;
 }
 public function obtenerCancionesPorDisco($disco){
   $canciones_filtradas = array();
   foreach($this->canciones as $cancion){
      if($cancion->getDisco==$disco){    //operador de comparación que verifica si dos valores son iguales.
       $canciones_filtradas[]= $cancion;  //esta línea de código agrega la canción actual al array de canciones filtradas.
      }
   }
   return $canciones_filtradas;
 }
 }
 class Index { 
 public function main() {
// Crear las canciones
$cancion1 = new Cancion("Ready to Love", 218, "An Ode", Genero::pop);
$cancion2 = new Cancion("Hit", 205, "Your Choice", Genero::rap);
$cancion3 = new Cancion("Rock with you", 210, "Ready to Love", Genero::pop);
$cancion4 = new Cancion("Left & Right", "Face the Sun", 183, Genero::pop);

// Crear el setlist
$setlist = new Setlist();

// Agregar las canciones al setlist
$setlist->agregarCancion($cancion1);
$setlist->agregarCancion($cancion2);
$setlist->agregarCancion($cancion3);
$setlist->agregarCancion($cancion4);

// Obtener la duración total del setlist
$duracionTotal = $setlist->obtenerDuracionTotal();

// Obtener las canciones del disco "Ready to Love"
$cancionesDiscoReadyLove = $setlist->obtenerCancionesPorDisco("Ready to Love");

// Mostrar la información
echo "Duración total del setlist: " . $duracionTotal . " segundos" . PHP_EOL;
echo "Canciones del disco 'Ready to Love':" . PHP_EOL;
foreach ($cancionesDiscoReadyLove as $cancion) {
  echo " - " . $cancion->getNombre() . " (" . $cancion->getDuracion() . " segundos)" . PHP_EOL;
}

}
 }
?>