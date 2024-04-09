<?php
include 'Viaje.php';
include 'Pasajero.php';
include 'ResponsableV.php';
//se asume que el usuario va a ingresar datos del tipo que se le pide


/** recibe viaje y documento de pasajero y revisa que el pasajero no sea parte del viaje
 * @param Viaje $objViaje
 * @param Pasajero $pasajero
 * @return boolean
 */
function evitarRepetido($viaje, $documento){
    $i = 0;
    $repetido = false;
    while ($i<count($viaje->getPasajeros()) && $viaje->getPasajeros()[$i]->getDocumento() != $documento){
        $i++;
    }
    if ($i<count($viaje->getPasajeros())){
        $repetido = true;
    }
    return $repetido;
}

/** recibe un viaje y retorna si tiene espacio para mas pasajeros
 * @param Viaje
 * @return boolean
 */
function revisarMaximo($viaje){
    $tieneEspacio = count($viaje->getPasajeros) < $viaje->getMaxPasajeros;
    return $tieneEspacio;
}


$continuar = true;
$opcion=0;

$pasajero1 = new Pasajero("Roberto", "Esponja", 123, 11111111);
$pasajero2 = new Pasajero("Patricio", "Estrella", 123, 22222222);
$pasajero3 = new Pasajero("Calamardo", "Tentaculos", 123, 33333333);
$arregloPasajero = [$pasajero1, $pasajero2, $pasajero3];
$objResponsable = new ResponsableV("Eugenio", "Cangrejo", 666, 123456);
$objViaje = new Viaje(123, "jujuy", $arregloPasajero, 4, $objResponsable);

//menu
while ($opcion != 8){
    echo "seleccione una opción: ";
    echo "\n1:mostrar informacion viaje \n2:modificar informacion viaje \n3:ver lista de pasajeros \n4:modificar pasajeros: \n5:agregar pasajeros \n6:ver responsable \n7:modificar responsable \n8:salir";
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
                    case 8:
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
                    case 8:
                        $opcion = 0;
                        break;
                    default:
                        echo "ingrese un número valido";
                }
            break;
        case 5:
            //agregar pasajeros
            $pasajero;
            $objViaje->setUnPasajero(count($objViaje->getPasajeros()), $pasajero);
            break;
        case 6:
            //ver responsable
            $objViaje->getResponsableViaje();
            break;
        case 7:
            //modificar responsable
            $responsable;
            $objViaje->setResponsableViaje($responsable);
            break;
        case 8:
            //salir
            echo "Adios";
            break;
        default:
            echo "ingrese un número valido\n";
    }
}

?>