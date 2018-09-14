<!doctype html>
<?php  
session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
extract($_REQUEST);
 ?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
        <link href="../CSS/boostrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/dropdow.css" rel="stylesheet" type="text/css"/>
        <title>Agregar carro</title>
    </head>

    <body>
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Agregar Carro</h1>
                <form class="form-group2" name="FrmAgregarCarro" method="post" action="../../controlador/ctrlCarro.php" enctype="multipart/form-data">
                    <input type="hidden" name="opcion" value="1">
                    Placa: <input class="form-control" type="text" name="txtPlaca" id="txtPlaca">     
                    Marca: <input class="form-control" type="text" name="txtMarca" id="txtMarca"><br>
                   
                     <select class="form-control" name="txtColor" id="txtColor" >
                        <option value="Negro">Negro</option>
                        <option value="Blanco">Blanco</option>
                         <option value="Rojo">Rojo</option>
                         <option value="Verde">Verde</option>
                          <option value="Azul">Azul</option>
                    </select><br>
                     Foto: (png)
                    <input class="form-control" type="file" name="fotoC" id="fotoC"><br>
                    <button class="btn" id="button" name="button" type="submit">Enviar</button>

                </form>
                      <p class="message">
            <?php
            if (@$x == 1) {
                echo"carro agregado correctamente";
            }
            if (@$x == 2) {
                echo"problemas al agregar el carro";
            }
            if (@$x == 3) {
                echo"problemas al agregar la foto";
            }
            ?>
      
    </p>
            </div>
        </div>
  


</html>