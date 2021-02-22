<!DOCTYPE html>

<html>
<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT p.prop_id, p.prop_nombre, p.prop_apellido, p.prop_edad, p.prop_direccion, p.prop_ecivil, p.prop_correo, p.prop_cedula, p.prop_telefono, sum(t.propi_metros) AS suma
    FROM terrenosvista t, propietario p, propiedad p2  where p.prop_id=t.prop_id AND t.propi_id=p2.propi_id AND p.prop_id='$id'and t.tipodeasignacion='Usuario Actual'";
    $result = mysqli_query($con,$sql);
     
    $totalFilas    =   mysqli_num_rows($result);
    if($totalFilas == 0){
        ?>
        <script language="javascript">alert("El usuario no tiene ");
        window.location='listapropietario.php';
        </script>
        
        <?php
    }
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="p" class="easyui-panel" title="Asignación de Cobro" style="width:100%;height:100%; ">
<form id="frmproo" method="post"     style="margin:0;padding:20px 50px">
           


<div style="margin-bottom:5px" >
                <input name="prop_id"  labelPosition="top"  readonly=»readonly»  value="<?php echo $row ['prop_id']?>" class="easyui-textbox" required="true" label="Codigo Propietario:" style="width:25%"/>
            </div>
            <input class="fantasma"   type="hidden"type="submit"  />

            <div style="margin-bottom:5px">
            <input name="co_fecha" class="easyui-datebox" label="Fecha de cobro:" labelPosition="top" required="true"  data-options="formatter:myformatter,parser:myparser" style="width:25%;">
        </div>
        <div style="margin-bottom:5px">
                <input name="co_valortotal" labelPosition="top"  class="easyui-textbox"  required="true"label="Valor Total:" style="width:25%"/>
            </div>
            
            <div style="margin-bottom:5px">
                <select id="cc" label="Estado:" labelPosition="top" style="width:25%" required="true" class="easyui-combobox"required="true" name="estado">
                <option  selected="selected" ></option>
                <option>Pagado</option>
                <option>Por pagar</option>
                
                
            </select>
            </div> 


            <div style="margin-bottom:5px">
                <input name="sumacobro"  value="<?php echo $row ['suma']?>"  labelPosition="top"  class="easyui-textbox"  readonly=»readonly» label="Suma de los metros:" style="width:25%"/>
            </div>



            
            
           
      </form>
   
      
    <?php
   require ('controlador/coneccion.php'); 
   if( isset($_GET["id"]))
{
    //$prop_id = $_POST['prop_id'];   
    $id=$_GET["id"];
 
    $sql = "SELECT t.propi_id, t.propi_metros, t.propi_comunidad,t.tipodeasignacion from terrenosvista t, propietario p, propiedad p2 
    WHERE p.prop_id=t.prop_id AND t.propi_id=p2.propi_id AND p.prop_id='$id'and t.tipodeasignacion='Usuario Actual'"; 
    $result= mysqli_query($con,$sql); 
    $totalFilas    =    mysqli_num_rows($result);
    if($totalFilas == 0){   
        ?>
     <script language="javascript">alert("El propietario seleccionado no tiene terrenos actuales asignados");
        window.location='main.php?pag=listapropietario';
        </script>
        
        <?php
        }else{
    ?>

    <table style="margin: 0 auto;width: 50%;height: 100px;" border="2"  >
    <tr><th><font color="Black"face="Comic Sans MS,arial"><h6 align="center">ID Propiedad</h6></font></th><th ><font color="Black"face="Comic Sans MS,arial"><h6 align="center">Metros</h6></font></th>
<th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Comunidad </h6></font></th><th > <font color="Black"face="Comic Sans MS,arial"><h6 align="center">Tipo de Asignación</h6></font></th></tr>
    
    <?php
    while($impresion=mysqli_fetch_assoc($result))
    {
        ?>
    
   

<tr><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['propi_id'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['propi_metros'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['propi_comunidad'] ?></h6></font></td><td><font color="Blue"face="Comic Sans MS,arial"><h6 align="center"><?php echo $impresion['tipodeasignacion'] ?></h6></font></td></tr>
<?php }} ?>
</table>




        <?php
    
    $sql1 = "SELECT sum(t.propi_metros) AS suma from terrenosvista t, propietario p, propiedad p2 
    WHERE p.prop_id=t.prop_id AND t.propi_id=p2.propi_id AND p.prop_id='$id'and t.tipodeasignacion='Usuario Actual'"; 
    
  
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

?>

</center>

</body>

</html>
<div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()"   style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropietario" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
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
           
           
           panelHeight:'100',
           
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

        window.onload=function ejemplo(){
            alert('ekemplp');
        }
        
        
    </script>    
    
 