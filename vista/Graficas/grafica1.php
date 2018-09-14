<?php

$imagen= imagecreate(200,200);
$fondo= imagecolorallocate($imagen, 50, 50, 50);
$rojo= imagecolorallocate($imagen, 255, 0, 0);
$azul= imagecolorallocate($imagen, 0, 0, 255);
imagefilledarc($imagen, 100, 100, 150, 175, 0, 45, $rojo, IMG_ARC_PIE);
imagefilledarc($imagen, 100, 100, -150, 175, 0, 45, $azul, IMG_ARC_PIE);


header("Content-type: image/png");
imagepng($imagen);

