<?php
include '../../../modelo/Conexion.php';
include '../../../modelo/Carro.php';
include '../../../modelo/DatosCarro.php';
header("Content-type; charset=utf-8");
header("Content-type: text/xml");

$objDatosCarro= new DatosCarro();
$resultado = $objDatosCarro->listaCarros();


$xml = new DomDocument("1.0","UTF-8");

  while ($unCarro = $resultado->datos->fetchObject()) {
      
      //crear nodo raiz
$nodoRaiz = $xml->createElement("Carros");
$nodoRaiz = $xml->appendChild($nodoRaiz);

//crear carro 1
$carro = $xml->createElement("Carro");
$idCarro = $xml->createAttribute("idCarro");
$idCarro->value=$unCarro->idCarro;
$carro->appendChild($idCarro);
$carro=$nodoRaiz->appendChild($carro);

$placa = $xml->createElement("Placa","$unCarro->carPlaca");
$placa = $carro->appendChild($placa);

$marca = $xml->createElement("Marca","$unCarro->carMarca");
$marca = $carro->appendChild($marca);

$color = $xml->createElement("Color","$unCarro->carColor");
$color = $carro->appendChild($color);
      
  }
  
  $xml->formatOutput=true;
$xml->save("carrosBD.xml");


