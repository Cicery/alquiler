<?php 
session_start();
error_reporting(0);
extract($_REQUEST);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="../../js/graficas.js"></script>
        <script src="../../recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>
	<title>Document</title>
</head>
<body>
	<center>
    <h2>grafica de carros alquilados por mes</h2>
      <div id="chart_div" style="width:700px; height: 600px;"> </div>
      <br>Seleccione tipo de grafica:
      <select class="col-10 form-control" id="tipoGrafico" onchange="generarGrafico()">
        <option value="1">Tipo columna</option>
        <option value="2">Tipo circular</option>
      </select>
</center>
</body>
</html>