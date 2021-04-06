<!DOCTYPE html>
<html>

<head>
  
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Catastros</title>
	
	<link rel="icon" type="image/png" href="imagenes/icons/img.png"/>
    <link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.8.8/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="css/proyecto.css">
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-easyui-1.8.8/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/jquery-easyui-1.8.8/locale/easyui-lang-es.js"></script>
    <link href="./main.css" type="text/css" rel="stylesheet">
    <link href="./icon.css" type="text/css" rel="stylesheet">
      
</head>
                                   
                                    
<?php

 session_start();
 if( isset(  $_SESSION['usuario']) ==false)
 header("location: index.php") ;
 //si existe el usuario se queda en la pagina si no se redirecciona al login
?>
<style type="text/css">
       .rotate {
   animation: rotation 2s infinite linear;
   border-radius: 50%;
 }
 
 @keyframes rotation {
   from {
     transform: rotate(0deg);
   }
   to {
     transform: rotate(359deg);
   }
 }
 .addcomunity {
   background: url(./imagenes/comunity.png) no-repeat center center;
   }
   .hero_heading h6 {
    
    color: black;
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    top: 19px;
    max-width: 600px;
    size :6;
}
.fecha {
    
    color: black;
    position: absolute;
    left: 10px;
    right: 1;
    margin: 0 auto;
    top: 50px;
    max-width: 600px;
    size :6;		
}
.fecha1 {
    
    color: black;
    position: absolute;
    left: 88px;
    right: 1;
    margin: 0 auto;
    top: 50px;
    max-width: 600px;
    size :6;		
}
.titulousuario{
 position: absolute;
 right: 40px;
 top: 20px;
 font-size: 14px;
}
</style>
<script type="text/javascript">
setInterval(function() {
    var currentTime = new Date ( );    
    var currentHours = currentTime.getHours ( );   
    var currentMinutes = currentTime.getMinutes ( );   
    var currentSeconds = currentTime.getSeconds ( );
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + "  " + timeOfDay;
    document.getElementById("ac").innerHTML = currentTimeString;
}, 1000);
     
 
</script>
<body class="easyui-layout">
          
<div  style="height:60px">
</img> 
</div>
        <div data-options="region:'north'" style="height:70px" > 
        <div class="fecha pull-left">
        <strong >
        <?php 


date_default_timezone_set('America/Toronto');    
$Date = date(' m/d/Y'); 
$Time2 = date('H:i A   '  , time());  
echo " $Time2 &nbsp; $Date  ";


?></strong>
         
      </div>
        
        <div class="fecha pull-left">
        <strong  id="offac">
        <?php 



?></strong>
         
      </div>
     
        <div class="hero_heading text-center">    
 <font color="Black"  face="font_family"><strong ><h6  ><img  src="imagenes/logoecuador.png"   height="50px"  > </img>CATASTRO GENERAL DE LA ACEQUIA TOALLO COMUNIDADES  <img src="imagenes/logoagua.png"   height="50px"  > </img> </h6></strong></font>

 </div> 
 
         <div class="titulousuario"  >
         
		 <a  style="color:blue"><img  src="imagenes/descargaaaaa.jpg" class="rotate"  height="40px"> </img> Usuario:</a><font style="text-transform: uppercase;"><strong> <?php echo $_SESSION['usuario'] , "&nbsp;",$_SESSION['usuario1'];  ?> </strong></font> 

    
			<a class="boton_personalizado" href="index.php"> Salir </a>
            
        

        </div>
        </div> 
        
       
		<div data-options="region:'west',split:true" title="Menu" style="width: 252.583px; height: 737.233px;">
	
               
                                
		
		
		
                        
                                     
                 
        <div class="app-sidebar__inner" >
                            <ul class="vertical-nav-menu">
                             <li  class="app-sidebar__heading">&nbsp;&nbsp;Administrador</li>
                                <li  >
                                    <a  href="main.php?pag=listausuario" >
                                        <i  class="metismenu-icon icon"></i>
                                        Ingreso Credenciales
                                    </a>
                                </li>
                                
                               
                                <li class="app-sidebar__heading">&nbsp;&nbsp;Administración</li>
                                <li >
                                    <a  href="main.php?pag=listapropietario" >
                                        <i class="metismenu-icon owner" ></i>
                                        Propietario
                                    </a>
                                    </li>
                                    <li >
                                    <a href="main.php?pag=listapropiedad">
                                        <i class="metismenu-icon property"></i>
                                        Propiedad
                                    </a>
                                    </li>
                                    <li >
                                    <a href="main.php?pag=comunidad">
                                        <i class="metismenu-icon addcomunity"></i>
                                       Agregar Comunidad
                                    </a>
                                    <li >
                                    <a href="main.php?pag=listaterrenos">
                                        <i class="metismenu-icon ground"></i>
                                        Terrenos Asignados
                                    </a>
                                    </li>
                                    <li >
                                    <a href="main.php?pag=listariego">
                                        <i class="metismenu-icon irrigation"></i>
                                        Riego
                                    </a>
                                    </li>
                                    <li >
                                    <a href="main.php?pag=listacobro">
                                        <i class="metismenu-icon payment"></i>
                                        Cobro
                                    </a>
                                    </li>
                                    <li >
                                     <a href="main.php?pag=visual">
                                        <i class="metismenu-icon report"></i>
                                        Reporte   
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
        <style type="text/css">
        .rotate {
      animation: rotation 8s infinite linear;
    }
  .boton_personalizado{
    text-decoration: none;
    padding: 8px;
    font-weight: 600;
    font-size: 10px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  .fantasma{
    text-decoration: none;
    padding: 8px;
    font-weight: 600;
    font-size: 10px;
    color: #ffffff;
    background-color: #4A5BE8;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  
</style>
</body>
</html>