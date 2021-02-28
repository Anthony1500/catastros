<table id="dg" title="Lista de Propietario" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/usuario.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th align="center"hidden="true" field="prop_id" width="25%">Codigo</th>
                <th align="center"field="prop_nombre" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Nombres</th>
                <th align="center"field="prop_apellido" width="15%"><font color="Black"size="2"face="Comic Sans MS,Arial,Verdana">Apellidos</th>
                <th align="center"field="prop_cedula" width="10%"><font color="Black"size="2"face="Comic Sans MS,arial">Nº Cédula</th>
                <th align="center" field="prop_edad" width="9%"><font color="Black"size="2"face="Comic Sans MS,arial">Edad</th>
                <th align="center"field="prop_direccion" width="29%"><font color="Black"size="2"face="Comic Sans MS,arial">Dirección</th>
                <th align="center"field="prop_ecivil" width="9%"><font color="Black"size="2"face="Comic Sans MS,arial">Estado Civil</th>
                <th align="center"field="prop_correo" width="17%"><font color="Black"size="2"face="Comic Sans MS,arial">Correo</th>
                
                <th align="center"field="prop_telefono" width="10%"><font color="Black"size="2"face="Comic Sans MS,arial">Teléfono</th>
               
            </tr>


        </thead>
    </table> 
   
    <div id="toolbar">  
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newpropietario" class="easyui-linkbutton"  iconCls="icon-add"data-toggle="tooltip"title="Nuevo propietario." plain="true"  >Nuevo</a></a>
        <a  href="javascript:void(0)" class="easyui-linkbutton" plain="true"data-toggle="tooltip"title="Selecciona un propietario para asignarle un cobro."  onclick="asignar()" ><img src="imagenes/pay.png"> Asignar Cobro</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"  data-toggle="tooltip"title="Selecciona una fila para editar."onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"  data-toggle="tooltip"title="Selecciona una fila para borrar."onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
    
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editpropietario&id='+row.prop_id;
            }
        }
        function asignar(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=asignarcobro1&id='+row.prop_id;
            }
        }


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/usuario.php?op=delete',{prop_id:row.prop_id},function(result){
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
    
