<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagoto Wagon</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bower_components/select2/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/skins/_all-skins.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/plugins/iCheck/all.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include_once("common/header.php") ?>
            <?php include_once("common/side_navigation.php") ?>

                <div class="content-wrapper">
                    <section class="content-header">
                        <h1>Billing</h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active">Billing</li>
                        </ol>
                    </section>

                    <section class="content">
                        <?php include_once("common/flash_message.php") ?>
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">
				  <form action="<?php echo base_url("Billing/Index") ?>" method="POST">
					  <table>
						  <tr>
							  <td>
								  <select name="shop_id" class="form-control">
									  <?php foreach($shops as $shop): ?>
										<option value="<?php echo $shop["id"]?>" <?php echo $this->session->flashdata('billing_selected_shop_id_'.$shop["id"]) ?> > <?php echo $shop["name"]." - ".$shop["place"]?> </option>
									  <?php endforeach; ?>
								  </select>
							  </td>
							  <td>
								<button class="btn btn-flat btn-success"><i class="fa fa-save"></i></button>
							  </td>
						  </tr>
					  </table>
				  </form>
			  </h3>

                                            <div class="box-tools">
                                                <button class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-check"></i> Place Order</button>
                                            </div>
                                        </div>

                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>#</th>
                                                    <th>IceCream</th>
                                                    <th>Topping</th>
                                                    <th>Cup</th>
                                                    <th>Total</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
													<div class="form-group">
														<select class="form-control select2" style="width: 100%;">
														  <option>Chocobar</option>
														  <option>BlueBerry</option>
														  <option>Mango byte</option>
														  <option>Black forest</option>
														</select>
													  </div>
													</td>
                                                    <td>
													<div class="form-group">
														<select class="form-control select2" style="width: 100%;">
														  <option>Green Chilly</option>
														  <option>Choco Powder</option>
														  <option>Oreo</option>
														</select>
													  </div>
													</td>
                                                    <td>
													<div class="form-group">
														<select class="form-control select2" style="width: 100%;">
														  <option>Medium</option>
														  <option>Small</option>
														  <option>Large</option>
														</select>
													  </div>
													</td>
                                                    <td>Rs. 300</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 pull-right">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Addons</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="minimal"> &nbsp; Parcel</label>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="minimal"> &nbsp; Tissue Paper</label>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="minimal"> &nbsp; Water Bottle</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Customer Details</h3>
                                        </div>
                                        <form role="form">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" class="form-control" placeholder="Mobile Number">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                    </section>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Order Confirmation</h4>
                                </div>
                                <div class="modal-body">
								  <div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										<label>Icecream</label>
										<select class="form-control select2" style="width: 100%;">
										  <option>Alabama</option>
										  <option>Alaska</option>
										  <option>California</option>
										  <option>Delaware</option>
										  <option>Tennessee</option>
										  <option>Texas</option>
										  <option>Washington</option>
										</select>
									  </div>
									</div>
								  </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php include_once("common/footer.php") ?>

    </div>

    <script src="<?php echo base_url('assets/bootstrap/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bower_components/fastclick/lib/fastclick.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/dist/js/adminlte.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/plugins/iCheck/icheck.min.js') ?>"></script>

    <script>
        $(function() {
			//select2
			$('.select2').select2();
			
            //Checkbox
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            })
        })
    </script>

</body>

</html>