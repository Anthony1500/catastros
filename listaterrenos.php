<table id="dg" title="Lista de Terrenos Asignados" class="easyui-datagrid" style="width:auto;height:auto; margin:10px;"
            url="controlador/terrenos.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            <th align="center" field="propi_id" width="11%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID Propiedad</th>
                <th align="center"hidden="true"field="riego_id" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID  </th>               
                <th align="center"field="prop_nombre" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Nombres</th>
                <th align="center"field="prop_apellido" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Apellidos </th>
                <th align="center"field="prop_cedula" width="10%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Nº Cédula</th>
                <th align="center"field="propi_comunidad" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Comunidad</th>
                
                <th align="center"field="propi_metros" width="10%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Metros m²</th>
                <th align="center"field="propi_latitud" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Latitud</th>
                <th align="center"field="propi_longitud" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Longuitud</th>
                <th align="center"field="propi_ciudad" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Ciudad</th>
                <th align="center"field="propi_parroquia" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Parroquia</th>
                <th align="center"field="tipodeasignacion" width="15%" ><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Tipo de Asignación</th>
             
                <th align="center"field="fechadeasignacion" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Fecha de Asignación</th>
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="javascript:void(0)" name="busqueda" class="easyui-linkbutton" onclick="editriego()" data-toggle="tooltip"title="Selecciona un terreno para asignarle un riego." plain="true"  ><img src="imagenes/can.png"> Agregar riego</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" data-toggle="tooltip"title="Selecciona una fila para editar." onclick="editterreno()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" data-toggle="tooltip"title="Selecciona una fila para borrar." onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editterreno(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editterreno&id='+row.propro_codigo;
            }
        }
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.propi_id;
            }
        }
        function editriego(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editriego&id='+row.propi_id;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/terrenos.php?op=delete',{propro_codigo:row.propro_codigo},function(result){
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

    