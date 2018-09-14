<?php

include '../modelo/Conexion.php';
include '../modelo/Carro.php';
include '../modelo/DatosCarro.php';

error_reporting(0);
extract($_REQUEST);

$objDatosCarro = new DatosCarro();

$retorno = array('mensaje','datos');


switch ($_REQUEST['opcion']) {
 
    case 1 :
        $unCarro = new Carro($txtPlaca, $txtMarca, $txtColor, 'Disponible');
        $resultado = $objDatosCarro->agregarCarro($unCarro);

        if ($resultado->mensaje == true) {
            $nombre = $_FILES['fotoC']['name'];
            $error = "";
            try {
                if ($nombre != " ") {
                    $nombreArchivoCopiar = $_POST['txtPlaca'].".jpg";
                    $ruta = "../vista/fotosCarros/";
                    move_uploaded_file($_FILES['fotoC']['tmp_name'], $ruta.$nombreArchivoCopiar);
                    header("location:../vista/administrador/?pg=FrmAgregarCarro&x=1");
                } else {
                    header("location:..vista/administrador/?pg=FrmAgregarCarro&x=3");
                }
            } catch (Exception $ex) {
                $error = $ex->getMessage();
            }
        } else {
            header("location:..vista/administrador/?pg=FrmAgregarCarro&x=2");
        }
        break;
        
        case 2:
         //   echo "aaa";
            $resultado = $objDatosCarro->listaCarros();
            if ($resultado->estado){
                 $_SESSION['ctrPlaca']=$user->carPlaca;
                $retorno['mensaje']= $resultado->mensaje;
                $retorno['datos']=$resultado->datos->fetchAll();
            } else {
               $retorno['message']='error al obtener lista de carros' .$resultado ->mensaje;
                $retorno['datos']=$resultado->datos; 
            }
           echo json_encode($retorno);
            break;
            
}

?>;


