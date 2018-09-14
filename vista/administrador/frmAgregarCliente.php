<!DOCTYPE html>
<?php 

session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
extract($_REQUEST); 
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/dropdow.css" rel="stylesheet" type="text/css"/>
        <title>Agregar cliente</title>
    </head>
    <body>

        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Agregar Cliente</h1>
                <form class="form-group2" name="frmAgregarCliente" method="post" action="../../controlador/ctrlCliente.php">
                    <input type="hidden" name="opcion" value="1">
                    Identificación del cliente: 
                    <input class="form-control" name="txtIdentificacion" id="txtIdentificacion" type="text" placeholder="ingrese aquí identificacion" size="60" required>
                    Nombres: 
                    <input class="form-control" name="txtNombres" type="text" id="txtNombres" size="60" placeholder="ingrese nombres" required>
                    Apellidos: 
                    <input class="form-control" name="txtApellidos" type="text" id="txtApellidos" size="60" placeholder="ingrese apellidos" required>
                    Correo: 
                    <input class="form-control" name="txtCorreo" type="email" id="txtCorreo" size="60" required>
                    Telefono:
                    <input class="form-control" name="txtTelefono" type="tel" id="txtTelefono" size="60" ><br>
                    <button class="btn" id="btnAgregar"  type="submit">Enviar</button>
                </form>
            </div>
        </div>
        
            <p class="message">
        <?php
        if (@$x == 1) {
            echo"cliente agregado ";
        }
        if (@$x == 2) {
            echo"problemas al agregar el cliente";
        }
      
        ?>
    </p>

    </body>
</html>