<?php

require ('../../Recursos/Librerias/Fpdf/fpdf.php');
require ('../../recursos/Librerias/code128/code128.php');
include ('../../modelo/Conexion.php');
include ('../../Modelo/DatosCarro.php');

class PDF extends PDF_Code128 {

   // Cabecera de página
   function Header() {
       // Logo
       $this->Image('../../recursos/imagenes/logoRent.png', 10, 8, 33);
       // Arial bold 15
       $this->SetFont('Arial', 'B', 15);
       // Movernos a la derecha
       $this->Cell(80);
       // Título
       $this->Cell(30, 10, 'Lista de carros', 0, 0);
       // Salto de línea
       $this->Ln(35);
   }

   // Pie de página
   function Footer() {
       // Posición: a 1,5 cm del final
       $this->SetY(-15);
       // Arial italic 8
       $this->SetFont('Arial', 'I', 8);
       // Número de página
       $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
   }

   function ListaCarros($header, $data) {
       // Colores, ancho de línea y fuente en negrita
       $this->SetFillColor(0, 0, 0);
       $this->SetTextColor(255);
       $this->SetDrawColor(128, 0, 0);
       $this->SetLineWidth(.3);
       $this->SetFont('', 'B');
       // Cabecera
       $w = array(40, 35, 30, 30,30, 50);
       for ($i = 0; $i < count($header); $i++) {
           $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
       }
       $this->Ln();
       // Restauración de colores y fuentes
       $this->SetFillColor(0, 0, 0);
       $this->SetTextColor(0);
       $this->SetFont('');
       // Datos
       $fill = false;
       
        
       while ($carro = $data->fetchObject()) {
         
   
         if (file_exists("../fotosCarros/".$carro->carPlaca.'.jpg')){
    $foto="../fotosCarros/".$carro->carPlaca.'.jpg';
      }else{
    $foto="../fotosCarros/noFoto.png";
      }
           
           $this->Cell($w[0], 15, $carro->carPlaca, 'LR', 0, 'L', $fill);
           $this->Cell($w[1], 15, $carro->carMarca, 'LR', 0, 'L', $fill);
           $this->Cell($w[2], 15, $carro->carColor, 'LR', 0, 'L', $fill);
           $this->Cell($w[3], 15, $carro->carEstado, 'LR', 0, 'L', $fill);

           $this->Cell($w[4],15,$this->Image("../fotosCarro/".$foto,$this->GetX()+5,$this->GetY()+1,15),'LR',0,'L',$fill); 
           $this->Cell($w[5], 15, $this->Code128($this->GetX()+5, $this->GetY()+2, $carro->carPlaca,40,8), 'LR', 0, 'L', $fill);
           $this->Ln();
           //$fill = !$fill;
       }
       // Línea de cierre
       $this->Cell(array_sum($w), 0, '', 'T');
   }

}

$pdf = new PDF();
//obtener datos del carro
$objDatosCarro = new DatosCarro(); 
$data = $objDatosCarro->listaCarros();
// Títulos de las columnas
$header = array('PLACA', 'MARCA', 'COLOR', 'ESTADO','FOTO','CODIGO BARRA');

$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(5, 5);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->ListaCarros($header, $data->datos);
$pdf->Output();

 


