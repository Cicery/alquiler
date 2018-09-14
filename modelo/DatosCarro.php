<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatosCarro
 *
 * @author 100_Jornada1
 */
class DatosCarro {

    private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * agregar carro
     * @param Carro $unCarro 
     */
    public function AgregarCarro(Carro $unCarro) {
        $this->mensaje = null;
        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla personas
            $consulta = "insert into carros values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCarro->getPlaca());
            $resultado->bindParam(2, $unCarro->getMarca());
            $resultado->bindParam(3, $unCarro->getColor());
            $resultado->bindParam(4, $unCarro->getEstado());
            $resultado->execute();

            $this->miConexion->commit();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Carro agregado Correctamente";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    public function listaCarros() {
        try {
            $consulta = "SELECT * FROM carros";
            $query = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $query;
            $this->retorno->mensaje = 'lista carros';
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex ->getMessage();
        }
        return $this->retorno;
    }
        public function listaCarrosDisponibles() {
        try {
            $consulta = "SELECT * FROM carros WHERE carEstado='Disponible'";
            $query = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $query;
            $this->retorno->mensaje = 'lista carros';
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex ->getMessage();
        }
        return $this->retorno;
    }



    public function getMensaje() {
        return $this->mensaje;
    }

}
