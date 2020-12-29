<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM login where cod_log='$id'";
    $result = mysqli_query($con, $sql);
     
    $row = mysqli_fetch_assoc($result) ;
}
?>
<div id="p" class="easyui-panel" title="Edicion de datos de Usuario" style="width:100%;height:100%; ">
<form id="frmUSuario" method="post"     style="margin:0;padding:20px 50px">
           

            <div style="margin-bottom:5px">
                <input name="cod_log" readonly=»readonly»  value="<?php echo $row['cod_log'] ?>" labelPosition="top" class="easyui-textbox" required="true" label="Login:" style="width:80%">
            </div>
            <div style="margin-bottom:5px">
                <input name="prop_nombre" value="<?php echo $row['prop_nombre'] ?>" labelPosition="top" value="<?php echo $row['prop_nombre'] ?>" class="easyui-textbox" required="true" label="Nombre Completo:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_apellido" value="<?php echo $row['prop_apellido'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label="apellido Completo:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="usuario" value="<?php echo $row['usuario'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label="usuario" style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input  name="contraseña" value="<?php echo $row['contraseña'] ?>"  labelPosition="top" class="easyui-passwordbox" required="true" label="contraseña:" style="width:50%" >
            </div> 

         
        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
       <a  href="main.php?pag=listausuario" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancel</a>
    </div>   
    </div>
 
    <script type="text/javascript">

       
        function saveUser(){              
           $('#frmUSuario').form('submit',{
                url: 'controlador/administrador.php?op=update',
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
                            title: 'Error',
                            msg: result
                        });
                        window.location.href ='main.php?pag=listausuario';
                }
            }); 
        }
        
    </script>