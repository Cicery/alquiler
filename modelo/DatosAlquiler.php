<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatosAlquiler
 *
 * @author Cicery
 */
class DatosAlquiler {
    //put your code here
     private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }
   /**
    * 
    * @param Alquiler $unAlquiler
    * @return stdClas
    */
    
    public function agregarAlquiler(Alquiler $unAlquiler) {
        $this->mensaje = null;
        //print_r($unAlquiler);
        try {
            $this->miConexion->beginTransaction();
            //agregar Alquiler
            $consulta= "insert into alquiler values(null,?,?,?,?)";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unAlquiler->getCarro()->getIdCarro());
            $resultado->bindParam(2, $unAlquiler->getCliente()->getIdCliente());
            $resultado->bindParam(3, $unAlquiler->getFechaAlquiler());
            $resultado->bindParam(4, $unAlquiler->getFechaDevolucion());
            $resultado->execute();
            
            
            //actualizar estado del carro alquilado
            $consulta= "update carros set carEstado='Alquilado' where idCarro=?";
            $resultado= $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unAlquiler->getCarro()->getIdCarro());
            $resultado->execute();
            
            $this->miConexion->commit();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Carro aquilado Correctamente";
          
        } catch (PDOException $ex) {
                
            $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
            
        }
        return $this->retorno ;
        
    }
    
      public function obtenerCarroPorPlaca($placa) {
        try {
            $consulta = "select * from carros where carPlaca=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $placa);
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "datos del carro";
        } catch (Exception $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
    
      public function obtenerCarrosAlquiladosxMes() {
        try {
            $consulta = "select month(alquiler.alqFechaAlquiler) as Mes, "
                    . "count(alquiler.idAlquiler) "
                    . "as Cantidad FROM alquiler group by Mes";
            $resultado= $this->miConexion->query($consulta);
             $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            if ($resultado->rowCount()>0){
                $this->retorno->mensaje="lista de carros alquilados";
            } else {
                 $this->retorno->mensaje="no hay carros alquilados";
            }
            
        } catch (PDOException $ex) {
               $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
            return $this->retorno ;
        
    }
    
          public function obtenerCarrosAlquiladosxCliente() {
        try {
            $consulta = "SELECT perIdentificacion as Identificacion, "
                    . "COUNT(alquiler.idAlquiler) AS Cantidad "
                    . "FROM alquiler INNER JOIN clientes ON clientes.idCliente=alquiler.alqCliente "
                    . "INNER JOIN personas ON personas.idPersona= clientes.cliPersona "
                    . "GROUP BY Identificacion";
            $resultado= $this->miConexion->query($consulta);
             $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            if ($resultado->rowCount()>0){
                $this->retorno->mensaje="lista de carros alquilados por cliente";
            } else {
                 $this->retorno->mensaje="no hay carros alquilados";
            }
            
        } catch (PDOException $ex) {
               $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
            return $this->retorno ;
        
    }
    
       public function obtenerCarrosAlquiladosxPlaca() {
        try {
            $consulta = "SELECT carros.carPlaca AS Placa, COUNT(alquiler.idAlquiler) "
                    . "AS Cantidad FROM alquiler INNER JOIN carros "
                    . "ON carros.idCarro=alquiler.alqCarro "
                    . "GROUP BY Placa ";
            $resultado= $this->miConexion->query($consulta);
             $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            if ($resultado->rowCount()>0){
                $this->retorno->mensaje="lista de carros alquilados por cliente";
            } else {
                 $this->retorno->mensaje="no hay carros alquilados";
            }
            
        } catch (PDOException $ex) {
               $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
            return $this->retorno ;
        
    }
     public function getMensaje() {
        return $this->mensaje;
    }
}
