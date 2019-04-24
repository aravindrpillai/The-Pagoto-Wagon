<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagoto Wagon</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/font-awesome/css/font-awesome.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/Ionicons/css/ionicons.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/AdminLTE.min.css'); ?>" >
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/skins/_all-skins.min.css'); ?>" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include_once("common/header.php") ?>
<?php include_once("common/side_navigation.php") ?>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>User Profile </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
    <section class="content">
	<?php include_once("common/flash_message.php") ?>
     <div class="row">
	 
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Basic Information</h3>
            </div>
            <form action="<?php echo base_url("Profile/UpdateBasicDetails")?>" method="POST">
              <div class="box-body" style="height:300px!important">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo @$user_data["name"] ?>">
                </div>
				<div class="form-group">
                  <label>Aadhar Number</label>
                  <input type="text" name="aadhar_no" class="form-control" value="<?php echo @$user_data["aadhar_number"] ?>">
                </div>
				<div class="form-group">
                  <label>Mobile Number</label>
                  <input type="text" name="mobile_no" class="form-control" value="<?php echo @$user_data["mobile_number"] ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Basic Details</button>
              </div>
            </form>
          </div>
        </div>
		
        
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Display Picture</h3>
            </div>
            <form action="<?php echo base_url("Profile/UpdateDisplayPicture")?>" method="POST" enctype="multipart/form-data">
              <div class="box-body" style="height:300px!important">
                <div class="form-group">
                  <label>Profile Picture</label>
                  <input name="image" type="file" class="form-control">
                </div>
				<hr>
				<center>
				<img src="<?php echo base_url("/assets/dp/".$user_data["dp"]) ?>" height="180px" width="180px">
				</center>
			  </div>
              <div class="box-footer">
                <button type="submit" name="action" value="update" class="btn btn-primary">Update Display Picture</button>
                <button type="submit" name="action" value="remove" class="pull-right btn btn-danger">Remove Display Picture</button>
              </div>
            </form>
          </div>
        </div>
		
		 <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Credentials</h3>
            </div>
            <form action="<?php echo base_url("Profile/UpdateCredentials")?>" method="POST">
              <div class="box-body" style="height:300px!important">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo @$user_data["username"] ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control" value="<?php echo @$user_data["password"] ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Credentials</button>
              </div>
            </form>
          </div>

        </div>
      </div>
     
	</section>
  </div>

<?php include_once("common/footer.php") ?>

</div>

<script src="<?php echo base_url('assets/bootstrap/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/dist/js/adminlte.min.js') ?>"></script>

</body>
</html>
