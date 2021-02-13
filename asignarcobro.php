
<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM propietario where prop_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>
<div id="p" class="easyui-panel" title="Asignacion de Propiedad" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


<div style="margin-bottom:5px">

                <input name="prop_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['prop_id']?>" class="easyui-textbox" required="true" label="Codigo Propietario:" style="width:50%"/>
            </div>
           
        
            
            <input value="Buscar" type="submit" name="busqueda" />  
             
      </form>
 
     

