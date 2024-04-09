<?php
class ResponsableV {
    private $nombre;
    private $apellido;
    private $numEmpleado;
    private $numLicencia;

    public function __construct($nombreCnstr, $apellidoCnstr, $numEmpleadoCnstr, $numLicenciaCnstr){
        $this->nombre = $nombreCnstr;
        $this->apellido = $apellidoCnstr;
        $this->numEmpleado = $numEmpleadoCnstr;
        $this->numLicencia = $numLicenciaCnstr;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }

    public function getNumLicencia(){
        return $this->numLicencia;
    }

    public function setNombre($nombreNew){
        $this->nombre = $nombreNew;
    }

    public function setApellido($apellidoNew){
        $this->apellido = $apellidoNew;
    }

    public function setNumEmpleado($numEmpleadoNew){
        $this->numEmpleado = $numEmpleadoNew;
    }

    public function setNumLicencia($numLicenciaNew){
        $this->numLicencia = $numLicenciaNew;
    }

    public function __toString(){
        return "nombre: " . $this->getNombre() . " apellido: " . $this->getApellido(). " numero de empleado: " . $this->getnumEmpleado() . " numero de licencia: " . $this->getnumLicencia();
    }

}

?>