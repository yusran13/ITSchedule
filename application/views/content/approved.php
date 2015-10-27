<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
       <tr>
          <th style="width:30%; text-align:center">Project Name</th>
          <th style="width:40%; text-align:center">Short Description</th>
          <th style="width:10%; text-align:center">PIC</th>
          <th style="width:10%; text-align:center">Start</th>
          <th style="width:10%; text-align:center">End</th>
          <th style="text-align:center">Leader</th>
          <th style="width:10%; text-align:center">Status</th>
          

            <?php 
                  $logged_in = $this->session->userdata('logged_in');
                  
                  if ($this->session->userdata('nama_user')=="admin"){
                        ?>
                          <th style="width:8%; text-align:center">Action</th>
                      <?php
                 }
                
               ?> 
          
        </tr>
      </thead>
      <tbody>
      </tbody>

    
    </table>
  <script type="text/javascript">
        // When the document is ready
            $(document).ready(function () {
                
                $('.input-daterange').datepicker({
                  format: 'yyyy-mm-dd',
                    todayBtn: "linked",
                    todayHighlight: true
                });
            
            });
  </script>


  <script type="text/javascript">
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('project/list_not_status/pending')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function add_person()
    {
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_project(id)
    {
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('project/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="nama_project"]').val(data.nama_project);
            $('[name="desc"]').val(data.desc);
            $('[name="pic"]').val(data.pic);
            $('[name="status"]').val(data.status);
            $('[name="start"]').val(data.start);
            $('[name="end"]').val(data.end);
            
            $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Project'); // Set title to Bootstrap modal title           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function edit()
    {
      var url;
      url = "<?php echo site_url('project/ajax_update')?>";
      // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form_edit').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_person(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('project/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form_edit').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title"></h3> 
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Project Name</label>
              <div class="col-md-9">
                <input name="nama_project" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Short Description</label>
              <div class="col-md-9">
                <textarea name="desc" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">PIC</label>
              <div class="col-md-9">
                <input name="pic" class="form-control" type="text">
              </div>
            </div>

              <div class="form-group">
              <label class="control-label col-md-3">Start</label>
              <div class="col-md-9">
                 <div class="input-daterange" id="datepicker" >
                    <input type="text" class="input-small" name="start" /> 
                    <span class="add-on">to</span>
                    <input type="text" class="input-small" name="end" />
                    
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Project Leader</label>
              <div class="col-md-9">
                <select name="leader_id_leader" class="form-control">
                  <option value="1">Nanang Wahyu Setiana</option>
                  <option value="2">Piecessa Adi Nugraha</option>
                  <option value="3">Muhammad Yusran</option>
                </select>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="edit()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>