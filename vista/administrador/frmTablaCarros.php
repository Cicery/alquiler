<?php 
session_start();
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
} ?>
<link href="../CSS/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<script src="../../js/jquery.dataTables.js" type="text/javascript"></script>

<h1 aling="center" >listado de carros</h1>
<table id="listaCarros" width="70%"  align="center">
  <thead>
  <tr>
    <th align="center">Placa</th>
    <th align="center">Marca</th>
    <th align="center">Color</th>
    <th align="center">Estado</th>
     <th align="center">Foto</th>
  
  </tr>
  </thead>
  <tbody>
    

   
      <tr id="fila">
      <td id="placa"></td>
      <td id="marca"></td>
      <td id="color"></td>
      <td id="estado"></td>
      <td id="foto"><img src=""></td>
  </tr>


  </tbody>
</table>
<div align="center">
    <a href="pdfCarros.php" >pdf de carros</a>
 </div>
<script type="text/javascript">
   $('#listaCarros').DataTable({
                        'ordering': true,
                        'order': [[0, 'desc']],

                        'language': {
                            'url': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',

                        }
                    });
</script>

