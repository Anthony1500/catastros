<div id="p" class="easyui-panel" title="Ingreso de datos Bodega" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           
               <div style="margin-bottom:5px">
                <input name="cod_equipo" labelPosition="top"  class="easyui-textbox" required="true" label="Codigo Equipo:" style="width:50%"/>
            </div>
            <div style="margin-bottom:5px">
                <input name="nombre" labelPosition="top" class="easyui-textbox"  required="true" label="Nombre:" style="width:50%" >
            </div>              
            <div style="margin-bottom:5px">
                <input id="marca" name="marca" labelPosition="top" class="easyui-textbox" required="true"  label="Marca:" style="width:50%"/ >
            </div> 
            <div style="margin-bottom:5px">
                <input id="modelo" name="modelo" labelPosition="top" class="easyui-textbox" required="true"  label="Modelo:" style="width:50%"/ >
            </div> 
            <div style="margin-bottom:5px">
                <input id="serie" name="serie" labelPosition="top" class="easyui-textbox" required="true"  label="Serie:" style="width:50%"/ >
            </div> 
            <div style="margin-bottom:5px">
                <input id="detalle" name="detalle" labelPosition="top" class="easyui-textbox" required="true"  label="Detalle:" style="width:50%"/ >
            </div>
            <div style="margin-bottom:5px">
                <input id="codigouti" name="codigouti" labelPosition="top" class="easyui-textbox" required="true"  label="Codigo UTI:" style="width:50%"/ >
            </div>
            <div  style="margin-bottom:5px">
            <select id="cod_bodega"  name ="cod_bodega"labelPosition="top"required="true" class="easyui-combobox" 
            style="width:30%;"  data-options="
                    url:'controlador/bodega.php?op=selectcombo',
                    method:'get',
                    valueField:'cod_bodega',
                    textField:'nombreb',
                    panelHeight:'auto',
                    label: 'Bodega:',
                    labelWidth:'40px'
                    ">               
            </select>
        </div>

      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listaequipo" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
       
       
        function saveUser(){              
           $('#frmequipo').form('submit',{
                url: 'controlador/equipo.php?op=insert',
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
                    window.location.href= 'main.php?pag=listaequipo';
                }
            }); 
        }
        
    </script>    
    
 