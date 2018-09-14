<!doctype html>
<?php  session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
extract($_REQUEST);
 ?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/boostrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../CSS/estilos.css">
        <link href="../CSS/dropdow.css" rel="stylesheet" type="text/css"/>


        <title>agregar empleado</title>
    </head>

    <body>

        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Agregar Empleado</h1>
                <form class="form-group2" name="Frmagregarempleado" method="post" action="../../controlador/ctrlEmpleado.php" enctype="multipart/form-data">
                    <input type="hidden" name="opcion" value="1">
                    Identificación: 
                    <input class="form-control" name="txtIdentificacion" id="txtIdentificacion" type="text" placeholder="ingrese aquí identificacion" size="60" required>
                    <div id="mensaje" ></div>
                    Nombres: 
                    <input class="form-control" name="txtNombres" type="text" id="txtNombres" size="60" placeholder="ingrese nombres" required>
                    Apellidos: 
                    <input class="form-control" name="txtApellidos" type="text" id="txtApellidos" size="60" placeholder="ingrese apellidos" required>
                    Correo: 
                    <input class="form-control" name="txtCorreo" type="email" id="txtCorreo" size="60" required>
                    Cargo: 
                    <select class="form-control" name="txtCargo" id="txtCargo" required>
                        <option value="Gerente" >Gerente</option>
                        <option value="Tesorero" selected="selected">Tesorero</option>
                        <option value="Recepcionista">Recepcionista</option>
                    </select>
                    Rol:
                    <select class="form-control" name="txtRol" id="txtRol" required>
                        <option value="Administrador">Administrador</option>
                        <option value="Asistente">Asistente</option>
                    </select><br>
                    Foto: (png)
                    <input class="form-control" type="file" name="foto" id="foto"><br>
                    <button class="btn" id="btnAgregar"  type="submit" >Enviar</button>
                   </form> 
            </div>
        </div>
   
    



    <p class="message">
        <?php
        if (@$x == 1) {
            echo"empleado agregado ";
        }
        if (@$x == 2) {
            echo"problemas al agregar el empleado";
        }
        if (@$x == 3) {
            echo"problemas al agregar foto";
        }
        ?>
    </p>

    <script src="../../js/Funciones.js" type="text/javascript"></script>
</body>
</html>