<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "select p.prop_nombre ,p.prop_apellido ,c.co_fecha ,c.co_id ,c.co_valortotal ,c.estado ,c.prop_id,c.sumacobro from propietario p,cobro c where p.prop_id=c.prop_id and  c.co_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Editar Cobro" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px"hidden="true">
                <input name="co_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['co_id']?>" class="easyui-textbox" required="true" label="Código Cobro " style="width:30%"/>
            </div>
                     
<div  style="margin-bottom:5px"hidden="true">
            
            <select  name ="prop_id"labelPosition="top"required="true" value="<?php echo $row ['prop_id']?>" class="easyui-combogrid" 
            style="width:50%;"  data-options="
                    url:'controlador/cobro.php?op=selectcombo',
                    method:'get',
                    
                    idField:'prop_id',
                    textField:'prop_id',
                    panelHeight:'auto',
                   
                    label: 'ID Propietario:',
                    columns: [[
                        {field:'prop_id',title:'Codigo',width:80},
                        {field:'prop_nombre',title:'Nombre',width:120},
                        {field:'prop_apellido',title:'Apellido',width:80,align:'right'},
              
                                          
                        
                    ]],
                    fitColumns:true,
                    labelWidth:'160px'
                    ">               
                    <option   value="<?php echo $row ['prop_id']?>" > <?php echo $row ['prop_id']?></option>  
            </select>
        </div> 
        <div style="margin-bottom:5px">
                <input labelPosition="top"  readonly=»readonly» value="<?php echo $row ['prop_nombre']?>" class="easyui-textbox" required="true" label="Nombre : (solo lectura) " style="width:50%" >
            </div>   
            <div style="margin-bottom:5px">
                <input labelPosition="top" readonly=»readonly» value="<?php echo $row ['prop_apellido']?>" class="easyui-textbox" required="true" label="Apellido : (solo lectura)" style="width:50%" >
            </div>       
            <div style="margin-bottom:5px">
                <input name="co_fecha" labelPosition="top" value="<?php echo $row ['co_fecha']?>" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser"  required="true" label="Fecha:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="co_valortotal" labelPosition="top" value="<?php echo $row ['co_valortotal']?>" class="easyui-textbox" required="true" label="Valor Total :" style="width:50%" >
            </div>   
                    
                       

            <div  style="margin-bottom:5px">
            <select id="cc" name="estado" labelPosition="top" class="easyui-combobox" name="dept"   value="true" label="Estado  :"  style="width:50%">
            
            
        <option   value="<?php echo $row ['estado']?>" > <?php echo $row ['estado']?></option>
        <option>Pagado</option>
       <option>Por Pagar</option>
         </select>
         
        </div>
        
            <div style="margin-bottom:5px">
                <input name="sumacobro" labelPosition="top" value="<?php echo $row ['sumacobro']?>"  readonly=»readonly» class="easyui-textbox" required="true" label="Suma de los metros : (solo lectura)" style="width:50%" >
            </div>    
            
            
             
        </form>  
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listacobro" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    

    <script type="text/javascript">



      function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
       
      $('#cc').combobox().prop('selectedIndex', -1)
       $('#cc').combobox({
           
           
            panelHeight:'100',
            
            onSelect: function(rec)
            {
             
            }
        });

      
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/cobro.php?op=update',
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
    
 