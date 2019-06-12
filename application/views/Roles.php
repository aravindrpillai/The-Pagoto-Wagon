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
      <h1>Employees Roles<small>Master Privilage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url("/Home") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Roles</a></li>
      </ol>
    </section>
    <section class="content">
		<?php include_once("common/flash_message.php") ?>
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
			  <form action="<?php echo base_url("Roles/Index") ?>" method="POST">
				  <table>
					  <tr>
						  <td>
							  <select name="shop_id" class="form-control">
								  <?php foreach($shops as $shop): ?>
									<option value="<?php echo $shop["id"]?>" <?php echo $this->session->flashdata('selected_shop_id_'.$shop["id"]) ?> > <?php echo $shop["name"]." - ".$shop["place"]?> </option>
								  <?php endforeach; ?>
							  </select>
						  </td>
						  <td>
							<button class="btn btn-flat btn-info"><i class="fa fa-search"></i></button>
						  </td>
					  </tr>
				  </table>
			  </form>
			  </h3>
			  <div class="box-tools">
                <div class="input-group" style="width: 280px;">
                 <?php if(sizeof($users) > 0): ?>
				 <form action="<?php echo base_url("Roles/AddEmployee") ?>" method="POST">
				  <table>
					  <tr>
						  <td>
							  <select name="user_id" class="form-control">
								  <?php foreach($users as $user): ?>
									<option value="<?php echo $user["id"]?>"> <?php echo $user["name"]." - ".$user["employee_id"]?> </option>
								  <?php endforeach; ?>
							  </select>
						  </td>
						  <td>
							<input type="hidden" name="shop_id" value="<?php echo $this->session->flashdata('shop_id') ?>"> 
							<button type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i></button>
						  </td>
					  </tr>
				  </table>
			     </form>
				 <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>DP</th>
                  <th>Employee ID</th>
                  <th>Full Name</th>
                  <th>Mobile No</th>
                  <th>Admin Privilage</th>
                  <th>Billing Privilage</th>
                  <th>Delete</th>
                </tr>
				<?php foreach($roles as $role): ?>
					<form action="<?php echo base_url("Roles/Update")?>" method="POST">
						<tr>
							<td><img src="<?php echo base_url("assets/dp/".$role["dp"])?>" width="40px" height="40px"></td>
							<td><?php echo $role["employee_id"] ?></td>
							<td><?php echo $role["name"] ?></td>
							<td><?php echo $role["mobile_number"] ?></td>
							<td>
								<?php if($role["is_admin"]): ?>
									<button type="submit" name="action" value="is_admin" class="btn btn-flat btn-success"><i class="fa fa-check"></i> Yes </button>
								<?php else: ?>
									<button type="submit" name="action" value="is_admin" class="btn btn-flat btn-warning"><i class="fa fa-close"></i> No </button>
								<?php endif; ?>
							</td>
							<td>
								<?php if($role["is_biller"]): ?>
									<button type="submit" name="action" value="is_biller" class="btn btn-flat btn-success"><i class="fa fa-check"></i> Yes </button>
								<?php else: ?>
									<button type="submit" name="action" value="is_biller" class="btn btn-flat btn-warning"><i class="fa fa-close"></i> No </button>
								<?php endif; ?>
							</td>
							<td>
								<button type="submit" name="action" value="delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></button>
							</td>
						<tr>
						<input type="hidden" name="role_id" value="<?php echo $role["id"] ?>">
						<input type="hidden" name="shop_id" value="<?php echo $role["shop_id"] ?>">
					</form>
				<?php endforeach; ?>
			</table>
            </div>
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
