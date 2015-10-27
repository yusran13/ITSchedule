<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Halaman Login</title>
<link rel="stylesheet" href="<?php echo base_url() ?>/asset/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>/asset/bootstrap/css/login.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from">
            <h4><em class="glyphicon glyphicon-log-in"></em>  Halaman Login</h4>

            <?php 
            /**
             * Pesan Error Bila terjadi kegagalan dalam login
             */
            if (isset($_GET['error']) && $_GET['error'] == 'salah') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Wrong ! </strong> Username dan Password tidak ditemukan
                       </div>'; 
            }?>
            <form action="<?php echo base_url(); ?>index.php/main/auth" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Cost Center"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
            <p class="return-home"></p>      
        </div>
    </div>
</div> <!-- End container -->

    <!-- Script js -->
    <script src="<?php echo base_url() ?>/asset/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ?>/asset/bootstrap/js/bootstrap.min.js"></script>
    <!-- End Script -->
</body>
</html>