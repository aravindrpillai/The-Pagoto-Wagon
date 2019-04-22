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
      <h1>Employees <small>Admin Privilage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url("/Home") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a><i class="fa fa-dashboard"></i> Employees</a></li>
      </ol>
    </section>
    <section class="content">
		<?php include_once("common/flash_message.php") ?>
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees Of Pagoto Wagons</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-btn">
                    <button onClick="addNewEmployee()" id="add_shop_btn" type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i> Add New Employee</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Display Picture</th>
                  <th>Employee ID</th>
                  <th>Full Name</th>
                  <th>Aadhar Number</th>
                  <th>Employment Start Date</th>
                  <th>Employment Status</th>
                  <th>Actions</th>
                </tr>
				<tr id="new_shop_tr">
                  <form action="<?php echo base_url('employees/addemployee') ?>" method="POST">
				  <td></td>
                  <td><input type="text" name="name" value="<?php echo @$name ?>" class="form-control"></td>
                  <td><input type="text" name="place" value="<?php echo @$place ?>" class="form-control"></td>
                  <td><input type="date" name="start_date" value="<?php echo @$start_date ?>" class="form-control"></td>
                  <td>#</td>
                  <td>
					<button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Save </button>
					<button type="reset" class="btn btn-flat btn-warning" onClick="addNewShop()"><i class="fa fa-close"></i> Close </button>
				  </td>
				  </form>
                </tr>
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
<script>
	$("#new_shop_tr").hide();
	var addNewShopFlag = false;
	function addNewEmployee(){
		if(addNewShopFlag){
			$("#new_shop_tr").hide();
			$("#add_shop_btn").show();
			addNewShopFlag = false;
		}else{
			$("#new_shop_tr").show();
			$("#add_shop_btn").hide();
			addNewShopFlag = true;
		}
	}
	
	if("<?php echo $this->session->flashdata('display_form') ?>" == "1"){
		addNewShop();
	}
	
	$(".update_save_btn").hide();
	$(".cancell_update_btn").hide();
	
	if("<?php echo $this->session->flashdata('shop_id') ?>" != ""){
		editShopData(<?php echo $this->session->flashdata('shop_id') ?>);
	}
	
	function editShopData(id){
		$("#update_save_btn_"+id).show();
		$("#cancell_update_btn_"+id).show();
		$(".update_enable_btn").hide();
		
		$("#name_"+id).removeClass("shop_form");
		$("#name_"+id).removeAttr("readonly",false);
		$("#place_"+id).removeClass("shop_form");
		$("#place_"+id).removeAttr("readonly",false);
		$("#start_date_"+id).removeClass("shop_form");
		$("#start_date_"+id).removeAttr("readonly",false);
	}
	
	
</script>

<style>
	.shop_form {
		background-color:transparent!important;
		border: 0px solid;
	}
</style>

</body>
</html>
