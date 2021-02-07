<table id="dg" title="Lista de Comunidades existentes" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/comunidad.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
            <a  href="main.php?pag=listapropiedad" class="easyui-linkbutton" ><img icon="20" src="./imagenes/volver.png"  />Regresar</a>
        <thead>
            <tr>               
            <th field="comu_id" width="15%">ID Comunidad</th>
                <th field="comu_nombre" width="50%">Comunidades</th>
                
                            
                
               
            </tr>

        </thead>
    </table> 
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newcomunidad" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
                 <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
        
    </div>
    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editcomunidad&id='+row.comu_id;
            }
        }
        
        


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/comunidad.php?op=delete',{comu_id:row.comu_id},function(result){
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
    
    