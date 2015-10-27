<html>
<head>
</head>

<body>
<div>
<br>
	<table>
	<tr>
    <td class="text"><font color="#000000">Nama</font>
    <input type="text" id="nama" onKeyDown="doSearch1(arguments[0]||event)" size="10"/>
    </td>
    <td class="text"><font color="#000000">No Polisi</font>
    <input type="text" id="no_polisi" onKeyDown="doSearch1(arguments[0]||event)" size="10"/>
    </td>
    </tr>
    </table>
</div>
<table id="datagrid"></table>  
<div id="navGrid"></div>

<table id="datagrid1"></table>  
<div id="navGrid1"></div>

<script language="javascript">
jQuery("#datagrid").jqGrid({
   	url:'headerbuktibayar.php',
    datatype: "json",
    colNames:['ID pelanggan','Nama','No. Polisi','Alamat','Action'],
    colModel:[ 
		{name:'id_pelanggan',index:'id_pelanggan', width:100,fixed:false,editable:false,editoptions:{readonly:true,size:10}},
		{name:'nama',index:'nama', width:80, fixed:false,editable:false,editoptions:{readonly:true,size:10}}, 
		{name:'no_polisi',index:'no_polisi', width:80, fixed:false,editable:false,editoptions:{readonly:true,size:10}}, 
		{name:'alamat',index:'alamat', width:80, fixed:false,editable:false,editoptions:{readonly:true,size:10}}, 
		{name:'act',index:'act', width:34,align:"right",editable:false,editoptions:{size:10}}
	],
	rowNum:10,
	autowidth:true, 
	rowList:[10,20,30,40], 
	pager: '#navGrid', 
	sortname: 'nama',  
	sortorder: "asc", 
	height: 260,   
	viewrecords: true,
	rownumbers:true,
	editurl: 'edit.php',
	caption:"Bukti Bayar",
	gridComplete: function(){
		var ids = jQuery("#datagrid").jqGrid('getDataIDs');
		for(var i=0;i < ids.length;i++){
			var cl = ids[i];
		be = "<input style='height:25px;width:50px;' type='button' value='Process' onclick=\"window.open(\'form/frmbuktibayar.php?id="+cl+"\',\'Penjualan Part Shop\', \'width=850,height=700,scrollbars=yes\');\" />";
			jQuery("#datagrid").jqGrid('setRowData',ids[i],{act:be});
		}	
	}
})
jQuery("#datagrid").jqGrid('navGrid','#navGrid',{edit:false,add:false,del:false,search:false, beforeRefresh:function(){
			var nama = jQuery("#nama").val('');
			var no_polisi = jQuery("#no_polisi").val('');
			jQuery("#datagrid").jqGrid('setGridParam',{url:"headerbuktibayar.php",page:1});
			jQuery("#datagrid").trigger('reloadGrid');
		}},
{closeAfterEdit:true,width:500}, {closeAfterAdd:true,width:500},{});  

function gridReload1(){
	var nama = jQuery("#nama").val();
	var no_polisi = jQuery("#no_polisi").val();
	jQuery("#datagrid").jqGrid('setGridParam',{url:"headerbuktibayar.php?nama="+nama+"&no_polisi="+no_polisi,page:1}).trigger("reloadGrid");
}

</script>
 
</body>
</html>