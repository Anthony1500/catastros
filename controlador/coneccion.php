<?php 
 $serverName = "localhost:3310";
 $username = "root";
 $password = "";
$db="catastros";
$con = mysqli_connect($serverName,$username,$password,$db);  


 if ($con == false ) {
    echo "Conexión fallida con  la base de datos";
    exit;
  }

?>
