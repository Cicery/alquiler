<?php 
if (!isset($_SESSION['idEmpleado'])) {
    header("location:../inicio/frmLogin.php");
}
 ?>
<link rel="stylesheet" type="text/css" href="../../vista/CSS/dropdow.css">
<style>

    
</style>
<ul>
    <li class="dropdow"><a  class="drobtn" href="?pg=frmContenido">Home</a></li>
    <li class="dropdow">
        <a class="drobtn">ALQUILER</a>
        <div class="dropdo-content">
            <a href="?pg=frmAlquiler">Agregar</a>
            <a href="?pg=">Actualizar</a>
            <a href="?pg=">Listar</a>
        </div>
    </li>

    <li class="dropdow">
        <a class="drobtn">CLIENTES</a>
        <div class="dropdo-content">
            <a href="?pg=frmAgregarCliente">Agregar</a>
            <a href="?pg=">Actualizar</a>
            <a href="?pg=">Listar</a>
        </div>
    </li>

  
    
    

    <li class="dropdow"><a class="drobtn" href="../administrador/salir.php">SALIR</a></li>
    
      
</ul>

