<?php
include_once 'Viaje.php';
include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'PasajeroVip.php';
include_once 'PasajeroNecEsp.php';
include_once 'ResponsableV.php';
/*Por recomendacion de la cátedra se asume que el usuario va a ingresar datos del tipo que se le pide
y respeta mayúsculas, campos de texto y alfanuméricos. Se asume que numero de asiento es algo 
que se puede elegir en vez de ser asignado, y que el numero de asiento puede ser mayor a la cantidad
maxima de pasajeros. No se ponen limites al cambiar datos ya existentes*/


/** recibe un importe y lo muestra, si es -1 da una respuesta guardada
 * @param float $importe
 */
function mostrarImporte($importe){
    if($importe != -1){
        echo "El costo del pasaje es de $" . $importe . ".\n";
    } else {
        echo "No hay queda espacio disponible en el viaje";
    }
}

$opcion=0;
//el orden es (nombre, apellido, telefono, nro documento, num asiento, num ticket)
$pasajero1 = new Pasajero("Roberto", "Esponja", 111222333, 11111111, 5, 1);
$pasajero2 = new PasajeroVIP("Patricio", "Estrella", 123123123, 22222222, 9, 2, 1, 500);
$pasajero3 = new PasajeroNecEsp("Calamardo", "Tentaculos", 321321321, 33333333, 2, 3, true, true, false);
$objResponsable = new ResponsableV("Eugenio", "Cangrejo", 666, 123456);
$objViaje = new Viaje(1000, "jujuy", [], 6, $objResponsable, 900, 0);

$objViaje->venderPasaje($pasajero1);
$objViaje->venderPasaje($pasajero2);
$objViaje->venderPasaje($pasajero3);

//menu
do {
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
                        if($maxPasajeros < count($objViaje->getPasajeros())){
                            for($i=$maxPasajeros; $i<=count($objViaje->getPasajeros());$i++){
                                $objViaje->borrarPasajero(count($objViaje->getPasajeros())-1);
                            }
                        }
                        break;
                    case 4:
                        echo "ingrese nuevo costo de viaje: ";
                        $costoViaje = trim(fgets(STDIN));
                        $objViaje->setCostoViaje($costoViaje);
                        break;
                    case 5:
                        echo "ingrese nuevo costos abonados totales: ";
                        $costosAbonados = trim(fgets(STDIN));
                        $objViaje->setCostosAbonados($costosAbonados);
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
                    echo "pasajero " . $numPasajero .  ": " .$pasajero . "\n\n";
                    $numPasajero++;
                }
            }
            break;
        case 4:
            //modificar pasajeros
            echo "seleccione una opción: ";
            echo "\n1:modificar nombre \n2:modificar apellido \n3:modificar telefono \n4:modificar numero de documento \n5:modificar numero de asiento \n6:modificar numero de ticket \n7:modificar numero de viajero frecuente \n8:modificar cantidad de millas \n9:modificar requerimiento de silla de ruedas \n10:modificar requerimiento de asistencia \n11:modificar requerimiento de menu de comida especializado \npresione cualquier otra tecla para volver al menu";
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
                    case 3:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo telefono: ";
                        $telefono=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setTelefono($telefono);
                        break;
                    case 4:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo numero de documento: ";
                        $documento=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setNumDoc($documento);
                        break;
                    case 5:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo numero de asiento: ";
                        $asiento=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setNumAsiento($asiento);
                        break;
                    case 6:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        echo "ingrese nuevo numero de ticket: ";
                        $ticket=trim(fgets(STDIN));
                        $objViaje->getPasajeros()[$numero - 1]->setNumTicket($ticket);
                        break;
                    case 7:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        if($objViaje->getPasajeros()[$numero - 1] instanceof PasajeroVIP){
                            echo "ingrese nuevo numero de viajero frecuente: ";
                            $numViajero = trim(fgets(STDIN));
                            $objViaje->getPasajeros()[$numero - 1]->setNumViajeroFrec($numViajero);
                        } else {
                            echo "el pasajero no tiene numero de viajero frecuente porque no es VIP";
                        }
                        break;
                    case 8:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        if($objViaje->getPasajeros()[$numero - 1] instanceof PasajeroVIP){
                            echo "ingrese nuevo numero de millas: ";
                            $millas = trim(fgets(STDIN));
                            $objViaje->getPasajeros()[$numero - 1]->setMillas($millas);
                        } else {
                            echo "el pasajero no tiene numero de millas porque no es VIP";
                        }
                        break;
                    case 9:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        $opcion = 0;
                        if($objViaje->getPasajeros()[$numero - 1] instanceof PasajeroNecEsp){
                            echo 'ingrese "si", si el pasajero requiere silla de ruedas, o cualquier otra cosa si no lo requiere: ';
                            $entrada=trim(fgets(STDIN));
                            $sillaP = $entrada == "si";
                            $objViaje->getPasajeros()[$numero - 1]->setSillaRuedas($sillaP);
                        } else {
                            echo "el pasajero no puede requerir silla de ruedas porque no es un pasajero de necesidades especiales";
                        }
                        break;
                    case 10:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        if($objViaje->getPasajeros()[$numero - 1] instanceof PasajeroNecEsp){
                            echo 'ingrese "si", si el pasajero requiere asistencia, o cualquier otra cosa si no lo requiere: ';
                            $entrada=trim(fgets(STDIN));
                            $asistenciaP = $entrada == "si";
                            $objViaje->getPasajeros()[$numero - 1]->setAsistencia($asistenciaP);
                        } else {
                            echo "el pasajero no puede requerir asistencia porque no es un pasajero de necesidades especiales";
                        }
                        break;
                    case 11:
                        echo "ingrese numero de pasajero: ";
                        $numero=trim(fgets(STDIN));
                        if($objViaje->getPasajeros()[$numero - 1] instanceof PasajeroNecEsp){
                            echo 'ingrese "si", si el pasajero requiere un menu especializado, o cualquier otra cosa si no lo requiere: ';
                            $entrada=trim(fgets(STDIN));
                            $comidaP = $entrada == "si";
                            $objViaje->getPasajeros()[$numero - 1]->setComidaEsp($comidaP);
                        } else {
                            echo "el pasajero no puede requerir un menu especializado porque no es un pasajero de necesidades especiales";
                        }
                        break;
                }
            break;
        case 5:
            //agregar pasajeros
            if ($objViaje->hayPasajesDisponible()){
                echo "ingrese documento: ";
                $documentoP= trim(fgets(STDIN));
                if (!($objViaje->seRepite($documentoP))){
                    echo "ingrese 'Regular' para agregar un pasajero regular, 'VIP' para agregar un pasajero vip, o 'Necesidades Especiales' para agregar un pasajero con necesidades especiales :";
                    $tipoPas = trim(fgets(STDIN));
                    switch($tipoPas){
                        case "Regular":
                            echo "ingrese nombre: ";
                            $nombreP= trim(fgets(STDIN));
                            echo "ingrese apellido: ";
                            $apellidoP= trim(fgets(STDIN));
                            echo "ingrese telefono: ";
                            $telefonoP= trim(fgets(STDIN));
                            echo "ingrese numero de asiento: ";
                            $asientoP= trim(fgets(STDIN));
                            $pasajero = new Pasajero($nombreP, $apellidoP, $telefonoP, $documentoP, $asientoP, 0);
                            mostrarImporte($objViaje->venderPasaje($pasajero));
                            echo "agregado\n";
                            break;
                        case "VIP":
                            echo "ingrese nombre: ";
                            $nombreP= trim(fgets(STDIN));
                            echo "ingrese apellido: ";
                            $apellidoP= trim(fgets(STDIN));
                            echo "ingrese telefono: ";
                            $telefonoP= trim(fgets(STDIN));
                            echo "ingrese numero de asiento: ";
                            $asientoP= trim(fgets(STDIN));
                            echo "ingrese numero de viajero frecuente: ";
                            $viajeroFrecuenteP= trim(fgets(STDIN));
                            echo "ingrese cantidad de millas: ";
                            $millasP= trim(fgets(STDIN));
                            $pasajero = new PasajeroVIP($nombreP, $apellidoP, $telefonoP, $documentoP, $asientoP, 0, $viajeroFrecuenteP, $millasP);
                            $objViaje->agregarPasajero($pasajero);
                            echo "agregado\n";
                            break;
                        case "Necesidades Especiales":
                            echo "ingrese nombre: ";
                            $nombreP= trim(fgets(STDIN));
                            echo "ingrese apellido: ";
                            $apellidoP= trim(fgets(STDIN));
                            echo "ingrese telefono: ";
                            $telefonoP= trim(fgets(STDIN));
                            echo "ingrese numero de asiento: ";
                            $asientoP= trim(fgets(STDIN));
                            echo "requiere silla de ruedas? Ingrese 'si', o cualquier otra cosa si no requiere: ";
                            $entrada=trim(fgets(STDIN));
                            $sillaP = $entrada == "si";
                            echo "requiere asistencia? Ingrese 'si', o cualquier otra cosa si no requiere: ";
                            $entrada=trim(fgets(STDIN));
                            $asistenciaP = $entrada == "si";
                            echo "requiere un menu de comida especializada? Ingrese 'si', o cualquier otra cosa si no requiere: ";
                            $entrada=trim(fgets(STDIN));
                            $comidaP = $entrada == "si";
                            $pasajero = new PasajeroNecEsp($nombreP, $apellidoP, $telefonoP, $documentoP, $asientoP, 0, $sillaP, $asistenciaP, $comidaP);
                            $objViaje->agregarPasajero($pasajero);
                            echo "agregado\n";
                            //////////////
                            break;
                        default:
                            echo "tipo invalido\n";
                            break;
                    }
                }else{
                    echo "el pasajero ya esta anotado\n";
                }
            } else {
                echo "no hay espacio en el viaje";
            }
            break;
        case 6:
            //borrar pasajero
            echo "ingrese numero del pasajero que desea borrar\n";
            $numPasajero = trim(fgets(STDIN));
            if ($numPasajero > 0 && $numPasajero <= count($objViaje->getPasajeros())){
                $objViaje->borrarPasajero($numPasajero-1);
                echo "borrado\n";
            } else {
                echo "el pasajero no existe\n";
            }
            break;
        case 7:
            //ver responsable
            echo $objViaje->getResponsableViaje();
            break;
        case 8:
            //modificar responsable
            echo "seleccione una opción: ";
            echo "\n1:modificar nombre \n2:modificar apellido \n3:modificar numero de empleado \n4:modificar numero de licencia \npresione cualquier tecla para volver al menu";
            $opcion = trim(fgets(STDIN));
                switch($opcion){
                    case 1:
                        echo "ingrese nuevo nombre: ";
                        $nombre=trim(fgets(STDIN));
                        $objViaje->getResponsableViaje()[$numero - 1]->setNombre($nombre);
                        break;
                    case 2:
                        echo "ingrese nuevo apellido: ";
                        $apellido=trim(fgets(STDIN));
                        $objViaje->getResponsableViaje()[$numero - 1]->setApellido($apellido);
                        break;
                    case 3:
                        echo "ingrese nuevo numero de empleado: ";
                        $numeroEmpleado=trim(fgets(STDIN));
                        $objViaje->getResponsableViaje()[$numero - 1]->setNumEmpleado($numeroEmpleado);
                        break;
                    case 4:
                        echo "ingrese nuevo numero de licencia: ";
                        $numeroLicencia=trim(fgets(STDIN));
                        $objViaje->getResponsableViaje()[$numero - 1]->setNumLicencia($numeroLicencia);
                            break;
                    case 9:
                        $opcion = 0;
                        break;
                }
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
} while ($opcion != 9)

?>