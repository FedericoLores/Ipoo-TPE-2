<?php
include 'Viaje.php';
include 'Pasajero.php';
include 'ResponsableV.php';
//se asume que el usuario va a ingresar datos del tipo que se le pide


/** recibe viaje y documento de pasajero y revisa que el pasajero no sea parte del viaje
 * @param Viaje $viaje
 * @return boolean
 */
function seRepite($viaje, $numeroDocumento){
    $i = 0;
    $repetido = false;
    while ($i<count($viaje->getPasajeros()) && $viaje->getPasajeros()[$i]->getNumDoc() != $numeroDocumento){
        $i++;
    }
    if ($i<count($viaje->getPasajeros())){
        $repetido = true;
    }
    return $repetido;
}

/** recibe un viaje y retorna si tiene espacio para mas pasajeros
 * @param Viaje $viaje
 * @return boolean
 */
function revisarMaximo($viaje){
    $tieneEspacio = count($viaje->getPasajeros()) < $viaje->getMaxPasajeros();
    return $tieneEspacio;
}

/** recibe obj viaje y numero de pasajero, elimina ese pasajero de la lista
 * @param Viaje $viaje
 * @param int $numeroPasajero
 */
function borrarPasajero($viaje, $numeroPasajero){
    unset($viaje->getPasajeros()[$numeroPasajero]);
}

$continuar = true;
$opcion=0;

$pasajero = new Pasajero("","",0,0);
$pasajero1 = new Pasajero("Roberto", "Esponja", 123, 11111111);
$pasajero2 = new Pasajero("Patricio", "Estrella", 123, 22222222);
$pasajero3 = new Pasajero("Calamardo", "Tentaculos", 123, 33333333);
$arregloPasajero = [$pasajero1, $pasajero2, $pasajero3];
$objResponsable = new ResponsableV("Eugenio", "Cangrejo", 666, 123456);
$objViaje = new Viaje(123, "jujuy", $arregloPasajero, 4, $objResponsable);

//menu
while ($opcion != 9){
    echo "seleccione una opción: ";
    echo "\n1:mostrar informacion viaje \n2:modificar informacion viaje \n3:ver lista de pasajeros \n4:modificar datos de pasajeros: \n5:agregar pasajeros \n6:borrar pasajero \n7:ver responsable \n8:modificar datos de responsable \n9:salir\n";
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1:
            //mostrar informacion viaje
            echo $objViaje;
            break;
        case 2:
            //modificar informacion viaje
            echo "seleccione una opción: ";
            echo "\n1:modificar codigo \n2:modificar destino \n3:modificar maximo de pasajeros \n cualquier otra tecla para volver al menu\n";
            $opcion = trim(fgets(STDIN));
                switch($opcion){
                    case 1:
                        echo "ingrese nuevo codigo: ";
                        $codigo=trim(fgets(STDIN));
                        $objViaje->setCodigo($codigo);
                        break;
                    case 2:
                        echo "ingrese nuevo destino: ";
                        $destino=trim(fgets(STDIN));
                        $objViaje->setDestino($destino);
                        break;
                    case 3:
                        echo "ingrese nuevo maximo de pasajeros: ";
                        $maxPasajeros=trim(fgets(STDIN));
                        $objViaje->setMaxPasajeros($maxPasajeros);
                        break;
                    case 9:
                        $opcion = 0;
                        break;
                }
            break;
        case 3:
            //ver lista de pasajeros
            $numPasajero=1;
            if($objViaje->getMaxPasajeros() < 1){
                echo "no hay pasajeros. \n";
            } else {
                foreach($objViaje->getPasajeros() as $pasajero){
                    echo "pasajero " . $numPasajero .  ": " .$pasajero . "\n";
                    $numPasajero++;
                }
            }
            break;
        case 4:
            //modificar pasajeros
            echo "seleccione una opción: ";
            echo "\n1: modificar nombre \n2:modificar apellido \n3:modificar telefono \n4:modificar numero de documento \n5: volver al menu";
            $opcion = trim(fgets(STDIN));
                switch($opcion){
                    case 1:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo nombre: ";
                        $nombre=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setNombre($nombre);
                        break;
                    case 2:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo apellido: ";
                        $apellido=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setApellido($apellido);
                        break;
                        break;
                    case 3:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo telefono: ";
                        $telefono=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setTelefono($telefono);
                        break;
                        break;
                    case 4:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo numero de documento: ";
                        $documento=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setNumDoc($documento);
                        break;
                        break;
                    case 9:
                        $opcion = 0;
                        break;
                    default:
                        echo "ingrese un número valido";
                }
            break;
        case 5:
            //agregar pasajeros
            if (revisarMaximo($objViaje)){
                echo "ingrese documento: ";
                $documento= trim(fgets(STDIN));
                if (!(seRepite($objViaje, $documento))){
                    echo "ingrese nombre: ";
                    $nombre= trim(fgets(STDIN));
                    echo "ingrese apellido: ";
                    $apellido= trim(fgets(STDIN));
                    echo "ingrese telefono: ";
                    $telefono= trim(fgets(STDIN));
                    $pasajero = new Pasajero($nombre, $apellido, $telefono, $documento);
                    $objViaje->setUnPasajero(count($objViaje->getPasajeros()), $pasajero);
                } else {
                    echo "el pasajero ya esta anotado";
                }
                
            } else {
                echo "no hay espacio.";
            }
            
            break;
        case 6:
            //borrar pasajero
            echo "ingrese numero del pasajero que desea borrar";
            $numPasajero = trim(fgets(STDIN));
            if ($numPasajero > 0 && $numPasajero <= count($objViaje->getPasajeros())){
                echo $objViaje->getPasajeros()[$numPasajero]->getNombre . "borrado";
                borrarPasajero($objViaje, $numPasajero);
            } else {
                echo "el pasajero no existe";
            }
            break;
        case 7:
            //ver responsable
            $objViaje->getResponsableViaje();
            break;
        case 8:
            //modificar responsable
            echo "ingrese nombre: ";
            $nombre= trim(fgets(STDIN));
            echo "ingrese apellido: ";
            $apellido= trim(fgets(STDIN));
            echo "ingrese telefono: ";
            $numeroEmpleado= trim(fgets(STDIN));
            echo "ingrese numero de licencia: ";
            $numeroLicencia= trim(fgets(STDIN));
            $responsable = new ResponsableV($nombre, $apellido, $numeroEmpleado, $numeroLicencia);
            $objViaje->setResponsableViaje($responsable);
            break;
        case 9:
            //salir
            echo "Adios";
            break;
        default:
            echo "ingrese un número valido\n";
    }
}

?>