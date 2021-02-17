<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Max-Age: 178000'); 
header('Content-Type: application/json');
require ('coneccion.php'); 
$op=  $_GET['op'] ;
 
if( !isset($op) )
{
  echo  json_encode( "No se definió  la variable op");
  exit;
} 
switch ($op) { 
    case 'insertcobro':
        $archivoguardado=0;
        $mensaje = "";
            $response = array( 
                    'status' => 0, 
                    'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
                );          
                try{
                    $prop_id = $_POST['prop_id'];   
                    $co_fecha = $_POST['co_fecha']; 
                    $co_valortotal = $_POST['co_valortotal'];   
                    $estado = $_POST['estado']; 
                    
                  
                    $sql = "INSERT INTO cobro (prop_id,co_fecha,co_valortotal,estado) VALUES ('$prop_id','$co_fecha','$co_valortotal','$estado')"; 
                   
                    echo $sql;
                    $insert = mysqli_query($con,$sql); 
                 
                if($insert){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del usuario se han agregado con éxito!'; 
                } 
    }
    
    
    catch (Exception $e){ //usar logs
        $response = array( 
            'status' => 0, 
            'msg' =>  'El Usuario ya existe'  
        );           
    }
                
                echo json_encode($response); 
     break; 
 case 'insert':
 $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{ 
                $cod_bodega = $_POST['cod_bodega']; 
                $nombreb= $_POST['nombreb']; 
                $direccionb = $_POST['direccionb'];
                $sql = "INSERT INTO bodega (cod_bodega,nombreb,direccionb) VALUES
                 ('$cod_bodega','$nombreb','$direccionb');"; 
                 echo $sql;
                $insert = pg_query($dbconn,$sql); 
                 
                if($insert){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del usuario se han agregado con éxito!'; 
                } 
                else{
                    $response['status'] = 0; 
                    $response['msg'] =  pg_result_error($insert); 

                }
    }
    
    catch (Exception $e){ //usar logs
        $response = array( 
            'status' => 0, 
            'msg' =>  'El Usuario ya existe'  
        );           
    }
    echo json_encode($response); 
 break; 

 case 'update':
    $response = array( 
        'status' => 0, 
        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
    );          
    if( !empty($_POST['cod_bodega'])&&!empty($_POST['nombreb'])&&!empty($_POST['direccionb'])){ 
        $cod_bodega = $_POST['cod_bodega']; 
        $nombreb = $_POST['nombreb'];   
        $direccionb = $_POST['direccionb']; 
        $sql = "UPDATE bodega SET  nombreb='$nombreb',direccionb='$direccionb' WHERE cod_bodega='$cod_bodega'";
        $update = pg_query($sql); 
         
        if($update){ 
            $response['status'] = 1; 
            $response['msg'] = '¡Los datos del usuario se han actualizado con éxito!'; 
        } 
    }else{ 
        $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
    } 
     
    echo json_encode($response); 

break; 
 case 'delete':
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            if(!empty($_POST['cod_bodega'] )  ){ 
                $cod_bodega = $_POST['cod_bodega']; 
           
              
                $sql = " delete from bodega where cod_bodega ='$cod_bodega' "; 
                $delete = pg_query($sql); 
                 
                if($delete){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del usuario se han eliminado con éxito!'; 
                } 
            }else{ 
                $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
            }             
            echo json_encode($response); 
 break; 
    default:
            echo json_encode( "Error no existe la opcion ".$op);
            }
?>