<table id="dg" title="Lista de Cobro" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/cobro.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>   
            <th align="center" field="prop_nombre" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Nombres</th>
                <th align="center" field="prop_apellido" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Apellidos</th>            
            <th align="center" hidden="true"field="co_id" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID </th>               
                <th align="center" hidden="true"field="prop_id" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID Propietario</th>
                <th align="center" field="co_fecha" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Fecha </th>
                <th align="center"field="co_valortotal" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Valor Total</th>
                <th align="center"field="estado" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Estado</th>
                <th align="center"field="sumacobro" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Suma de los metros</th>
               
               
            </tr>


        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" data-toggle="tooltip"title="Selecciona una fila para editar." onclick="editriego()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" data-toggle="tooltip"title="Selecciona una fila para borrar." onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editterreno(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editterreno&id='+row.co_id;
            }
        }
       
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.co_id;
            }
        }
        function editriego(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editcobro&id='+row.co_id;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/cobro.php?op=delete',{co_id:row.co_id},function(result){
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

    