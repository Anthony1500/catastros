<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<title>Catastros</title>
	
	<link rel="icon" type="image/png" href="imagenes/icons/img.png"/>
    <link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/proyecto.css">
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery-easyui-1.8.8/locale/easyui-lang-es.js"></script>
    <link href="./main.css" rel="stylesheet">
    <link href="./icon.css" rel="stylesheet">
</head>
<?php
 session_start();
 if( isset(  $_SESSION['usuario']) ==false)
 header("location: index.php") ;
 //si existe el usuario se queda en la pagina si no se redirecciona al login
?>
<body class="easyui-layout">
          
 
        <div data-options="region:'north'" style="height:60px"> 
        <img src="imagenes/descargaaaaa.jpg"   height="50px"  > </img>
         <div class="titulousuario">
		 <a style="color:blue";>Usuario:</a><font style="text-transform: uppercase;"><strong> <?php echo $_SESSION['usuario'] , "&nbsp;",$_SESSION['usuario1'];  ?> </strong></font> 


			<a class="boton_personalizado" href="index.php"> Salir </a>
         </div> 

        </div>

        
       
		<div data-options="region:'west',split:true" title="Menu" style="width: 252.583px; height: 737.233px;">
	
               
                                
		
		
		
                        
                                     
                 
        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                             <li  class="app-sidebar__heading">&nbsp;&nbsp;Administrador</li>
                                <li>
                                    <a  href="main.php?pag=listausuario">
                                        <i class="metismenu-icon icon"></i>
                                        Ingreso credenciales
                                    </a>
                                </li>
                                
                               
                                <li class="app-sidebar__heading">&nbsp;&nbsp;Administracion</li>
                                <li>
                                    <a href="main.php?pag=listapropietario">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Ingreso propietario
                                    </a>
                                </li>
                               
                                <li class="app-sidebar__heading">&nbsp;&nbsp;Mapa</li>
                                <li>
                                    <a  href="main.php?pag=mapa" >
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>
                                        mapa
                                    </a>
                                </li>
                            </ul>
                        </div>
        </div>
        <div data-options="region:'center' ">
		<?php
		if(  isset($_GET["pag"])){
			$page = $_GET["pag"];	
			$page = $page.".php";
			include ($page);
		}	
		//iconos en esta web: https://icomoon.io/app/#/select
			?>
	
	
        </div>
 
		<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>