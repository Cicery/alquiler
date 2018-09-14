<?php

error_reporting(0);
session_start();
extract($_REQUEST);
include "../modelo/Conexion.php";
include "../modelo/DatosNegocio.php";


$objDatosNegocio = new DatosNegocio();

switch ($_REQUEST['opcion']) {
    case 1://iniciar sesión
//         $txtLogin = "11";
//         $txtPassword= "11";
        $usuario = new stdClass();
        $usuario->login = $txtLogin;
        $usuario->password = $txtPassword;
        $resultado = $objDatosNegocio->iniciarSesion($usuario);
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $user = $resultado->datos->fetchObject();
                $_SESSION['idEmpleado'] = $user->idEmpleado;
                $_SESSION['nombreEmpleado'] = $user->perNombres . "" . $user->perApellidos;
                $_SESSION['identifica'] = $user->perIdentificacion;
                switch ($user->usuRol) {
                    case "Administrador":
//                        echo json_encode($user->perNombres. "" . $user->perApellidos);
                        header("location:../vista/administrador/index.php");
                        break;
                    case "Asistente":
//                        echo json_encode($user->perNombres. "" . $user->perApellidos);
                        header("location:../vista/asistente/index.php");
                        break;
                }
            } else {
                header("location:../vista/inicio/iniciarSesion.php?x=1");
            }
        }
        break;
}
?>;