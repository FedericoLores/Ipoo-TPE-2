<?php
include 'Viaje.php';

//menu
while ($continuar){
    echo "seleccione una opción: ";
    echo "opciones";
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1:
            break;

        case 2:
            break;

        case 3:
            break;
        
        default:
            echo "ingrese un número valido";
    }

}

$continuar = true;
$opcion;

$objViaje = new Viaje(123, "chubut", [], 4);


?>