 <meta charset="UTF-8" >

<?php

$aleatorio = rand(1,1000);
//echo $aleatorio;

$datos="abcdefghijkmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWYZ0123456789@&%#/_-?¡¿!";
$cantidad=strlen($datos);
$clave="";

for($i=0;$i<6;$i++){
$posision = rand(1,$cantidad-1);
$clave.=$datos[$posision];
}
echo $clave;
?>;