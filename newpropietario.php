<div id="p" class="easyui-panel" title="Ingreso de Propietario" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           

<div style="margin-bottom:5px">
                <input name="prop_nombre" labelPosition="top" class="easyui-textbox" required="true" label="Nombre Completo :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_apellido" labelPosition="top" class="easyui-textbox" required="true" label="Apellido Completo :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_edad" labelPosition="top" class="easyui-textbox" required="true" label="Edad :" style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input name="prop_direccion" labelPosition="top" class="easyui-textbox" required="true" label="Direccion :" style="width:50%" >
            </div>
            
        
        <div style="margin-bottom:5px">
                <select label="Estado civil :" labelPosition="top" style="width:50%" class="easyui-combobox"required="true" name="prop_ecivil">
                <option  disabled="disabled"selected="selected" ></option>
                <option >Soltero</option>
                <option>Casado</option>
                <option>Viudo</option>
                <option>Divorciado</option>
                
            </select>
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="prop_correo" labelPosition="top" class="easyui-textbox" required="true" label="Correo :" style="width:50%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="prop_cedula" labelPosition="top" class="easyui-textbox" required="true" label="Cedula :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_telefono" labelPosition="top" class="easyui-textbox" required="true" label="Telefono :" style="width:50%" >
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
                    window.location.href= 'main.php?pag=listapropietario';
                }
            }); 
        }
        
    </script>    
    
 