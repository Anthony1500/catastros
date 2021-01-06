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

<div id="$id" class="easyui-panel" title="Datos Propietario" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="prop_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['prop_id']?>" class="easyui-textbox" required="true" label="Codigo Propietario:" style="width:50%"/>
            </div>
            <div style="margin-bottom:5px">
                <input name="prop_nombre" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['prop_nombre']?>"  required="true" label="Nombre Completo  :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_apellido" labelPosition="top" class="easyui-textbox"  value="<?php echo $row ['prop_apellido']?>" required="true" label="Apellido Completo :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_edad" labelPosition="top" class="easyui-textbox"  value="<?php echo $row ['prop_edad']?>" required="true" label="Edad :" style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="prop_ecivil" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['prop_ecivil']?>" required="true" label="Direccion :" style="width:50%" >
            </div>

            
            <div style="margin-bottom:5px">
                <input name="prop_direccion" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['prop_direccion']?>"  required="true" label="Estado civil :" style="width:50%" >
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="prop_correo" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['prop_correo']?>" required="true" label="Correo :" style="width:50%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="prop_cedula" labelPosition="top" class="easyui-textbox"  value="<?php echo $row ['prop_cedula']?>" required="true" label="Cedula :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_telefono" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['prop_telefono']?>"  required="true" label="Telefono :" style="width:50%" >
            </div> 
        
        
            

        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropietario" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
       
       
      
        function saveUser(){              
           $('#frmequipo').form('submit',{
                url: 'controlador/usuario.php?op=update',
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
    
 