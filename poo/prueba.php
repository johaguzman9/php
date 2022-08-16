<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    public $dni;
    public $nombre;
    public $nacionalidad;
    public $edad;

    public function imprimir(){}
}

class Alumno extends Persona{
    public $legajo;
    public $notaPortafolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){
        $this->notaPortafolio = 0.0;
        $this->notaPhp =0.0;
        $this->notaProyecto =0.0;
    }
    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Legajo: " . $this->legajo . "<br>";
        echo "Nota Portafolio: " . $this->notaPortafolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "promedio:" . number_format($this->calcularPromedio(), 2, ",",""). "<br><br>"; 

    }
    public function calcularPromedio(){

    $promedio = 0;
    $promedio= ($this->notaPhp + $this->notaPortafolio + $this->notaProyecto)/3;
    return $promedio;
    }
}

class Docente extends Persona{
    public $especialidad;
    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Alumno();
$alumno1->dni = "54009653";
$alumno1->nombre ="Fernando";
$alumno1->nacionalidad ="Argentina";
$alumno1-> edad ="16";
$alumno1-> legajo ="A-22";
$alumno1->notaPortafolio =7.5;
$alumno1->notaPhp =6;
$alumno1->notaProyecto =9;

$alumno2 = new Alumno();
$alumno1->dni = "23546736";
$alumno1->nombre ="David";
$alumno1->nacionalidad ="Argentina";
$alumno1-> edad =15;
$alumno1-> legajo ="A-33";
$alumno1->notaPortafolio =5.5;
$alumno1->notaPhp =7;
$alumno1->notaProyecto =8.5;