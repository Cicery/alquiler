<?php

class Carro {
    private  $idCarro;
    private $placa;
    private $marca;
    private $color;
    private $estado;
    /**
     * constructor de la clase Carro
     * @param [type] $placa  [description]
     * @param [type] $marca  [description]
     * @param [type] $color  [description]
     * @param [type] $estado [description]
     */
    public function __construct($placa=null, $marca=null, $color=null, $estado=null) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
        $this->estado = $estado;
    }
    
    public function getIdCarro() {
        return $this->idCarro;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getColor() {
        return $this->color;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdCarro($idCarro) {
        $this->idCarro = $idCarro;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }



}
