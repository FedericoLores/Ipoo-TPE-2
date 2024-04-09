<?php

class Viaje {
    private $codigo;//int
    private $destino;//string
    private $pasajeros;//arreglo de objetos nombre/apellido/numDoc/telefono
    private $maxPasajeros;//int
    private $responsableViaje;//obj

    public function __construct($codigoCnstr ,$destinoCnstr, $pasajerosCnstr, $maxPasajerosCnstr, $responsableViajeCnstr){
        $this->codigo = $codigoCnstr;
        $this->destino = $destinoCnstr;
        $this->pasajeros = $pasajerosCnstr;
        $this->maxPasajeros = $maxPasajerosCnstr;
        $this->responsableViaje = $responsableViajeCnstr;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getDestino(){
        return $this->destino;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }

    //
    public function getUnPasajero($indice){
        return $this->pasajeros[$indice];
    }

    //
    public function getDatoUnPasajero($indice, $llave){
        return $this->pasajeros[$indice][$llave];
    }

    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }

    public function getResponsableViaje(){
        return $this->responsableViaje;
    }

    public function setCodigo($codigoNew){
        $this->codigo = $codigoNew;
    }

    public function setDestino($destinoNew){
        $this->destino = $destinoNew;
    }

    public function setPasajeros($pasajerosNew){
        $this->pasajeros = $pasajerosNew;
    }

    //
    public function setUnPasajero($indice, $unPasajero){
        $this->pasajeros[$indice] = $unPasajero;
    }

    //
    public function setDatoUnPasajero($indice, $llave, $dato){
        $this->pasajeros[$indice][$llave] = $dato;
    }

    public function setMaxPasajeros($maxPasajerosNew){
        $this->maxPasajeros =$maxPasajerosNew;
    }

    public function setResponsableViaje($responsableViajeNew){
        $this->responsableViaje = $responsableViajeNew;
    }




}

?>