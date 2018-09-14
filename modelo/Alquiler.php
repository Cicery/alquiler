<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alquiler
 *
 * @author Cicery
 */
class Alquiler {
    //put your code here
    private $idAlquiler;
    private $carro;
    private $cliente;
    private $fechaAlquiler;
    private $fechaDevolucion;
    /**
     * constructor de la clase Alquiler
     * @param Carro $carro
     * @param Cliente $cliente
     * @param type $fechaAlquiler
     * @param type $fechaDevolucion
     */
    public function __construct(Carro $carro, Cliente $cliente, 
            $fechaAlquiler, $fechaDevolucion) {
        $this->carro = $carro;
        $this->cliente = $cliente;
        $this->fechaAlquiler = $fechaAlquiler;
        $this->fechaDevolucion = $fechaDevolucion;
    }
    
    public function getIdAlquiler() {
        return $this->idAlquiler;
    }

    public function getCarro() {
        return $this->carro;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getFechaAlquiler() {
        return $this->fechaAlquiler;
    }

    public function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }
    

    public function setIdAlquiler($idAlquiler) {
        $this->idAlquiler = $idAlquiler;
    }

    public function setCarro($carro) {
        $this->carro = $carro;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setFechaAlquiler($fechaAlquiler) {
        $this->fechaAlquiler = $fechaAlquiler;
    }

    public function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }



    

}
