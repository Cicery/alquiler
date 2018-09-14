<?php
session_start();
extract($_REQUEST);
error_reporting(0);

include '../modelo/Conexion.php';
include '../modelo/Alquiler.php';
include '../modelo/Persona.php';
include '../modelo/Cliente.php';
include '../modelo/DatosCliente.php';
include '../modelo/Carro.php';
include '../modelo/DatosAlquiler.php';




$objDatosAlquiler = new DatosAlquiler();
$objDatosCliente = new DatosCliente();

switch ($_REQUEST['opcion']) {
    /**
     * agregar el alquiler
     */
    case 1:
//        $txtIdCliente=3;
//        $txtIdCarro=2;
        $fechaAlquiler = date("Y-m-d");
//        $txtFechaDevolucionModal= "2018-08-15";

        $unCliente = new Cliente();
        $unCliente->setIdCliente($txtIdCliente);

        $unCarro = new Carro();
        $unCarro->setIdCarro($txtIdCarro);

        $unAlquiler = new Alquiler($unCarro, $unCliente, $fechaAlquiler, $txtFechaDevolucionModal);


        $resultado = $objDatosAlquiler->agregarAlquiler($unAlquiler);

        if ($resultado->estado == true) {
            $error = "";
            try {
                header("location:../vista/asistente/?pg=frmAlquilerCarros&x=1");
            } catch (Exception $ex) {
                $error = $ex->getMessage();
                header("location:../vista/asistente/?pg=frmAlquilerCarros&x=2");
            }
        } 

        break;

    case 2:

        /**
         * consulta el cliente por identificacion
         * y lo retorna en json
         */
//    $identificacion=45345423;
        $resultado = $objDatosCliente->obtenerClientePorIdentificacion($identificacion);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $retorno['mensaje'] = $resultado->mensaje;
                $retorno['data'] = $resultado->datos->fetchAll();
            } else {
                $retorno['mensaje'] = 'el cliente no existe';
                $retorno['data'] = null;
            }
        }
        echo json_encode($retorno);
        break;

    case 3:
        //Agregar cliente
//        $txtIdentificacionModalAC = "113445323";
//        $txtNombresModalAC = "Micheld";
//        $txtApellidosModalAC = "Rivas";
//        $txtCorreoModalAC = "caelin@mail.comsdf";
//        $txtTelefonoModal = "34443";


        $unCliente = new Cliente($txtIdentificacionModalAC, $txtNombresModalAC, $txtApellidosModalAC, $txtCorreoModalAC, $txtTelefonoModal);

        $resultado = $objDatosCliente->agregarCliente($unCliente);

        //echo $resultado->mensaje;
        if ($resultado->estado == true) {
            try {
                $retorno['estado'] = $resultado->estado;
                $retorno['mensaje'] = $resultado->mensaje;
            } catch (Exception $ex) {
                $error = $ex->getMessage();
                $retorno['mensaje'] = "mal";
            }
        }
        echo json_encode($retorno);
        break;
}
?>;
