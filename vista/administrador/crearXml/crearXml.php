<?php

$xml = new DomDocument("1.0","UTF-8");

//crear nodo raiz
$nodoRaiz = $xml->createElement("Carros");
$nodoRaiz = $xml->appendChild($nodoRaiz);

//crear carro 1
$carro = $xml->createElement("Carro");
$idCarro = $xml->createAttribute("idCarro");
$idCarro->value=1;
$carro->appendChild($idCarro);
$carro=$nodoRaiz->appendChild($carro);

$placa = $xml->createElement("Placa","xxa123");
$placa = $carro->appendChild($placa);

$marca = $xml->createElement("Marca","Mazda");
$marca = $carro->appendChild($marca);

$color = $xml->createElement("Color","Blanco");
$color = $carro->appendChild($color);


//crear carro 2
$carro = $xml->createElement("Carro");
$idCarro = $xml->createAttribute("idCarro");
$idCarro->value=2;
$carro->appendChild($idCarro);
$carro=$nodoRaiz->appendChild($carro);

$placa = $xml->createElement("Placa","ytz325");
$placa = $carro->appendChild($placa);

$marca = $xml->createElement("Marca","mercedez");
$marca = $carro->appendChild($marca);

$color = $xml->createElement("Color","griz");
$color = $carro->appendChild($color);
$xml->formatOutput=true;
$xml->save("carros.xml");