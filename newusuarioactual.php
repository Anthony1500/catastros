<div id="p" class="easyui-panel" title="Ingreso de datos Bodega" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           

<div style="margin-bottom:5px">
                <input name="usu2_nombre" labelPosition="top" class="easyui-textbox" required="true" label="Nombre :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="usu2_cedula" labelPosition="top" class="easyui-textbox" required="true" label="Cedula :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="usu2_areanetaderiego1" labelPosition="top" class="easyui-textbox" required="true" label="Area neta de riego1 :" style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="usu2_areanetaderiego2" labelPosition="top" class="easyui-textbox" required="true" label="Area neta de riego2 :" style="width:50%" >
            </div>
            
            <div  style="margin-bottom:5px">
            <select name="usu2_documento" class="easyui-combobox" name="dept"  label="Documento :" style="width:200px;">
        <option>Escritura</option>
        <option>Predio</option>
        <option>Planimetria</option>
       <option>Declaracion Juramentada</option>
         </select>
        </div>
        <div style="margin-bottom:5px">
                <input name="usu2_longitud" labelPosition="top" class="easyui-textbox" required="true" label="Longitud :" style="width:50%" >
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="usu2_latitud" labelPosition="top" class="easyui-textbox" required="true" label="Latitud :" style="width:50%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="usu2_observaciones" labelPosition="top" class="easyui-textbox" required="true" label="Observaciones:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="usu2_telefono" labelPosition="top" class="easyui-textbox" required="true" label="Telefono :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="usu2_direccion" labelPosition="top" class="easyui-textbox" required="true" label="Direccion: " style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="usu2_areatotal" labelPosition="top" class="easyui-textbox" required="true" label="Area total:" style="width:50%" >
            </div>
            

      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listausuarioactual" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
       
       
        function saveUser(){              
           $('#frmequipo').form('submit',{
                url: 'controlador/usuario.php?op=insert',
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
                    window.location.href= 'main.php?pag=listausuarioactual';
                }
            }); 
        }
        
    </script>    
    
 