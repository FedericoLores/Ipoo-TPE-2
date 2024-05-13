<?php
class PasajeroVIP extends Pasajero{
    private $numViajeroFrec;
    private $millas;

    public function __construct($nombreCnstr, $apellidoCnstr, $telefonoCnstr, $nroDocCnstr, $numAsientoCnstr, $numTicketCnstr, $numViajeroFrecCnstr, $millasCnstr){
        parent::__construct($nombreCnstr, $apellidoCnstr, $telefonoCnstr, $nroDocCnstr, $numAsientoCnstr, $numTicketCnstr);
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

    public function __toString(){
        return parent::__toString() . "\nnumero de viajero frecuente: " . $this->getNumViajeroFrec() . "\ncantidad de millas: " . $this->getMillas();
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