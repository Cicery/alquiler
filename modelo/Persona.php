<?php

class Persona {
    private $idPersona;
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $correo;
    
    /**
     * Contructor de la clase persona
     * @param type $identificacion
     * @param type $nombres
     * @param type $apellidos
     * @param type $correo
     */
    public function __construct($identificacion=null,$nombres=null,$apellidos=null,$correo=null) {
        $this->identificacion=$identificacion;
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->correo=$correo;       
    }
    
    public function getIdPersona() {
        return $this->idPersona;
    }

    public function getIdentificacion() {
        return $this->identificacion;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    
}


