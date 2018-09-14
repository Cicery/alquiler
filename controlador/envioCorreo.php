
<?php
$remitente="cicery.aviles.20@gmail.com";

       
$resulrado = mail("ycicery0@misena.edu.co","saludo","holaaaaaa");

if($resulrado){
   echo "Envio correcto";
}else{
   echo "No se pudo enviar correo";
}

?>;