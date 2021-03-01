<table id="dg" title="Lista de Propiedad" class="easyui-datagrid" style="width:auto;height:auto; margin:10px;"
            url="controlador/propiedad.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th align="center" field="propi_id" width="10%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">ID Propiedad</th>
                
                <th align="center"field="propi_metros" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Metros m²</th>
                <th align="center"field="propi_parroquia" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Parroquia</th>
                <th align="center"field="propi_comunidad" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Comunidad</th>
                <th align="center"field="propi_sector" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Sector</th>
                <th align="center"field="propi_longitud" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Longitud</th>
                <th align="center"field="propi_latitud" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Latitud</th>
                <th align="center"field="utm" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Cordenadas UTM</th>
                <th align="center"field="propi_ciudad" width="15%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Ciudad</th>
                
                <th align="center"field="propi_calleprincipal" width="25%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Calle Principal</th>
                <th align="center"field="propi_callesecundaria" width="25%"><font color="Black"size="2"face="Comic Sans MS, Arial, MS Sans Serif">Calle Secundaria</th>
               
                
                
               
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newpropiedad" class="easyui-linkbutton" iconCls="icon-add" data-toggle="tooltip"title="Nueva propiedad."plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" data-toggle="tooltip"title="Selecciona una fila para editar."onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" data-toggle="tooltip"title="Selecciona una fila para borrar." onclick="destroyUser()">Eliminar</a>
        
        
        <a  href="javascript:void(0)" class="easyui-linkbutton" onclick="editpropi()" data-toggle="tooltip"title="Selecciona una propiedad para agregarle un propietario." plain="true"  ><img src="imagenes/asignar.png"> Agregar propietario</a>
        
        
        <a  href="javascript:void(0)" class="easyui-linkbutton"  plain="true" data-toggle="tooltip"title="Selecciona una propiedad para buscar en el mapa."  onclick="mapa()"><img src="imagenes/map.png"> Busqueda en el Mapa</a>
       
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

            $.post('controlador/propiedad.php?op=delete',{propi_id:row.propi_id},function(result){
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

    
 