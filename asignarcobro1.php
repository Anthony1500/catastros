<!DOCTYPE html>

<html>

<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT p.prop_id, p.prop_nombre, p.prop_apellido, p.prop_edad, p.prop_direccion, p.prop_ecivil, p.prop_correo, p.prop_cedula, p.prop_telefono, sum(t.propi_metros) AS suma
    FROM terrenosvista t, propietario p, propiedad p2  where p.prop_id=t.prop_id AND t.propi_id=p2.propi_id AND p.prop_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="p" class="easyui-panel" title="Asignacion de Propiedad" style="width:100%;height:100%; ">
<form id="frmproo" method="post"     style="margin:0;padding:20px 50px">
           


<div style="margin-bottom:5px">
                <input name="prop_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['prop_id']?>" class="easyui-textbox" required="true" label="Codigo Propietario:" style="width:50%"/>
            </div>
            <div style="margin-bottom:20px">
            <input name="co_fecha" class="easyui-datebox" label="Fecha de cobro:" labelPosition="top"  data-options="formatter:myformatter,parser:myparser" style="width:50%;">
        </div>
        <div style="margin-bottom:5px">
                <input name="co_valortotal" labelPosition="top"  class="easyui-textbox" label="Valor Total:" style="width:50%"/>
            </div>
            
            <div style="margin-bottom:5px">
                <select label="estado:" labelPosition="top" style="width:50%" class="easyui-combobox"required="true" name="estado">
                <option  selected="selected" >- Seleccionar -</option>
                <option>Pagado</option>
                <option>Por pagar</option>
                
                
            </select>
            </div> 


            <div style="margin-bottom:5px">
                <input name="sumacobro"  value="<?php echo $row ['suma']?>"  labelPosition="top"  class="easyui-textbox"  label="Suma:" style="width:50%"/>
            </div>



            
            <input value="Buscar" type="submit" name="busqueda" />
           
      </form>
   
     
    <?php
 if(isset($_POST['busqueda']))
{
    $prop_id = $_POST['prop_id'];   
    
 
    $sql = "SELECT t.propi_id, t.propi_metros, t.propi_comunidad from terrenosvista t, propietario p, propiedad p2 
    WHERE p.prop_id=t.prop_id AND t.propi_id=p2.propi_id AND p.prop_id='$prop_id'"; 
   
    
    $result= mysqli_query($con,$sql); 
    if(empty ($result)){
        
    }
   else{
    while($impresion=mysqli_fetch_assoc($result))
    {
        ?>
    <table style="margin: 0 auto;width: 50%;height: 100px;" border="2"  >
    <thead> 
<tr><th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">ID Propiedad</h6></font></th><th ><font color="Black"face="Comic Sans MS,arial"><h6 align="center">Metros</h6></font></th>
<th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Comunidad </h6></font></th></tr>
</thead>
<tr><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['propi_id'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['propi_metros'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['propi_comunidad'] ?></h6></font></td></tr>
</table>




        <?php
    }
    $sql1 = "SELECT sum(t.propi_metros) AS suma from terrenosvista t, propietario p, propiedad p2 
    WHERE p.prop_id=t.prop_id AND t.propi_id=p2.propi_id AND p.prop_id='$prop_id'"; 
    
  
     $res1=mysqli_query($con,$sql1);
     $registro2=mysqli_fetch_assoc($res1) 
    
     ?>


<table style="margin: 0 auto;" >


<thead> 
 
 

 </thead>
     <?php
      
         ?>
     
   
</tr>
</thead>


 

 <?php



?>
 </table>
 


 
 
         <?php
   }

}

?>

</center>

</body>

</html>
<div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" onclick="saveUser1()"  style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropiedad" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
 
    <script type="text/javascript">
       function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
       $('#cc').combobox({
           
           
           panelHeight:'80',
           
           onSelect: function(rec)
           {
            
           }
       });
        function saveUser(){              
           $('#frmproo').form('submit',{
                url: 'controlador/usuario.php?op=insertcobro',
                onSubmit: function(){
                    var esvalido =  $(this).form('validate');
                    if( esvalido){
                        $.messager.progress({
                       title:'Por favor espere',
                      msg:'Cargando datos...'
                      });
                    }
                    return esvalido;
                },
                success: function(result){                   
                    $.messager.progress('close');
                   // var result = eval('('+result+')');
                   // console.log(result);                  
                   $.messager.show({
                            title: 'exito',
                            msg: result
                        });
                    window.location.href= 'main.php?pag=listapropietario';
                }
            }); 
        }
        
        
    </script>    
    
 