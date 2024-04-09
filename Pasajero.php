<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $telefono;
    private $numDoc;

    public function __construct($nombreCnstr, $apellidoCnstr, $telefonoCnstr, $numDocCnstr){
        $this->nombre = $nombreCnstr;
        $this->apellido = $apellidoCnstr;
        $this->telefono = $telefonoCnstr;
        $this->numDoc = $numDocCnstr;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getNumDoc(){
        return $this->numDoc;
    }

    public function setNombre($nombreNew){
        $this->nombre = $nombreNew;
    }

    public function setApellido($apellidoNew){
        $this->apellido = $apellidoNew;
    }

    public function setTelefono($telefonoNew){
        $this->telefono = $telefonoNew;
    }

    public function setNumDoc($numDocNew){
        $this->numDoc = $numDocNew;
    }

    public function __toString(){
        return "nombre: " . $this->getNombre() . " apellido: " . $this->getApellido(). " telefono: " . $this->getTelefono() . " documento: " . $this->getNumDoc();
    }

}

?>