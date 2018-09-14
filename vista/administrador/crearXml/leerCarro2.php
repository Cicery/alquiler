<?php
include '../../../modelo/Conexion.php';
include '../../../modelo/Carro.php';
include '../../../modelo/DatosCarro.php';
header("Content-type; charset=utf-8");
header("Content-type: text/xml");

$objDatosCarro= new DatosCarro();

function  resultadoXML($resultado,$xml_name){
    $xml = new SimpleXMLElement ('<?xml version= "1.0" encoding= "UTF-8" ?>'
            .'<'.$xml_name.'></'.$xml_name.'>');
    if($resultado -> rowCount()<1){
        $xml->addChild("error"."error: no responde");
    } else {
        while ($datos = $resultado->fetchObject()){
            foreach ($datos as $key => $value){
                
            }
        }    
    }
    $xml->asXML("carrosBD.xml");
    $listaCarros=$objDatosCarro->listaCarros();
    echo resultadoXML($listaCarros->datos,'Carros');
}