<?php
session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
extract($_REQUEST);
include'../../modelo/Conexion.php';
include'../../modelo/DatosCarro.php';
$objDatosCarro = new DatosCarro();
$resultado = $objDatosCarro->listaCarrosDisponibles();
$cantidad = $resultado->datos->rowCount();
?>
<html lang="en">
    <head>

        <link href="../CSS/boostrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../../recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="../../recursos/Librerias/Jquery/jquery-ui.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
        
        <script src="../../js/Funciones.js" type="text/javascript"></script>


    </head>

    <body style="position: absolute">
        <button id="aggCliente" class="btn-danger">agregar Cliente</button>
        <h1 align="center">Carros disponibles</h1>


        <?php
        while ($unCarro = $resultado->datos->fetchObject()) {
            if (file_exists("../fotosCarros/" . $unCarro->carPlaca . '.jpg')) {
                $foto = "../fotosCarros/" . $unCarro->carPlaca . '.jpg';
            } else {
                $foto = "../fotosCarros/noFoto.png";
            }
            ?>


            <div class="card" style="width:20rem;margin:20px 0 0px 100px; float: left; margin-top: 20px;  ">
                <a class="btn"  id="btnAlquilar" onclick="cargarIdcar(<?php echo $unCarro->idCarro ?>)"><i><img class="card-img-top" src="../fotosCarros/<?php echo$foto ?>" alt="image" style="width:100%;height: 250px"></i></a>

                <div class="card-body">
                    Placa:
                    <input class="form-control" type="text" id="txtPlaca" value="<?php echo $unCarro->carPlaca ?>" disabled>
                    Marca:
                    <input class="form-control" type="text" id="txtMarca" value="<?php echo $unCarro->carMarca ?>" disabled>
                    Estado:
                    <input class="form-control" type="text" id="txtEstado" value="<?php echo $unCarro->carEstado ?>" disabled>


                </div>
            </div>


        <?php } ?>



        <!-------------------------------------------- Modal para alquilar vehiculo----------------------------------------------------->
        <form  name="frmAgregarAlquiler" method="post" action="../../controlador/ctrlAlquiler.php">

            <div  id="modalAlquilar"  >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">agregar alquiler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="opcion" value="1">
                <input class="form-control" type="text" id="txtIdCarro" disabled>
                <input class="form-control" type="text" id="txtIdCliente" >
                Identificación Cliente: 
                <input class="form-control" name="txtIdentificacionModal" type="text" id="txtIdentificacionModal"   >

                Fecha Devolucion: 
                <input class="form-control" name="txtFechaDevolucionModal" type="date" id="txtFechaDevolucionModal"  ><br>

                <div class="modal-footer" >
                    <button type="button" class="btn btn-secondary" id="btnCancelarAlq">Calcelar</button>
                    <button  class="btn btn-primary" id="btnAggAlquiler"  type="submit">Alquilar</button>
                </div>



            </div>
        </form>
        <!-------------------------------------------- Modal para alquilar vehiculo----------------------------------------------------->

        <!-------------------------------------------- Modal para agregar cliente----------------------------------------------------->
        <form>
            <div  id="modalAggCliente"  >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">agregar cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <img src="">
                    <div class="modal-body">
                        Identificación del cliente: 
                        <input class="form-control" name="txtIdentificacionModalAC" id="txtIdentificacionModalAC" type="text" placeholder="ingrese aquí identificacion" size="60" required>
                        Nombres: 
                        <input class="form-control" name="txtNombresModalAC" type="text" id="txtNombresModalAC" size="60" placeholder="ingrese nombres" required>
                        Apellidos: 
                        <input class="form-control" name="txtApellidosModalAC" type="text" id="txtApellidosModalAC" size="60" placeholder="ingrese apellidos" required>
                        Correo: 
                        <input class="form-control" name="txtCorreoModalAC" type="email" id="txtCorreoModalAC" size="60" required>
                        Telefono:
                        <input class="form-control" name="txtTelefonoModal" type="tel" id="txtTelefonoModal" size="60">


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Calcelar</button>
                            <button type="button" class="btn btn-primary" id="btnAggClienteModal" data-dismiss="modal">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-------------------------------------------- Modal para agregar cliente----------------------------------------------------->







    </body>

</html>