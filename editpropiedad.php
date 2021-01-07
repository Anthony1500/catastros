<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM propiedad where propi_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Editar Propiedad" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="propi_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['propi_id']?>" class="easyui-textbox" required="true" label="Codigo Propiedad " style="width:50%"/>
            </div>
            <div style="margin-bottom:5px">
                <input name="propi_metros" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['propi_metros']?>"  required="true" label="Metros " style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="propi_longitud" labelPosition="top" class="easyui-textbox"  value="<?php echo $row ['propi_longitud']?>" required="true" label="Longitud " style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="propi_latitud" labelPosition="top" class="easyui-textbox"  value="<?php echo $row ['propi_latitud']?>" required="true" label="Latitud " style="width:50%" >
            </div>              
            
            <div style="margin-bottom:5px">
                <input name="propi_sector" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['propi_sector']?>"  required="true" label="Sector " style="width:50%" >
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="propi_calleprincipal" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['propi_calleprincipal']?>" required="true" label="Calle principal " style="width:50%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="propi_callesecundaria" labelPosition="top" class="easyui-textbox"  value="<?php echo $row ['propi_callesecundaria']?>" required="true" label="Calle secundaria " style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="propi_ciudad" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['propi_ciudad']?>"  required="true" label="Ciudad " style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="propi_parroquia" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['propi_parroquia']?>"  required="true" label="Parroquia " style="width:50%" >
            </div>                    
        </form>  
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropiedad" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
    <script type="text/javascript">
      $('#cc').combobox().prop('selectedIndex', -1)
       $('#cc').combobox({
           
           
            panelHeight:'150',
            
            onSelect: function(rec)
            {
             
            }
        });

      
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/propiedad.php?op=update',
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
                    window.location.href= 'main.php?pag=listapropiedad';
                }
            }); 
        }
        
    </script>    
    
 






