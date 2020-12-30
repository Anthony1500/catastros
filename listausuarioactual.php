<table id="dg" title="Lista de Equipo" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/usuario.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="usu2_codigo" width="25%">Codigo</th>
                <th field="usu2_nombre" width="25%">Nombre</th>
                <th field="usu2_cedula" width="25%">Cedula</th>
                <th field="usu2_areanetaderiego1" width="25%">Area neta de riego1</th>
                <th field="usu2_areanetaderiego2" width="25%">Area neta de riego2</th>
                <th field="usu2_documento" width="25%">Documento</th>
                <th field="usu2_longitud" width="25%">Longitud</th>
                <th field="usu2_latitud" width="25%">Latitd</th>
                <th field="usu2_observaciones" width="25%">Observaciones</th>
                <th field="usu2_telefono" width="25%">Telefono</th>
                <th field="usu2_direccion" width="25%">Direccion</th>
                <th field="usu2_areatotal" width="25%">Area total</th>
            </tr>


        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newusuarioactual" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editequipo&id='+row.cod_equipo;
            }
        }
       


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

            if (row){
                $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                                 
                    if (r){
                        $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

                        $.post('controlador/usuario.php?op=delete',{usu2_codigo:row.usu2_codigo},function(result){
                            $.messager.progress('close');     
                            
                            if (result.success){
                                $('#dg').datagrid('reload');    
                            } else {
                                 
                                $('#dg').datagrid('reload');
                            }
                        },'json');
                    }
                });
            }
        }

        function refrescar(){
            $('#dg').datagrid('reload');   
        }
        function buscar(value){
            $('#dg').datagrid('reload',{filtro:value});   
        }
    </script>

    
 