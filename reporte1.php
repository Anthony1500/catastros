<?php 
require_once 'controlador/excel.php';

activeErrorReporting();
noCli();

require_once 'Classes/PHPExcel.php';
require ('controlador/coneccion.php');
require_once 'controlador/mostrar.php';
$sql = "SELECT * FROM propiedad";
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
	$objDrawing->setCoordinates('J1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    

    $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('L1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage1);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('W1');
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
		
		$objPHPExcel->getActiveSheet()->getStyle('A1:j5')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A6:j6')->applyFromArray($estiloTituloColumnas);
		
		$objPHPExcel->getActiveSheet()->setCellValue('E3', 'REPORTE  PROPIEDAD');
		$objPHPExcel->getActiveSheet()->mergeCells('E3:G3');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('A6', 'CODIGO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('B6', 'METROS');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('C6', 'LONGITUD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('D6', 'LATITUD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('E6', 'SECTOR');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('F6', 'CALLE PRINCIPAL');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('G6', 'CALLE SECUNDARIA');
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('H6', 'CIUDAD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('I6', 'PARROQUIA');
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('J6', 'COMUNIDAD');

        $objPHPExcel->getActiveSheet()->getStyle('L1:W5')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('L6:W6')->applyFromArray($estiloTituloColumnas);
		
		$objPHPExcel->getActiveSheet()->setCellValue('O3', 'REPORTE TERRENOS ASIGNADOS A PROPIEDAD');
		$objPHPExcel->getActiveSheet()->mergeCells('O3:R3');
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('L6', 'CODIGO PROPIEDAD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('M6', 'NOMBRE');
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('N6', 'APELLIDO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('O6', 'CEDULA');
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('P6', 'METROS m²');
		$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('Q6', 'LONGITUD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('R6', 'LATITUD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('S6', 'CIUDAD');
		$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('T6', 'PARROQUIA');
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('U6', 'TIPO DE ASIGNACIÓN');
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
        $objPHPExcel->getActiveSheet()->setCellValue('V6', 'TERRENO CODIGO');
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('W6', 'FECHA DE ASIGNACIÓN');

$i = 2;
while($rows = $resultado->fetch_assoc() )
{
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$fila, $rows['propi_id'])
->setCellValue('B'.$fila, $rows['propi_metros'])
->setCellValue('C'.$fila, $rows['propi_longitud'])
->setCellValue('D'.$fila, $rows['propi_latitud'])
->setCellValue('E'.$fila, $rows['propi_sector'])
->setCellValue('F'.$fila, $rows['propi_calleprincipal'])
->setCellValue('G'.$fila, $rows['propi_callesecundaria'])
->setCellValue('H'.$fila, $rows['propi_ciudad'])
->setCellValue('I'.$fila, $rows['propi_parroquia'])
->setCellValue('J'.$fila, $rows['propi_comunidad']);
$fila++; //Sumamos 1 para pasar a la siguiente fila
}
$fila = $fila-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:J".$fila);
while( $row = $resultado1->fetch_assoc())
{
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('L'.$fila1, $row['propi_id'])
->setCellValue('M'.$fila1, $row['prop_nombre'])
->setCellValue('N'.$fila1, $row['prop_apellido'])
->setCellValue('O'.$fila1, $row['prop_cedula'])
->setCellValue('P'.$fila1, $row['propi_metros'])
->setCellValue('Q'.$fila1, $row['propi_longitud'])
->setCellValue('R'.$fila1, $row['propi_latitud'])
->setCellValue('S'.$fila1, $row['propi_ciudad'])
->setCellValue('T'.$fila1, $row['propi_parroquia'])
->setCellValue('U'.$fila1, $row['tipodeasignacion'])
->setCellValue('V'.$fila1, $row['propro_codigo'])
->setCellValue('W'.$fila1, $row['fechadeasignacion']);
$fila1++; //Sumamos 1 para pasar a la siguiente fila
}
$fila1 = $fila1-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "L7:W".$fila1);
	
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
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
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
