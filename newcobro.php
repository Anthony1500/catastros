<div id="p" class="easyui-panel" title="Ingreso de Cobro" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           

            <div style="margin-bottom:5px">
            <select  name ="co_id" class="easyui-combobox" required="true"  labelPosition="top" 
            style="width:50%;"  data-options="
                    url:'controlador/cobro.php?op=select-cobro',
                    method:'get',
                    valueField:'co_id',
                    textField:'propi_id',
                    panelHeight:'auto',
                    label: 'ID Propiedad:',
                    labelPosition: 'top'
                    ">               
            </select>
            </div> 
            <div style="margin-bottom:5px">
                <input name="co_fecha" labelPosition="top" class="easyui-datebox" required="true" label="Fecha:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="co_valortotal" labelPosition="top" class="easyui-textbox" required="true" label="Valor Total :" style="width:50%" >
            </div>              
        
            <div style="margin-bottom:5px">
                <select id="cc"label="Estado :" labelPosition="top" style="width:50%" class="easyui-combobox" required="true" name="estado">
                <option  selected="selected" >- Seleccionar -</option>
                <option>Pagado</option>
                <option>Por Pagar</option>
                
            </select>
            </div> 

      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listacobro" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
        $('#cc').combobox({
           
           
           panelHeight:'150',
           
           onSelect: function(rec)
           {
            
           }
       });
      
        function saveUser(){    
                  
           $('#frmequipo').form('submit',{
                url: 'controlador/cobro.php?op=insert',
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
                    window.location.href= 'main.php?pag=listacobro';
                }
            }); 
        }
        
    </script>    
    
 