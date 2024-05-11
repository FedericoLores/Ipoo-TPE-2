<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $telefono;
    private $nroDoc;
    private $numAsiento;
    private $numTicket;

    public function __construct($nombreCnstr, $numAsientoCnstr, $numTicketCnstr){
        $this->nombre = $nombreCnstr;
        $this->numAsiento = $numAsientoCnstr;
        $this->numTicket = $numTicketCnstr;
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

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefonoNew){
        $this->telefono = $telefonoNew;
    }

    public function getNroDoc(){
        return $this->nroDoc;
    }

    public function setNroDoc($nroDocNew){
        $this->nroDoc = $nroDocNew;
    }

    public function getNumAsiento(){
        return $this->numAsiento;
    }

    public function getNumTicket(){
        return $this->numTicket;
    }

    public function setNombre($nombreNew){
        $this->nombre = $nombreNew;
    }

    public function setNumAsiento($numAsientoNew){
        $this->numAsiento = $numAsientoNew;
    }

    public function setNumTicket($numTicketNew){
        $this->numTicket = $numTicketNew;
    }


    public function __toString(){
        return "nombre: " . $this->getNombre() . "\napellido: " . $this->getApellido() . "\ntelefono: " . $this->getTelefono() . "\nnumero de documento: " . $this->getNroDoc() . "\nnumAsiento: " . $this->getNumAsiento(). "\nnumTicket: " . $this->getNumTicket();
    }

    public function darPorcentajeIncremento(){
        return 10 / 100;
    }

}

?>