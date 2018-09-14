<?php

class Cliente extends Persona {

    private $idCliente;
    private  $telefono;

    /**
     * Constructor de la clase cliente0
     * @param type $identificacion
     * @param type $nombres
     * @param type $apellidos
     * @param type $correo
     
     */
    public function __construct($telefono = null, $identificacion = null, $nombres = null, $apellidos = null, $correo = null) {
        parent::__construct($identificacion, $nombres, $apellidos, $correo);
        $this->telefono = $telefono;
    }

 

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }




}
