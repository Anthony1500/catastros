<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 178000');
header('Content-Length: 0');
header('Content-Type: application/json');
require ('coneccion.php'); 
$op=  $_GET['op'] ;
if( !isset($op) )
{
  echo  json_encode( "No se definió  la variable op");
  exit;
} 
 
switch ($op) { 
    case 'select':
        $condicion=' ';
        if (isset($_POST['filtro'] )){
        $filtro=$_POST['filtro'] ;

        $condicion=$condicion." where propietario || contraseña like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"SELECT * FROM propietario".$condicion );
            if (!$resultqry) {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
            }
            $result = array();
            $items = array();  
         
            while($row = mysqli_fetch_object($resultqry)) {
               array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
            break;
 case 'insert':
    $archivoguardado=0;
    $mensaje = "";
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{
                $login = $_POST['login']; 
            $password = $_POST['password'];   
            $nombre = $_POST['nombre'];              
            $sql = " INSERT INTO usuario(nombre,password,login) VALUES ('$nombre','$password','$login') "; 
            $insert = pg_query($dbconn,$sql); 
             
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

 case 'update':
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            if(!empty($_POST['login']) && !empty($_POST['nombre']) && !empty($_POST['password'])  ){ 
                $login = $_POST['login']; 
                $nombre = $_POST['nombre'];   
                $password = $_POST['password'];
             $sql = "UPDATE usuario SET  nombre='$nombre', password='$password' WHERE login='$login";
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
            if(!empty($_POST['login'])   ){ 
                $login = $_POST['login']; 
              
                $sql = " delete from usuario where login ='$login' "; 
                $result = pg_query($sql); 
                 
                if ($result){
                        echo json_encode(array('success'=>true));
                } else {
                        echo json_encode(array('errorMsg'=>'Some errors occured.'));
                }
            }else{ 
                $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
            } 
             
            

 break; 
    default:
            echo json_encode( "Error no existe la opcion ".$op);


            }
?>