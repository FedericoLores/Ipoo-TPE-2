<?php
class Persona {
    private $nombre;
    private $apellido;

    public function __construct($nombreCnstr, $apellidoCnstr){
        $this->nombre = $nombreCnstr;
        $this->apellido = $apellidoCnstr;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellidoNew){
        $this->apellido = $apellidoNew;
    }

    public function setNombre($nombreNew){
        $this->nombre = $nombreNew;
    }

    public function __toString(){
        return "nombre: " . $this->getNombre() . "\napellido: " . $this->getApellido();
    }


}

?>