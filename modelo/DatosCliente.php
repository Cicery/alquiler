<?php

class DatosCliente {

    private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * agregar cliente
     * @param Cliente $unCliente
     * @return type
     */
    public function agregarCliente(Cliente $unCliente) {
        $this->mensaje = null;

        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla personas
            $consulta = "insert into personas values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCliente->getIdentificacion());
            $resultado->bindParam(2, $unCliente->getNombres());
            $resultado->bindParam(3, $unCliente->getApellidos());
            $resultado->bindParam(4, $unCliente->getCorreo());
            $resultado->execute();

            $idPersona = $this->miConexion->lastInsertId(); //obtiene el id de la persona
            //agregar a la tabla clientes
            $consulta = "insert into clientes values(null,?,(select curdate()),?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCliente->getTelefono());
            $resultado->bindParam(2, $idPersona);
            $resultado->execute();
            $this->miConexion->commit();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Cliente agregado";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    public function obtenerClientePorIdentificacion($identificacion) {
        try {
            $consulta = "select personas.*, clientes.* from clientes "
                    . "inner join personas on clientes.cliPersona= personas.idPersona "
                    . "where personas.perIdentificacion=? ";

            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $identificacion);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "datos del cliente";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = $this->null;
            $this->retorno->mensaje = "no existe el cliente";
        }
        return $this->retorno;
    }

  

    public function getMensaje() {
        return $this->mensaje;
    }

}
