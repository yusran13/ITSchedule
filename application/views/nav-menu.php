
<body>
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            
            <a class="navbar-brand" href="">
              IT Project Schedule Purinusa Ekapersada Bawen 
            </a>
        </div>
  <!-- /.navbar-header -->
        <ul  class="nav navbar-top-links navbar-right">
          
           <li class="">
                
                User :  <?php $logged_in = $this->session->userdata('logged_in'); echo $this->session->userdata('nama_user'); ?>
            </li>
          <li class="">
              <?php 
                  $logged_in = $this->session->userdata('logged_in');
                  
                  if ($logged_in){
                        ?>

                        <a class="" href="<?php echo base_url() ?>index.php/main/logout">
                          <i class="fa fa-user fa-fw"></i> Logout
                      </a>
                            
                      <?php
                 }
                  else {
                        ?>
                        <a class="" href="<?php echo base_url() ?>index.php/main/login">
                          <i class="fa fa-user fa-fw"></i> Login
                        </a>
                        <?php
                  }
               ?>         
          </li>
            <!-- /.dropdown -->
        </ul>
  <!-- /.navbar-top-links -->
        <aside class="sidebar">
         <nav class="sidebar-nav">
            <ul class="nav" id="menu">
                           
              <li>
                <a href="<?php echo base_url('index.php/main/approved')?>">
                  <i class="fa fa-table fa-fw">
                  </i>
                  Approved Project</a>
              </li>
              <li>
                <a href="<?php echo base_url('index.php/main/pending')?>">
                  <i class="fa fa-files-o fa-fw">
                  </i>
                  Pending Project
                </a>
              </li>
			  
			  <li>
                <a href="<?php echo base_url('index.php/main/step')?>">
                  <i class="fa fa-edit fa-fw">
                  </i>
                  Tahapan Membuat Aplikasi
                </a>
              </li>

              </br> </br> </br>
               <?php 
                  $logged_in = $this->session->userdata('logged_in');
                  
                  if ($this->session->userdata('nama_user')!="admin"){
                        ?>
                        
                        <div align="center">
                            <button class="btn btn-success" onClick="request_project()"><i class="glyphicon glyphicon-plus"></i> Request Project</button>
                        </div>
                  <?php
                 }
              ?>  
         
            </ul>
          </nav>
      </aside>
	 </nav>
   <script type="text/javascript">
                            function request_project()
                            {
                              $('#form_request')[0].reset(); // reset form on modals
                              $('#modal_form_request').modal('show'); // show bootstrap modal
                              $('.modal-title').text('Request Project'); // Set Title to Bootstrap modal title
                            }

                            function submit()
                              {
                                var url;
                                url = "<?php echo site_url('project/ajax_add')?>";

                                 // ajax adding data to database
                                    $.ajax({
                                      url : url,
                                      type: "POST",
                                      data: $('#form_request').serialize(),
                                      dataType: "JSON",
                                      success: function(data)
                                      {
                                         //if success close modal and reload ajax table
                                         $('#modal_form_request').modal('hide');
                                         reload_table();
                                      },
                                      error: function (jqXHR, textStatus, errorThrown)
                                      {
                                          alert('Error adding / update data');
                                      }
                                  });
                              }
  </script>
   <div class="modal fade" id="modal_form_request" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
                   <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h3 class="modal-title"></h3>
                   </div>
                   <div class="modal-body form">
                        <form action="#" id="form_request" class="form-horizontal">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                 <div class="form-group">
                                     <label class="control-label col-md-3">Project Name</label>
                                         <div class="col-md-9">
                                              <input name="nama_project" placeholder="Project Name" class="form-control" type="text">
                                          </div>
                                  </div>
                                  <div class="form-group">
                                     <label class="control-label col-md-3">Short Description</label>
                                         <div class="col-md-9">
                                            <textarea name="desc" placeholder="Short Description"class="form-control"></textarea>
                                         </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">PIC</label>
                                          <div class="col-md-9">
                                              <input name="pic" placeholder="PIC" class="form-control" type="text">
                                          </div>
                                  </div>
                                     
                                  </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="submit()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
              </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
  </div>
                    
 </body>


