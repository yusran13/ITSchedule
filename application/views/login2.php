<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="root" >

    <title>Login| 6R6S</title>

    <?php
        $in = $this->session->flashdata('info');

        if($in == "info"){?>
            <script>
                alert("Username & Password tidak cocok");
            </script>
    <?php }?>

    <!-- Bootstrap core CSS -->
    
    <link href="<?php echo base_url() ?>/asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('/asset/bootstrap/js/jquery.min.js')?>"></script>      

</head>
  
<body style="font-family:agency fb; font-size:16px; background-color:white;">
    
    <div class="modal fade" id="login" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#00C853;">
                    <h4 class="modal-title" style="font-family:Dobkin; font-size:30px; margin-top:-15px;"><center>Please Login First</center></h4>
                </div>
                <div class="modal-body">
                    
                <form role="form" action="<?php echo base_url(); ?>index.php/main/auth" method="post">
                    <div class="form-group has-warning">
                        <i class="mdi-social-person"></i>
                        <input type='text' class="form-control floating-label" name="username" placeholder="Username"/>
                    </div>

                    <div class="form-group has-warning">
                        <i class="mdi-action-lock"></i>
                        <input type="password" class="form-control floating-label" name="password" placeholder="Password">
                    </div>
                  
                    <button type="submit" class="btn btn-material-green-A700">Login <i class ="mdi-action-lock-open"></i></button>
                </form>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.js"></script>

    <script>
      $.material.init();
    </script>

    <script type="text/javascript">
        $(window).load(function(){
            $('#login').modal('show')
        });
    </script>
    
</body>
</html>