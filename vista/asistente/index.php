<?php
session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
error_reporting(0);
extract($_REQUEST);
if (!isset($_GET['pg'])) {
    $pg = "frmContenido";
}
?>
<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css"><!--estilos propios--->
        <link href="../CSS/dropdow.css" rel="stylesheet" type="text/css"/><!--menu--->
        <link href="../CSS/boostrap/css/bootstrap.css" rel="stylesheet" type="text/css"/><!--boostrap--->
        <link href="../../Recursos/Librerias/Jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        
        <!--<link rel="stylesheet" type="text/css" href="../../plugin-mensaje/jquery.ambiance.css">mensaje--->
        <!--<script src="../../plugin-mensaje/jquery.ambiance.js" type="text/javascript"></script>mensaje--->
        <!--<script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>-->
        <!--<script src="../../Recursos/Librerias/Jquery/jquery-ui.min.js" type="text/javascript"></script>Jquery--->
        <script src="../../js/Funciones.js" type="text/javascript"></script>funciones javaScript-
        <title></title>
    </head>
    <body>
        <header class="head-index"><?php include "encabezado.php"?> </header>
        <nav class="nav-index"> <?php include "Menu.php"?></nav>
        <section class="sect-index"><?php include $pg . '.php'?></section>

        <footer class="foot-index" ><?php include "PiePagina.php"?></footer>

    </body>

</html>