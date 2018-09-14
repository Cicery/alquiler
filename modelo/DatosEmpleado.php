<?php

class DatosEmpleado {

    private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Agregar un empleado 
     * @param Empleado $unEmpleado
     * @param type $rol
     * @return type return $this->retorno
     */
    public function agregarEmpleado(Empleado $unEmpleado, $rol) {
        $this->mensaje = null;
        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla personas
            $consulta = "insert into personas values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $unEmpleado->getNombres());
            $resultado->bindParam(3, $unEmpleado->getApellidos());
            $resultado->bindParam(4, $unEmpleado->getCorreo());
            $resultado->execute();

            $idPersona = $this->miConexion->lastInsertId(); //obtiene el id de la persona
            //Agregar tabla empleados
            $consulta = "insert into empleados values(null,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getCargo());
            $resultado->bindParam(2, $idPersona);
            $resultado->execute();

            $idEmpleado = $this->miConexion->lastInsertId();

            //Agregar en tabla usuarios
            $password = md5($unEmpleado->getIdentificacion());
            $consulta = "insert into usuarios values(null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $password);
            $resultado->bindParam(3, $rol);
            $resultado->bindParam(4, $idEmpleado);
            $resultado->execute();

            $this->miConexion->commit();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleado agregado";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    /**
     * metodo que obtiene los datos del empleado por su # documento
     * @param type $identificacion
     * @return type     return $this->retorno;
     */
    public function obtenerEmpleadoXIdentificacion($identificacion) {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,empleados.empCargo from personas inner join empleados "
                    . "on personas.idPersona=empleados.empPersona "
                    . "where personas.perIdentificacion = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $identificacion);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleado...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }

        return $this->retorno;
    }
/**
 * metodo que obtiene la lista de todos los empleados
 * @return type retorno
 */
    public function obtenerEmpleado() {
        try {
            $consulta = " select personas.*, empleados.* from 
                    personas inner join empleados 
                    on empleados.empPersona=personas.idPersona";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "listado de Empleados";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMensaje();
        }
        return $this->retorno;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

}
