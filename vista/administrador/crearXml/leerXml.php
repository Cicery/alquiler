<?php

header('Content-Type: text/html; charset=UTF-8');
$dom = new DomDocument();
$dom->load('carros.xml');
$carro = $dom->getElementsByTagName('Carros');

echo "listado de carros<br>";
foreach ($carro as $Carro) {
    echo "<br><b> id carro:</b>" . $carro->getAttribute('idCarro');
    echo "<br><b> placa:</b>" . $carro->getElementByTagname('Placa')->item(0)->nodeValue;
    echo "<br><b> marca:</b>" . $carro->getElementByTagname('Marca')->item(0)->nodeValue;
    echo "<br><b> color:</b>" . $carro->getElementByTagname('Color')->item(0)->nodeValue;
}

?>