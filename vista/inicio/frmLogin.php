<!DOCTYPE html>
<?php
session_start();
extract($_REQUEST);
error_reporting(0);
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="../CSS/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/boostrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/dropdow.css" rel="stylesheet" type="text/css"/>
    
    </head>
    <body>
        <header class="head-index"><?php include "encabezado.php"; ?> </header>
        <nav class="nav-index"> <?php include "Menu.php"; ?></nav>
        <section class="sect-index" > 

            <div class="row justify-content-center">
                <div class="col-6">
                    <form class="form-group2" name="frmLogin.php" method="post" action="../../controlador/ctrlIniciarSesion.php">
                        <input type="hidden" name="opcion" value="1">
                        <h2>Iniciar sesión</h2> 
                        Usuario: <input class="form-control" type="text" name="txtLogin" id="txtLogin" placeholder="igrese su usuario">
                        Password: <input class="form-control" type="password" name="txtPassword" id="txtPassword" placeholder="ingrese su contraseña"><br>

                        <button class="btn" type="submit">ingresar</button>


                    </form>
                </div>
            </div>
        </section>
        <footer class="foot-index"><?php include "PiePagina.php"; ?></footer>

    </body>

</html>
