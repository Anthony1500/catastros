<?php 
require('../fpdf182/fpdf.php');
include("../controlador/coneccion.php");
$result = mysqli_query($con, 'SELECT * FROM propietario');
$result1 = mysqli_query($con, 'SELECT * FROM propiedad');
$result2 = mysqli_query($con, 'SELECT * FROM cobro');
$number_of_products = mysqli_num_rows($result);
$column_prop_id = "";
$column_prop_nombre = "";
$column_prop_apellido = "";
while($row = mysqli_fetch_array($result))
{
    $prop_id = $row["prop_id"];
    $prop_nombre =  $row["prop_nombre"] ;
    $prop_apellido = $row["prop_apellido"];
   

    $column_prop_id = $column_prop_id.$prop_id."\n";
    $column_prop_nombre = $column_prop_nombre.$prop_nombre."\n";
    $column_prop_apellido = $column_prop_apellido.$prop_apellido."\n";
    
   

    
}



//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(0, 5, '', 0, 1, 'C');
$pdf->Cell(0, 5, 'CATASTRO GENERAL DE LA ACEQUIA TOALLO COMUNIDADES', 0, 1, 'C');
$pdf->Cell(0, 7, 'REPORTE ', 0, 1, 'C');
$pdf->Cell(0, 5, '', 0, 1, 'C');

$pdf->Image('../imagenes/logoecuador.gif',10,8,30,30); //añadir imagen

$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(50,1,"Fecha: ".date("j-m-y"),0,0,'L');








//Fields Name position
$Y_Fields_Name_position =70;
//Table position, under Fields Name
$Y_Table_Position = 76;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,23);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(29,6,'Codigo',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(20,6,'Nombre',1,0,'L',1);
$pdf->SetX(70);
$pdf->Cell(20,6,'Apellido',1,0,'L',1);
$pdf->SetX(6);
$pdf->Ln();
//barra de arriva
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(65);
$pdf->Cell(20,6,'prop_id',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(65,6,'prop_nombre',1,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(30,6,'prop_apellido',1,0,'L',1);


$pdf->Ln();

//tablas blanco
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_prop_id,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(65,6,$column_prop_nombre,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(30,6,$column_prop_apellido,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(28);





//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    $pdf->MultiCell(85,6,'',1);
    $i = $i +1;
}













$pdf->Output();



?>