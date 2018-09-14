<?php 
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
 ?>
<link rel="stylesheet" type="text/css" href="../../vista/CSS/dropdow.css">

<ul>
    <li class="dropdow"><a  class="drobtn" href="?pg=FrmContenido">Home</a></li>
    <li class="dropdow">
        <a class="drobtn">EMPLEADOS</a>
        <div class="dropdo-content">
            <a href="?pg=frmAgregarEmpleado">Agregar</a>
            <a href="#">Actualizar</a>
            <a href="?pg=frmTablaEmpleados">Listar</a>
        </div>
    </li>

    <li class="dropdow">
        <a class="drobtn">CLIENTES</a>
        <div class="dropdo-content">
            <a href="?pg=frmAgregarCliente">Agregar</a>
            <a href="#">Actualizar</a>
            <a href="#">Listar</a>
        </div>
    </li>

    <li class="dropdow">
        <a class="drobtn">CARROS</a>
        <div class="dropdo-content">
            <a href="?pg=frmAgregarCarro">Agregar</a>
            <a href="?pg=">Actualizar</a>
            <a href="?pg=frmTablaCarros">Listar</a>

        </div>
    </li>
    <li class="dropdow">
        <a class="drobtn">REPORTES</a>
        <div class="dropdo-content">
            <a href="?pg=GraficaXmes">Por mes</a>
            <a href="?pg=">Por clientes</a>
            <a href="?pg=">Por vehiculos</a>

        </div>
    </li>
    

    <li class="dropdow"><a class="drobtn" href="salir.php">SALIR</a></li>
    
 
    <li class="MenSesion">
        <a><img src="../fotos/<?php echo $_SESSION['identifica']?>.jpg" class="foto">
         <p class="nombreEmp"><?php echo $_SESSION['nombreEmpleado']; ?></p> </a>
       
    </li>
     
   
</ul>

