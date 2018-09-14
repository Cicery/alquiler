<?php
session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}

include'../../modelo/Conexion.php';
include'../../modelo/DatosEmpleado.php';
$objDatosEmpleado = new DatosEmpleado();
$resultado = $objDatosEmpleado->obtenerEmpleado();
$cantidad = $resultado->datos->rowCount();

header('Content-type: application/vnd.ms-excel charest=UTF-8');
header("Content-Disposition: attachment; filename=excelEmpleados.xls");
header("Progam: no-cache");
header("Expires: 0");
?>


<h1 align="center">tabla de personas</h1>
<div class="col-3">

</div>
<div class="">
    <table id="listadoEmleados" width="70%" border="1" align="center">
        <thead>
            <tr>
                <th align="center">Identificacion</th>
                <th align="center">Nombre</th>
                <th align="center">Apellido</th>
                <th align="center">Correo</th>
                <th align="center">Cargo</th>

            </tr>
        </thead>
        <tbody>

            <?php
            while ($unEmpleado = $resultado->datos->fetchObject()) {
                ?>

                <tr>
                    <td> <?php echo$unEmpleado->perIdentificacion ?></td>
                    <td><?php echo $unEmpleado->perNombres ?></td>
                    <td><?php echo $unEmpleado->perApellidos ?></td>
                    <td><?php echo $unEmpleado->perCorreo ?></td>
                    <td><?php echo $unEmpleado->empCargo ?></td>

                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>