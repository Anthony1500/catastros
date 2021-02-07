<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM comunidad where comu_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Editar Propiedad" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="comu_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['comu_id']?>" class="easyui-textbox" required="true" label="Código Cobro " style="width:20%"/>
            </div>
                     

       
            
            <div style="margin-bottom:5px">
                <input name="comu_nombre" labelPosition="top" value="<?php echo $row ['comu_nombre']?>" class="easyui-textbox" required="true" label="Nombre de la Comunidad :" style="width:25%" >
            </div>              
        
            
            
             
        </form>  
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=comunidad" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    

    <script type="text/javascript">
      
      
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/comunidad.php?op=update',
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
                    window.location.href= 'main.php?pag=comunidad';
                }
            }); 
        }
        
    </script>    
    
 