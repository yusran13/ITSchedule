<head>

   <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/jquery-ui-1.8.13.custom.css" type="text/css" media="all" /> 
                <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/ui.jqgrid.css" type="text/css" media="all" /> 
                <link type="text/css" href="<?php echo base_url() ?>asset/bootstrap/themes/ui-lightness/ui.all.css" rel="stylesheet" />

    <link type="text/css" href="<?php echo base_url()?>application/views/css/plugins/searchFilter.css" rel="stylesheet" />

    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 75%;
        }
    </style>

   <script src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.4.js" type="text/javascript" charset="utf-8"/> </script>
                <script src="<?php echo base_url() ?>asset/bootstrap/js/jquery-1.5.2.min.js" type="text/javascript" charset="utf-8"></script> 
                <script src="<?php echo base_url() ?>asset/bootstrap/js/jquery-ui-1.8.13.custom.min.js" type="text/javascript" charset="utf-8"></script>
                <script src="<?php echo base_url() ?>asset/bootstrap/js/i18n/grid.locale-en.js" type="text/javascript" charset="utf-8"></script>
                <script src="<?php echo base_url() ?>asset/bootstrap/js/jquery.jqGrid.src.js" type="text/javascript" charset="utf-8"></script> 
                <script src="<?php echo base_url() ?>asset/bootstrap/js/jquery.table.addrow.js" type="text/javascript" charset="utf-8"></script>
                <script src="<?php echo base_url() ?>asset/bootstrap/js/engineSearch.js" type="text/javascript" charset="utf-8"></script>  

    <title>Codeigniter With JQGrid</title>
</head>
<body>
    <center>
        <h1>Codeigniter With JQGrid</h1>
    <?php
        $ci =& get_instance();
        $base_url = base_url();
    ?>
    <table id="list"></table><!--Grid table-->
    <div id="pager"></div>  <!--pagination div-->
    </center>
</body>

<script type="text/javascript">
        $(document).ready(function (){
            jQuery("#list").jqGrid({
                url:'<?=$base_url.'index.php/Main/loadData'?>',      //another controller function for generating data
                mtype : 'POST',             //Ajax request type. It also could be GET
                datatype: "json",            //supported formats XML, JSON or Arrray
                colNames:['Name','Email','Passport','Phone','Fax','Address'],       //Grid column headings
                colModel:[
                    {name:'name',index:'name', width:100, align:"left"},
                    {name:'email',index:'email', width:150, align:"left"},
                    {name:'passport',index:'passport', width:100, align:"right"},
                    {name:'phone',index:'phone', width:100, align:"right"},
                    {name:'fax',index:'fax', width:100, align:"right"},
                    {name:'address',index:'address', width:100, align:"right"},
                ],
                rowNum:10,
                width: 750,
                //height: 300,
                rowList:[10,20,30],
                pager: '#pager',
                sortname: 'id',
                viewrecords: true,
                rownumbers: true,
                gridview: true,
                caption:"List Of Person"
            }).navGrid('#pager',{edit:false,add:false,del:false});
        });
    </script>