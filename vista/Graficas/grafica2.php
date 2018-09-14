<?php

$imagen = imagecreate(340, 340);
$fondo= imagecolorallocate($imagen, 50, 50, 50);
$rojo= imagecolorallocate($imagen, 255, 0, 0);
$azul= imagecolorallocate($imagen, 0, 0, 255);
$verde= imagecolorallocate($imagen, 0, 255, 0);

imagefilledrectangle($imagen, 50, 250, 100, 300, $rojo);
imagestring($imagen,8, 50, 310, "colombia", $rojo);
imagefilledrectangle($imagen, 110, 200, 160, 300, $azul);
imagestring($imagen,8, 130, 310, "ecuador", $azul);

imagefilledrectangle($imagen, 170, 150, 220, 300, $verde);
imagestring($imagen,8, 200, 310, "brazil", $verde);

header("Content-type: image/png");
imagepng($imagen);