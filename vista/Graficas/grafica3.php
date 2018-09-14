<?php

include './jpgraph-4.2.2/src/jpgraph.php';
include './jpgraph-4.2.2/src/jpgraph_bar.php';


$ydata=array(20,28,15);
$meses= array("enero","febrero","marzo");
$colores=array("black","black","black");

$grafica=new Graph(700,600,"auto");
$grafica->setScale("textlin");
$grafica->SetMargin(40,20,20,40);
$grafica->title->set("relacion de ventas primer trimestre");
$grafica->xaxis->title->set("meses");
$grafica->yaxis->title->set("ventas");
$grafica->xaxis->setticklabels($meses,$colores);


$barplot = new BarPlot($ydata);
$grafica->Add($barplot);
$grafica->Stroke();
