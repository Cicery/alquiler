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


 ?>
<link href="../CSS/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<script src="../../js/jquery.dataTables.js" type="text/javascript"></script>

<h1 align="center">Listado de Empleados</h1>

<div class=" col-11 justify-content-center">
   
<table id="listadoEmleados" width="70%" border="1" align="center">
  <thead>
  <tr>
    <th align="center">Identificacion</th>
    <th align="center">Nombre</th>
    <th align="center">Apellido</th>
    <th align="center">Correo</th>
    <th align="center">Cargo</th>
    <th align="center">Foto</th>
  </tr>
  </thead>
  <tbody>
  <?php 
  while ($unEmpleado = $resultado->datos->fetchObject()) {
      if (file_exists("../fotos/".$unEmpleado->perIdentificacion.'.jpg')){
    $foto="../fotos/".$unEmpleado->perIdentificacion.'.jpg';
      }else{
    $foto="../fotos/silueta.png";
      }
   ?>
  <tr>
    <td> <?php echo$unEmpleado->perIdentificacion?></td>
    <td><?php echo $unEmpleado->perNombres?></td>
    <td><?php echo $unEmpleado->perApellidos?></td>
    <td><?php echo $unEmpleado->perCorreo?></td>
    <td><?php echo $unEmpleado->empCargo?></td>
    <td><img src="../fotos/<?php echo$foto?>" width="40" height="40"></td>
  </tr>

  <?php } ?>
  </tbody>
  
</table>
    
</div>
<div align="center">
 <a href="excelEmpleados.php" ><img src="../../recursos/imagenes/icons8-ms-excel-40.png"></a>
 <a href="pdfEmpleados.php" ><img src="../../recursos/imagenes/icons8-ms-excel-40.png"></a>
 </div>
<script type="text/javascript">
   $('#listadoEmleados').DataTable({
                        'ordering': true,
                        'order': [[0, 'desc']],

                        'language': {
                            'url': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',

                        }
                    });
</script>