<?php
session_start();
include '../modelo/Conexion.php';
include '../modelo/Persona.php';
include '../modelo/Cliente.php';
include '../modelo/DatosCliente.php';

error_reporting(0);

extract($_REQUEST);
$objDatosCliente = new DatosCliente();


switch ($_REQUEST['opcion']) {

    case 1: //Agregar cliente
//        $txtIdentificacion = "113423";
//        $txtNombres = "Micheldfg";
//        $txtApellidos = "Rivas";
//        $txtCorreo = "caelin@mail.comsdf";
//        $txtTelefono = "34443";


        $unCliente = new Cliente($txtIdentificacion, $txtNombres, $txtApellidos, $txtCorreo, $txtTelefono);

        $resultado = $objDatosCliente->agregarCliente($unCliente);

        //echo $resultado->mensaje;
        if ($resultado->estado == true) {
            $error = "";
            try {
                  header("location:../vista/asistente/?pg=frmAgregarCliente&x=1");
               //echo ("ok");
            } catch (Exception $ex) {
                $error = $ex->getMessage();
                header("location:../vista/asistente/?pg=frmAgregarCliente&x=2");
            }
        }
        
        break;

    case 2: //Consultar cliente
//        $identificacion = 31243523;

        $resultado = $objDatosCliente->obtenerClientePorIdentificacion($identificacion);

        echo json_encode ($resultado->datos->fetchObject());
        echo ($resultado->mensaje);
        break;
    
    case 3://consultar mediante ajax
        //$identificacion se recibe del llamado mediante ajax
        $resultado = $objDatosEmpleado->obtenerEmpleadoXIdentificacion($identificacion);
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $otraPersona = $resultado->datos->fetchObject();
                echo "Ya existe la persona y se llama: " . $otraPersona->perNombres . " " . $otraPersona->perApellidos;
            } else {
                echo "";
            }
        } else {
            echo "";
        }
        break;
}

?>;