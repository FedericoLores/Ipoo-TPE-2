<?php
class PasajeroNecEsp extends Pasajero{
    private $sillaRuedas;
    private $asistencia;
    private $comidaEsp;

    public function __construct($nombreCnstr, $apellidoCnstr, $telefonoCnstr, $nroDocCnstr, $numAsientoCnstr, $numTicketCnstr, $sillaRuedasCnstr, $asistenciaCnstr, $comidaEspCnstr){
        parent::__construct($nombreCnstr, $apellidoCnstr, $telefonoCnstr, $nroDocCnstr, $numAsientoCnstr, $numTicketCnstr);
        $this->sillaRuedas = $sillaRuedasCnstr;
        $this->asistencia = $asistenciaCnstr;
        $this->comidaEsp = $comidaEspCnstr;
    }

    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }

    public function setSillaRuedas($sillaRuedasNew){
        $this->sillaRuedas = $sillaRuedasNew;
    }

    public function getAsistencia(){
        return $this->asistencia;
    }

    public function setAsistencia($asistenciaNew){
        $this->asistencia = $asistenciaNew;
    }

    public function getComidaEsp(){
        return $this->comidaEsp;
    }

    public function setComidaEsp($comidaEspNew){
        $this->comidaEsp = $comidaEspNew;
    }

    public function __toString(){
        if ($this->getSillaRuedas()){
            $silla="Si";
        } else {
            $silla="No";
        }
        if ($this->getAsistencia()){
            $asistencia="Si";
        } else {
            $asistencia="No";
        }
        if ($this->getComidaEsp()){
            $comida="Si";
        } else {
            $comida="No";
        }
        return parent::__toString() . "\nrequiere silla de ruedas?: " . $silla . "\nrequiere asistencia?: " . $asistencia . "\nrequiere un menu de comida especializado?: " . $comida;
    }

    public function darPorcentajeIncremento(){
        if ($this->getSillaRuedas() && $this->getAsistencia() && $this->comidaEsp){
            $porcentaje = 30;
        } else {
            $porcentaje = 15;
        }
        return $porcentaje / 100;
    }

}
?>