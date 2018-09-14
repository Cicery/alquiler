<?php

require ('../../Recursos/Librerias/Fpdf/fpdf.php');
include ('../../modelo/Conexion.php');
include ('../../Modelo/DatosEmpleado.php');

class PDF extends FPDF {

    // Cabecera de página
    function Header() {
        // Logo
        $this->Image('../../recursos/imagenes/logoRent.png', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Lista de Empleados', 0, 0);
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

    function obtenerEmpleado($header, $data) {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Cabecera
        $w = array(43, 35, 40, 50, 30);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        while ($Empleado = $data->fetchObject()) {
            $this->Cell($w[0], 6, $Empleado->perIdentificacion, 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $Empleado->perNombres, 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $Empleado->perApellidos, 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $Empleado->perCorreo, 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $Empleado->empCargo, 'LR', 0, 'L', $fill);
            $this->Ln();
//            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$pdf = new PDF();
//obtener datos del carro
$objDatosEmpleado = new DatosEmpleado();
$data = $objDatosEmpleado->obtenerEmpleado();
// Títulos de las columnas
$header = array('IDENTIFICACION', 'NOMBRE', 'APELLIDO', 'CORREO', 'CARGO');

$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(3, 5);
$pdf->AddPage();

$pdf->AliasNbPages();
$pdf->obtenerEmpleado($header, $data->datos);
$pdf->Output();
?>