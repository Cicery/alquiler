<?php

require ('../../Recursos/Librerias/Fpdf/fpdf.php');
require ('../../recursos/Librerias/code128/code128.php');
include ('../../modelo/Conexion.php');
include ('../../Modelo/DatosCarro.php');

class PDF extends PDF_Code128 {

   // Cabecera de página
   function Header() {
       // Logo
       $this->Image('../../recursos/imagenes/logoRent.png', 5, 5, 33);
       // Arial bold 15
       $this->SetFont('Arial', 'B', 15);
       // Movernos a la derecha
     $this->Cell(50);
       // Título
       $this->Cell(10, 10, 'renta-carros', 0, 0,'c');
       // Salto de línea
       $this->Ln(4);
       $this->SetFont('Arial','', 8);
       $this->Cell(50);
        $this->Cell(10, 10, 'Nit:45345435-1', 0, 0,'c');
        $this->Ln(4);
      $this->Cell(50);
         $this->Cell(10, 10, 'Dir: Crr 1h No. 73-33', 0, 0,'c');
          $this->Ln(25);
          $this->Line($this->GetX(), $this->GetY(),$this->GetX()+90, $this->GetY());
        
   }

   // Pie de página
   function Footer() {
       // Posición: a 1,5 cm del final
       $this->SetY(-15);
       // Arial italic 8
       $this->SetFont('Arial', 'I', 8);
       // Número de página
         $this->Cell(10, 10, 'https://co.000webhost.com/members/website/list', 0, 0,'c');
   }
   
   function generarFactura(){
       //encabezado
        
        $this->SetFont('Arial','', 10);
       $fecha = date ('Y-m-d');
       $hora = date ('H:i:s');
       $fechaAlquiler = "2018-08-15";
       $identificacion = ("1007334250");
       $dias= floor(abs((strtotime($fecha)-strtotime($fechaAlquiler))/86400));
       
       $tarifaPorDia=10000;
       $valorAPagar = $tarifaPorDia *$dias; 
       $this->Ln(4);
        $this->Cell(10, 10, 'Factura de venta No. 125', 0, 0,'L');
        $this->Ln(4);
        $this->Cell(10, 10, 'Fecha:'.$fecha, 0, 0,'L');
        $this->Cell(25);
        $this->Cell(10, 10, 'Hora:'.$hora, 0, 0,'L');
        $this->Ln(4);
        $this->Cell(10, 10, 'Empleado: Armando', 0, 0,'L');
        $this->Ln(10);
        $this->Line($this->GetX(), $this->GetY(),$this->GetX()+90, $this->GetY());
        //datos del cliente del carro
        $this->Cell(10, 10, 'C.C:', 0, 0,'L');
         $this->Cell(20);
          $this->Cell(100, 10,number_format($identificacion) , 0, 0,'L');
          $this->Ln(4);
          $this->Cell(10, 10, 'Nombre:', 0, 0,'L');
         $this->Cell(20);
          $this->Cell(10, 10, 'Yhefferson Cicery', 0, 0,'L');
            $this->Ln(4);
          $this->Cell(10, 10, 'Carro:', 0, 0,'L');
         $this->Cell(20);
          $this->Cell(10, 10, 'Mazda', 0, 0,'L');
           $this->Ln(4);
          $this->Cell(10, 10, 'Placa:', 0, 0,'L');
         $this->Cell(20);
          $this->Cell(10, 10, 'yxy323', 0, 0,'L');
          $this->Ln(4);
          $this->Cell(10, 10, 'Fecha Alquiler:', 0, 0,'L');
         $this->Cell(20);
          $this->Cell(10, 10, $fechaAlquiler, 0, 0,'L');
          $this->Ln(4);
          $this->Cell(10, 10, 'Fecha Entrega:', 0, 0,'L');
         $this->Cell(20);
          $this->Cell(100, 10, $fecha, 0, 0,'L');
          $this->Ln(4);
          $this->Cell(10, 10, 'No. Dias: ', 0, 0,'L');
          $this->Cell(20);
          $this->Cell(10, 10, $dias, 0, 0,'L');
          $this->Ln(10);
           $this->Line($this->GetX(), $this->GetY(),$this->GetX()+90, $this->GetY());
            $this->SetFont('Arial','B', 12);
             $this->Cell(10, 10, 'Valor a Pagar:', 0, 0,'L');
            $this->Cell(20);
          $this->Cell(10, 10, number_format($valorAPagar), 0, 0,'L');
          
          $this->Ln(8);
          $this->Cell(90,14,$this->Code128($this->GetX()+5,$this->GetY()+2,
                  '0000000125',40,8),0,0,'C');
          $this->Ln(7);
          $this->SetFont('Arial','B',6);
          $this->Cell(20,10,'Fac No.0000000125',0,0,'L');
   }   
       
   
   



}

$pdf = new PDF('p','mm',array(100,180));

$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(5, 5);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->generarFactura();
$pdf->Output();

 

