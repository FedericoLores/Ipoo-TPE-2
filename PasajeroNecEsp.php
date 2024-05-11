<?php
class PasajeroNecEsp extends Pasajero{
    private $sillaRuedas;
    private $asistencia;
    private $comidaEsp;

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