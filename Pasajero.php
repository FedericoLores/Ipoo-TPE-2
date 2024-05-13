<?php
class Pasajero extends Persona{
    private $telefono;
    private $nroDoc;
    private $numAsiento;
    private $numTicket;

    public function __construct($nombreCnstr, $apellidoCnstr, $telefonoCnstr, $nroDocCnstr, $numAsientoCnstr, $numTicketCnstr){
        parent::__construct($nombreCnstr, $apellidoCnstr);
        $this->telefono = $telefonoCnstr;
        $this->nroDoc = $nroDocCnstr;
        $this->numAsiento = $numAsientoCnstr;
        $this->numTicket = $numTicketCnstr;
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

    public function setNumAsiento($numAsientoNew){
        $this->numAsiento = $numAsientoNew;
    }

    public function setNumTicket($numTicketNew){
        $this->numTicket = $numTicketNew;
    }


    public function __toString(){
        return parent::__toString() . "\ntelefono: " . $this->getTelefono() . "\nnumero de documento: " . $this->getNroDoc() . "\nnumAsiento: " . $this->getNumAsiento(). "\nnumTicket: " . $this->getNumTicket();
    }

    public function darPorcentajeIncremento(){
        return 10 / 100;
    }

}

?>