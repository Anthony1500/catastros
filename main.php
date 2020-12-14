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
</head>
<?php
 session_start();
 if( isset(  $_SESSION['usuario']) ==false)
 header("location: index.php") ;
 //si existe el usuario se queda en la pagina si no se redirecciona al login
?>
<body class="easyui-layout">
          
 
        <div data-options="region:'north'" style="height:60px"> 
        <img src="imagenes/uti-logo.jpg"   height="50px"  > </img>
         <div class="titulousuario">
		 <a style="color:blue";>Usuario:</a><font style="text-transform: uppercase;"><strong> <?php echo $_SESSION['usuario'] , "&nbsp;",$_SESSION['usuario1'];  ?> </strong></font> 


			<a class="boton_personalizado" href="index.php"> Salir </a>
         </div> 

        </div>

        
       
		<div data-options="region:'west',split:true" title="Menu" style="width:200px;">
        
        <ul class="easyui-tree">
			<li>
				<span>Menu</span>
				<ul>
					<li>
						<span>Ingreso de datos</span>
						<ul>
						<li>
						<span>Administrador</span>
						<ul>
						
						
							
							<li>
								   <a  href="main.php?pag=listausuario"> Ingreso credenciales </a> 
							</li>
							</ul>
							</li>
							<li>
						<span>Administracion de usuarios</span>
						<ul>
							<li>
							<a  href="main.php?pag=listabodega"> Ingreso usuarios </a>
							</li>
							</ul>
							</li>
							
							<li>
						<span>Reportes</span>
						<ul>
							<li>
							<a  href="main.php?pag=reportes"> Reportes </a>
							</li>
							</ul>
							</li>
						</ul>
					</li>
				
					</li>
					 
				</ul>
			</li>
		</ul>

        </div>
        <div data-options="region:'center' ">
		<?php
		if(  isset($_GET["pag"])){
			$page = $_GET["pag"];	
			$page = $page.".php";
			include ($page);
		}	
		
			?>
	
	
        </div>
 
 
</body>
</html>