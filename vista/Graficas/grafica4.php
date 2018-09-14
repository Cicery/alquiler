<?php

include './jpgraph-4.2.2/src/jpgraph.php';
include_once './jpgraph-4.2.2/src/jpgraph_pie.php';
include_once './jpgraph-4.2.2/src/jpgraph_pie3d.php';


$ydata=array(20,60,21);
$meses= array("enero","febrero","marzo");
$colores=array("black","black","black");

$grafica=new PieGraph(700,600);
//$tema= new VividTheme();

//$grafica->SetTheme($tema);


$grafica->title->set("relacion de ventas");


$gPie3d= new PiePlot3D($ydata);
$gPie3d->SetSliceColors(array('red','blue','green'));
$gPie3d->ExplodeSlice(1);
$gPie3d->ExplodeSlice(2);
$grafica->Add($gPie3d);
$grafica->Stroke();


