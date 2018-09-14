<?php

session_start();
extract($_REQUEST);
error_reporting(0);
include "../modelo/Conexion.php";
include"../modelo/DatosAlquiler.php";

$objDatosAlquiler = new DatosAlquiler();

switch ($_REQUEST['opcion']) {
    case 1:
        $meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
            'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $ydatos = array(); //arreglo que guarda los valores numericos a graficar
        $xmeses = array(); //valor que guarda el nombre de cada més en formato texto
        $i = 0;
        /*
         * arreglo data es donde se guarda todo incluyendo los encabezados 
         * y tambien se agregan los datos a graficar
         */
        $data[$i] = array('meses', 'cantidad');
        $resultado = $objDatosAlquiler->obtenerCarrosAlquiladosxMes();
        while ($dato = $resultado->datos->fetchObject()) {
            $i++;
            $xmeses[$i] = (String) $meses[$dato->Mes - 1];
            $ydatos[$i] = (int) $dato->Cantidad;
            $data[$i] = array($xmeses[$i], $ydatos[$i]);
        }
        echo json_encode($data); //lo que debuelve

        break;

    case 2:

        $ydatos = array(); //arreglo que guarda los valores numericos a graficar
        $xidentificacion = array(); //arreglo que guarda la identificacion 
        $i = 0;
        /*
         * arreglo data es donde se guarda todo incluyendo los encabezados 
         * y tambien se agregan los datos a graficar
         */
        $data[$i] = array('Identificacion', 'Cantidad');
        $resultado = $objDatosAlquiler->obtenerCarrosAlquiladosxCliente();
        while ($dato = $resultado->datos->fetchObject()) {
            $i++;
            $xidentificacion[$i] = (String) $dato->Identificacion;
            $ydatos[$i] = (int) $dato->Cantidad;
            $data[$i] = array($xidentificacion[$i], $ydatos[$i]);
        }
        echo json_encode($data); //lo que debuelve

        break;


    case 3:
        $ydatos = array(); //arreglo que guarda los valores numericos a graficar
        $xplaca = array(); //arreglo que guarda la identificacion 
        $i = 0;
        /*
         * arreglo data es donde se guarda todo incluyendo los encabezados 
         * y tambien se agregan los datos a graficar
         */
        $data[$i] = array('Placa', 'Cantidad');
        $resultado = $objDatosAlquiler->obtenerCarrosAlquiladosxPlaca();
        while ($dato = $resultado->datos->fetchObject()) {
            $i++;
            $xplaca[$i] = (String) $dato->Placa;
            $ydatos[$i] = (int) $dato->Cantidad;
            $data[$i] = array($xplaca[$i], $ydatos[$i]);
        }
        echo json_encode($data); //lo que debuelve
        break;
}

?>;