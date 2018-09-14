<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatosNegocio
 *
 * @author Cicery
 */
class DatosNegocio {
    //put your code here
    private $miConexion;
    private $retorno;
    
   public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }
    /**
     * metodo que retorna datos del empleado que inicia la sesion 
     * @param stdClass $usuario
     * 
     */
    public function iniciarSesion(stdClass $usuario){
        try {
          $consulta = "select personas.perIdentificacion, personas.perNombres,personas.perApellidos,"
                  . "empleados.idEmpleado, usuarios.usuRol from personas"
                  . " inner join empleados on empleados.empPersona=personas.idPersona"
                  . " inner join usuarios on usuarios.usuEmpleado=empleados.idEmpleado"
                  . " where usuarios.usuUsuario =? and usuarios.usuPassword=?";
          $resultado = $this->miConexion->prepare($consulta);
          $resultado->bindParam(1, $usuario->login);
            $resultado->bindParam(2, md5($usuario->password));
            $resultado->execute();
            
            $this->retorno->estado= true;
            $this->retorno->datos=$resultado;
            $this->mensaje="datos del empleado";
        } catch (PDOException $ex) {
           $this->retorno->estado= false;
            $this->retorno->datos=null;
            $this->mensaje=$ex->getMessage();
        }
        return $this->retorno;
        }
       
            
}
