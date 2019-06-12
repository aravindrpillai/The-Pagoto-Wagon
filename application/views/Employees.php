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
                  <th>DP</th>
                  <th>Employee ID</th>
                  <th>Full Name</th>
                  <th>Mobile No</th>
                  <th>Aadhar Np</th>
                  <th>Emplymt Start Date</th>
                  <th>Emplymt Status</th>
                  <th>Actions</th>
                </tr>
				<tr id="new_shop_tr">
                  <form action="<?php echo base_url('employees/addemployee') ?>" method="POST">
				  <td></td>
				  <td></td>
                  <td><input type="text" name="name" value="<?php echo @$post["name"] ?>" class="form-control"></td>
                  <td><input type="number" name="mobile_number" value="<?php echo @$post["mobile_number"] ?>" class="form-control"></td>
                  <td><input type="text" name="aadhar_number" value="<?php echo @$post["aadhar_number"] ?>" class="form-control"></td>
                  <td><input type="date" name="employement_start_date" value="<?php echo @$post["employement_start_date"] ?>" class="form-control"></td>
                  <td></td>
                  <td>
					<button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Save</button>
					<button type="reset" class="btn btn-flat btn-warning" onClick="addNewEmployee()"><i class="fa fa-close"></i></button>
				  </td>
				  </form>
                </tr>
				<?php foreach($employees as $key=>$employee ): ?>
				<?php if($employee["employee_id"] != "MASTER"): ?>
					<tr>
					  <form action="<?php echo base_url('Employees/Update') ?>" method="POST">
					  <td><img src="<?php echo base_url("assets/dp/".$employee['dp']) ?>" width="40px" height="40px"></td>
					  <td><input readonly type="text" value="<?php echo $employee['employee_id'] ?>" class="employee_form form-control" style="width:100px!important"></td>
					  <td><input readonly type="text" id="<?php echo "name_".$employee['id'] ?>" name="name" value="<?php echo $employee['name'] ?>" class="employee_form form-control"></td>
					  <td><input readonly type="number" id="<?php echo "mobile_number_".$employee['id'] ?>" name="mobile_number" value="<?php echo $employee['mobile_number'] ?>" class="employee_form form-control"></td>
					  <td><input readonly type="text" id="<?php echo "aadhar_number_".$employee['id'] ?>" name="aadhar_number" value="<?php echo $employee['aadhar_number'] ?>" class="employee_form form-control"></td>
					  <td><input readonly type="date" id="<?php echo "employement_start_date_".$employee['id'] ?>"  name="employement_start_date" value="<?php echo $employee['employement_start_date'] ?>" class="employee_form form-control"></td>
					  <td>
						<?php if($employee['retired']): ?>
						<button type="submit" name="action" value="status" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Retired </button>
						<?php else: ?>
						<button type="submit" name="action" value="status" class="btn btn-flat btn-success"><i class="fa fa-check"></i> Active </button>
						<?php endif; ?>
					  </td>
					  <td>
					  <?php if(!$employee['retired']): ?>
						<button onClick="editEmployeeData(<?php echo $employee['id'] ?>)" type="button" name="action" class="update_enable_btn btn btn-flat btn-info"><i class="fa fa-pencil"></i></button>
						<button id="<?php echo 'update_save_btn_'.$employee['id'] ?>" type="submit" name="action" value="update" class="update_save_btn btn btn-flat btn-success"><i class="fa fa-save"></i></button>
						<button id="<?php echo 'cancell_update_btn_'.$employee['id'] ?>" type="submit" name="action" value="cancell" class="cancell_update_btn btn btn-flat btn-warning"><i class="fa fa-close"></i></button>
					  <?php endif; ?>
					  </td>
					  <input type="hidden" name="employee_id" value="<?php echo $employee['id'] ?>" >
					  </form>
					</tr>
				<?php endif; ?>
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
<script>
	$("#new_shop_tr").hide();
	var addNewEmpFlag = false;
	function addNewEmployee(){
		if(addNewEmpFlag){
			$("#new_shop_tr").hide();
			$("#add_shop_btn").show();
			addNewEmpFlag = false;
		}else{
			$("#new_shop_tr").show();
			$("#add_shop_btn").hide();
			addNewEmpFlag = true;
		}
	}
	
	if("<?php echo $this->session->flashdata('display_form') ?>" == "1"){
		addNewEmployee();
	}
	
	$(".update_save_btn").hide();
	$(".cancell_update_btn").hide();
	
	if("<?php echo $this->session->flashdata('employee_id') ?>" != ""){
		editEmployeeData(<?php echo $this->session->flashdata('employee_id') ?>);
	}
	
	function editEmployeeData(id){
		$("#update_save_btn_"+id).show();
		$("#cancell_update_btn_"+id).show();
		$(".update_enable_btn").hide();
		
		$("#name_"+id).removeClass("employee_form");
		$("#name_"+id).removeAttr("readonly",false);
		$("#mobile_number_"+id).removeClass("employee_form");
		$("#mobile_number_"+id).removeAttr("readonly",false);
		$("#aadhar_number_"+id).removeClass("employee_form");
		$("#aadhar_number_"+id).removeAttr("readonly",false);
		$("#employement_start_date_"+id).removeClass("employee_form");
		$("#employement_start_date_"+id).removeAttr("readonly",false);
	}
	
	
</script>

<style>
	.employee_form {
		background-color:transparent!important;
		border: 0px solid;
	}
</style>

</body>
</html>
