<?php
class ResponsableV extends Persona {
    private $numEmpleado;
    private $numLicencia;

    public function __construct($nombreCnstr, $apellidoCnstr, $numEmpleadoCnstr, $numLicenciaCnstr){
        parent::__construct($nombreCnstr, $apellidoCnstr);
        $this->numEmpleado = $numEmpleadoCnstr;
        $this->numLicencia = $numLicenciaCnstr;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }

    public function getNumLicencia(){
        return $this->numLicencia;
    }

    public function setNumEmpleado($numEmpleadoNew){
        $this->numEmpleado = $numEmpleadoNew;
    }

    public function setNumLicencia($numLicenciaNew){
        $this->numLicencia = $numLicenciaNew;
    }

    public function __toString(){
        return parent::__toString() . "\nnumero de empleado: " . $this->getnumEmpleado() . "\nnumero de licencia: " . $this->getnumLicencia() . "\n";
    }

}

?>