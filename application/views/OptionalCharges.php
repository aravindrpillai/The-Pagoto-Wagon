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
      <h1>Optional Charges<small>Shop Admin Privilage</small></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url("/Home") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Optional Charges</a></li>
      </ol>
    </section>
    <section class="content">
		<?php include_once("common/flash_message.php") ?>
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
			  <form action="<?php echo base_url("OptionalCharges/Index") ?>" method="POST">
				  <table>
					  <tr>
						  <td>
							  <select name="shop_id" class="form-control">
								  <?php foreach($shops as $shop): ?>
									<option value="<?php echo $shop["id"]?>" <?php echo $this->session->flashdata('optionalcharges_selected_shop_id_'.$shop["id"]) ?> > <?php echo $shop["name"]." - ".$shop["place"]?> </option>
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
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-btn">
                    <button onClick="addNewOptionalCharge()" id="add_shop_btn" type="submit" class="btn btn-flat btn-success"><i class="fa fa-plus"></i> Add New Charge</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Charge Name</th>
                  <th>Is Percentage</th>
                  <th>Amount (Rs.)</th>
                  <th>Actions</th>
                </tr>
				<tr id="new_shop_tr">
                  <form action="<?php echo base_url('OptionalCharges/addOptionalCharge') ?>" method="POST" enctype="multipart/form-data">
				  <td><input type="text" name="name" value="<?php echo @$post["name"] ?>" class="form-control"></td>
                  <td>
					<input type="radio" value="1" name="is_percentage" checked style="width:20px!important; height:20px!important;"> Yes &nbsp;&nbsp;&nbsp; 
					<input type="radio" value="0" name="is_percentage" style="width:20px!important; height:20px!important;"> No 
				  </td>
                  <td><input type="text" name="price" value="<?php echo @$post["price"] ?>" class="form-control"></td>
                  <td>
					<button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Save</button>
					<button type="reset" class="btn btn-flat btn-warning" onClick="addNewOptionalCharge()"><i class="fa fa-close"></i></button>
				  </td>
				  <input type="hidden" name="shop_id" value="<?php echo $this->session->flashdata('optionalcharges_shop_id') ?>" >
				  </form>
                </tr>
				<?php foreach($optionalcharges as $key=>$data ): ?>
					<tr>
					  <form action="<?php echo base_url('OptionalCharges/Update') ?>" method="POST" enctype="multipart/form-data">
					  <td><input readonly type="text" name="name" id="<?php echo 'name_'.$data['id'] ?>" value="<?php echo $data['name'] ?>" class="optionalcharge_form form-control"></td>
					  <td><input readonly type="text" name="price" id="<?php echo 'price_'.$data['id'] ?>" value="<?php echo $data['amount'] ?>" class="optionalcharge_form form-control"></td>
					  <td>
					  <?php if($data['is_percentage']): ?>
						<button name="action" value="is_percentage" class="btn btn-flat btn-info">Percentage</button>
					  <?php else: ?>
						<button name="action" value="is_percentage" class="btn btn-flat btn-success">Actual Amount</button>
					  <?php endif; ?>
					  </td>
					  <td>
						<button type="button" onClick="editOptionalChargeData('<?php echo $data["id"] ?>')" class="update_enable_btn btn btn-flat btn-info"><i class="fa fa-pencil"></i></button>
						<button type="submit" name="action" value="update" id="<?php echo 'update_save_btn_'.$data["id"] ?>" class="update_save_btn btn btn-flat btn-success"><i class="fa fa-save"></i> Save</button>					
						<button type="submit" name="action" value="reset" id="<?php echo 'cancell_update_btn_'.$data["id"] ?>" class="cancell_update_btn btn btn-flat btn-warning"><i class="fa fa-close"></i></button>
					  </td>
					  <input type="hidden" name="optionalcharge_id" value="<?php echo $data["id"] ?>" >
					  <input type="hidden" name="shop_id" value="<?php echo $data["shop_id"] ?>" >
					  </form>
					</tr>
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
	var addNewOptionalChargeFlag = false;
	function addNewOptionalCharge(){
		if(addNewOptionalChargeFlag){
			$("#new_shop_tr").hide();
			$("#add_shop_btn").show();
			addNewOptionalChargeFlag = false;
		}else{
			$("#new_shop_tr").show();
			$("#add_shop_btn").hide();
			addNewOptionalChargeFlag = true;
		}
	}
	
	if("<?php echo $this->session->flashdata('optionalcharges_display_form') ?>" == "1"){
		addNewOptionalCharge();
	}
	
	$(".update_save_btn").hide();
	$(".cancell_update_btn").hide();
	$(".image_form").hide();
	
	if("<?php echo $this->session->flashdata('optionalcharge_id') ?>" != ""){
		editOptionalChargeData(<?php echo $this->session->flashdata('optionalcharge_id') ?>);
	}
	
	function editOptionalChargeData(id){
		$("#update_save_btn_"+id).show();
		$("#cancell_update_btn_"+id).show();
		$("#old_image_"+id).hide();
		$("#new_image_"+id).show();
		$(".update_enable_btn").hide();
		
		$("#name_"+id).removeClass("optionalcharge_form");
		$("#name_"+id).removeAttr("readonly",false);
		$("#price_"+id).removeClass("optionalcharge_form");
		$("#price_"+id).removeAttr("readonly",false);
	}
	
	
</script>

<style>
	.optionalcharge_form {
		background-color:transparent!important;
		border: 0px solid;
	}
</style>

</body>
</html>
