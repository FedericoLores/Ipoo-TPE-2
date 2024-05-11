<?php
class PasajeroVIP extends Pasajero{
    private $numViajeroFrec;
    private $millas;

    public function __construct($nombreCnstr, $numAsientoCnstr, $numTicketCnstr, $numViajeroFrecCnstr, $millasCnstr){
        parent::__construct($nombreCnstr, $numAsientoCnstr, $numTicketCnstr);
        $this->numViajeroFrec = $numViajeroFrecCnstr;
        $this->millas = $millasCnstr;
    }

    public function getNumViajeroFrec(){
        return $this->numViajeroFrec;
    }

    public function setNumViajeroFrec($numViajeroFrecNew){
        $this->numViajeroFrec = $numViajeroFrecNew;
    }

    public function getMillas(){
        return $this->millas;
    }

    public function setMillas($millasNew){
        $this->millas = $millasNew;
    }

    public function darPorcentajeIncremento(){
        if($this->getMillas() >= 300){
            $porcentaje = 30;
        } else {
            $porcentaje = 35;
        }
        return $porcentaje / 100;
    }

}
?>