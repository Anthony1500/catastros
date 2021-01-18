<table id="dg" title="Lista de Propiedad" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/propiedad.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="propi_id" width="25%">Codigo Propiedad</th>
                
                <th field="propi_metros" width="25%">Metros m²</th>
                <th field="propi_longitud" width="25%">Longitud</th>
                <th field="propi_latitud" width="25%">Latitud</th>
                <th field="propi_sector" width="25%">Sector</th>
                <th field="propi_calleprincipal" width="25%">Calle Principal</th>
                <th field="propi_callesecundaria" width="25%">Calle Secundaria</th>
                <th field="propi_ciudad" width="25%">Ciudad</th>
                <th field="propi_parroquia" width="25%">Parroquia</th>
                
               
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newpropiedad" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a  href="javascript:void(0)" class="easyui-linkbutton" onclick="editpropi()" iconCls="icon-add" plain="true"  >Agregar propietario</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a  href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="mapa()">Busqueda en el Mapa</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editpropiedad&id='+row.propi_id;
            }
        }
        function mapa(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=mapa&id='+row.propi_id;
            }
        }
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.propi_id;
            }
        }


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/propiedad.php?op=delete',{prop_id:row.prop_id},function(result){
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

    
 