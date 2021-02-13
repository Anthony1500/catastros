<?php 
require_once 'controlador/excel.php';

activeErrorReporting();
noCli();

require_once 'Classes/PHPExcel.php';
require ('controlador/coneccion.php');
require_once 'controlador/mostrar.php';
$sql = "SELECT * FROM riego";
    $resultado = mysqli_query($con,$sql);
    $sql1 = "SELECT * FROM terrenosvista";
	$resultado1 = mysqli_query($con,$sql1);
$fila = 7; 
$fila1 = 7; 

$gdImage = imagecreatefrompng('imagenes/logoecuador.png');
$gdImage1 = imagecreatefrompng('imagenes/logoagua.png');//Logotipo	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	

	$objPHPExcel->getProperties()->setCreator("Sistema de Catastros")->setDescription("Reporte de Propiedad");
	

	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("PROPIEDAD");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage1);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('F1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    

    $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('H1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage1);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('S1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	$estiloTituloReporte = array(
		'font' => array(
		'name'      => 'Arial',
		'bold'      => true,
		'italic'    => false,
		'strike'    => false,
		'size' =>13
		),
		'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_NONE
		)
		),
		'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);
		
		$estiloTituloColumnas = array(
		'font' => array(
		'name'  => 'Arial',
		'bold'  => true,
		'size' =>10,
		'color' => array(
		'rgb' => 'FFFFFF'
		)
		),
		'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => '538DD5')
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		),
		'alignment' =>  array(
		'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);
		
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray( array(
		'font' => array(
		'name'  => 'Arial',
		'color' => array(
		'rgb' => '000000'
		)
		),
		'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		),
		'alignment' =>  array(
		'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		));
		
		$objPHPExcel->getActiveSheet()->getStyle('A1:F5')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A6:F6')->applyFromArray($estiloTituloColumnas);
		
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'REPORTE RIEGO');
		$objPHPExcel->getActiveSheet()->mergeCells('D3:E3');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('A6', 'CODIGO RIEGO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CODIGO PROPIEDAD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('C6', 'DIAS');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('D6', 'HORAS');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('E6', 'OBSERVACIONES');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('F6', 'FECHA');
		

        $objPHPExcel->getActiveSheet()->getStyle('H1:S5')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('H6:S6')->applyFromArray($estiloTituloColumnas);
		
		$objPHPExcel->getActiveSheet()->setCellValue('L3', 'REPORTE TERRENOS ');
		$objPHPExcel->getActiveSheet()->mergeCells('L3:N3');
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('H6', 'CODIGO PROPIEDAD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('I6', 'NOMBRE');
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('J6', 'APELLIDO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('K6', 'CEDULA');
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('L6', 'METROS m²');
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('M6', 'LONGITUD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('N6', 'LATITUD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('O6', 'CIUDAD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('P6', 'PARROQUIA');
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'TIPO DE ASIGNACIÓN');
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('R6', 'TERRENO CODIGO');
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('S6', 'FECHA DE ASIGNACIÓN');

$i = 2;
while($rows = $resultado->fetch_assoc() )
{
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$fila, $rows['riego_id'])
->setCellValue('B'.$fila, $rows['propi_id'])
->setCellValue('C'.$fila, $rows['riego_dias'])
->setCellValue('D'.$fila, $rows['riego_horas'])
->setCellValue('E'.$fila, $rows['riego_observaciones'])
->setCellValue('F'.$fila, $rows['riego_fecha']);
$fila++; //Sumamos 1 para pasar a la siguiente fila
}
$fila = $fila-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:F".$fila);
while( $row = $resultado1->fetch_assoc())
{
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('H'.$fila1, $row['propi_id'])
->setCellValue('I'.$fila1, $row['prop_nombre'])
->setCellValue('J'.$fila1, $row['prop_apellido'])
->setCellValue('K'.$fila1, $row['prop_cedula'])
->setCellValue('L'.$fila1, $row['propi_metros'])
->setCellValue('M'.$fila1, $row['propi_longitud'])
->setCellValue('N'.$fila1, $row['propi_latitud'])
->setCellValue('O'.$fila1, $row['propi_ciudad'])
->setCellValue('P'.$fila1, $row['propi_parroquia'])
->setCellValue('Q'.$fila1, $row['tipodeasignacion'])
->setCellValue('R'.$fila1, $row['propro_codigo'])
->setCellValue('S'.$fila1, $row['fechadeasignacion']);
$fila1++; //Sumamos 1 para pasar a la siguiente fila
}
$fila1 = $fila1-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "H7:S".$fila1);
	
	$filaGrafica = $fila+2;
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'catastros!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$B$7:$B$'.$fila);
	
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setTitle('Propiedad');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Catastros.xlsx"');
	header('Cache-Control: max-age=0');
	ob_end_clean();
$objWriter->save('php://output');
exit;
