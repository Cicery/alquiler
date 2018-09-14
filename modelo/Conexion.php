<?php

class Conexion extends PDO{
    
    private static $instancia=null;
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="alquilercarros";
    
    /**
     * Función para conectarse a la base de datos
     */
    public function __construct(){
        try {
            parent::__construct("mysql:host={$this->host};dbname={$this->db}",
                    $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    /**
     * 
     * @return type self::$instancia;
     */
    public static function singleton(){
        if(!isset(self::$instancia)){
            $miclase =__CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
}
