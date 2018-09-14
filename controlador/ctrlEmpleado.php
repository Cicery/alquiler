<?php

include '../modelo/Conexion.php';
include '../modelo/Persona.php';
include '../modelo/Empleado.php';
include '../modelo/DatosEmpleado.php';
error_reporting(0);

extract($_REQUEST);
$objDatosEmpleado = new DatosEmpleado();


switch ($_REQUEST['opcion']) {
    case 1: //Agregar empleado
    
//         $txtIdentificacion = $_POST['txtIdentificacion'];
//          $txtNombres = $_POST['txtNombres'];
//          $txtApellidos = $_POST['txtApellidos'];
//          $txtCorreo = $_POST['txtCorreo'];
//          $txtCargo = $_POST['txtCargo'];
//          $txtRol = $_POST['txtRol']; 

        $unEmpleado = new Empleado($txtCargo, $txtIdentificacion, $txtNombres, $txtApellidos, $txtCorreo);

        $resultado = $objDatosEmpleado->agregarEmpleado($unEmpleado, $txtRol);

        //echo $resultado->mensaje;
        if ($resultado->estado == true) {
            $nombre = $_FILES['foto']['name'];
            $error = "";
            try {
                if ($nombre!= " ") {
                    $nombreArchivoCopiar = $_POST['txtIdentificacion'].".jpg";
                    $ruta = "../vista/fotos";
                    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta.$nombreArchivoCopiar);
                   
                    header("location:../vista/administrador/?pg=FrmAgregarEmpleado&x=1");
                } else {
                    header("location:../vista/administrador/?pg=FrmAgregarEmpleado&x=3");
                }
            } catch (Exception $ex) {
                $error = $ex->getMessage();
            }
        } else {
            header("location:../vista/administrador/?pg=FrmAgregarEmpleado&x=2");
        }
        
          
        
       
        break;

    case 2: //Consultar empleado
        //$txtIdentificacion = 11;

        $resultado = $objDatosEmpleado->obtenerEmpleadoXIdentificacion($txtIdentificacion);

        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $emple = $resultado->datos->fetchObject();
                echo "<br> Nombre :" . $emple->perNombres;
            } else {
                echo "No existe";
            }
        } else {
            echo $resultado->mensaje;
        }
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
