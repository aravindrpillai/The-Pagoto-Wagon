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
                                                <thead>
												<tr>
                                                    <th width="2%">#</th>
                                                    <th width="32%">IceCream</th>
                                                    <th width="32%">Topping</th>
                                                    <th width="21%">Cup</th>
                                                    <th width="3%">Quantity</th>
                                                    <th width="10%">Total</th>
                                                </tr>
												</thead>
												<tbody id="tr_data">
												</tbody>
                                            	<thead>
												<tr><td></td><td></td><td><button onClick="addNewItem()" class="btn btn-flat btn-info"> <i class="fa fa-plus"></i> Add New Item</button> </td>
												<td></td><td><b>Net Amt</b></td><td><input id="items_total" type="text" value="0" readonly onClick="generateNetItemsAmount()" class="form-control"></td></tr>
												</thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 pull-right">

                                    <?php if(count($optional_items) > 0 ): ?>
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Addons</h3>
                                            </div>
                                            <div class="box-body">
                                                <?php foreach($optional_items as $item): ?>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="checkbox" class="minimal"> &nbsp;
                                                            <?php echo $item["name"]." - Rs.".$item["amount"] ?>
                                                        </label>
                                                    </div>
                                                    <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>

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

                                <div class="box-body no-padding">
                                    <table class="table table-condensed">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 30px">Icecream</th>
                                            <th style="width: 30px">Topping</th>
                                            <th style="width: 10px">Cup</th>
                                            <th style="width: 10px">Qualtity</th>
                                            <th style="width: 10px">Amount</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>ChocoLava (35)</td>
                                            <td>Oreo (5)</td>
                                            <td>Medium (3)</td>
                                            <td>2</td>
                                            <td>48</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Babana Icecream (30)</td>
                                            <td>Oreo (5)</td>
                                            <td>Small (2)</td>
                                            <td>4</td>
                                            <td>56</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Ocean Icecream (50)</td>
                                            <td>Choco Chips (5)</td>
                                            <td>Large (3)</td>
                                            <td>1</td>
                                            <td>30</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Banana Icecream</td>
                                            <td>Choco Chips (5)</td>
                                            <td>Large (3)</td>
                                            <td>1</td>
                                            <td>30</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total</b></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Rs. 450</b></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Total Amount</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <td>Icecreams</td>
                                                <td>450</td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <td>Water Bottle(Rs.20.00)</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <td>Tissue Paper(Rs.0.02)</td>
                                                <td>0.02</td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <td>SMS (Rs.0.50)</td>
                                                <td>0.50</td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <td>Tax (8%)</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Total</th>
                                                <th>Rs.887</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Bill</button>
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
		
		var cups = [];
		<?php foreach($cups as $data): ?>
			cups.push({
				id : "<?php echo $data["id"] ?>",
				name : "<?php echo $data["name"] ?>",
				price : "<?php echo $data["price"] ?>"
			});
		<?php endforeach; ?>
		
		
		var icecreams = [];
		<?php foreach($icecreams as $data): ?>
			icecreams.push({
				id : "<?php echo $data["id"] ?>",
				name : "<?php echo $data["name"] ?>",
				price : "<?php echo $data["price"] ?>"
			});
		<?php endforeach; ?>
		
		var toppings = [];
		<?php foreach($toppings as $data): ?>
			toppings.push({
				id : "<?php echo $data["id"] ?>",
				name : "<?php echo $data["name"] ?>",
				price : "<?php echo $data["price"] ?>"
			});
		<?php endforeach; ?>
		
		items_array = [];
		
		var tr_index = 1;
		function addNewItem(){
			items_array.push(tr_index);
			var tr_content = '<tr id="tr_'+tr_index+'"><td><i id="index_'+tr_index+'"></i><br><i onClick="removeItem('+tr_index+')" style="color:red" class="fa fa-trash"><i></td>';
            tr_content += '<td><div class="form-group"><select id="icecream_'+tr_index+'" onChange="generateItemCost('+tr_index+')" class="form-control select2" style="width: 100%;">';
			$.each(icecreams, function(index,data) {             
				tr_content += '<option value='+index+'>'+data["name"]+' - Rs.'+data["price"]+'</option>';
			}); 
			tr_content += '</select></div></td>';
			
			tr_content += '<td><div class="form-group"><select id="topping_'+tr_index+'" onChange="generateItemCost('+tr_index+')" class="form-control select2" style="width: 100%;">';
            $.each(toppings, function(index,data) {             
				tr_content += '<option value='+index+'>'+data["name"]+' - Rs.'+data["price"]+'</option>';
			}); 
            tr_content += '</select></div></td>';
			
			
			tr_content += '<td><div class="form-group"><select id="cup_'+tr_index+'" onChange="generateItemCost('+tr_index+')" class="form-control select2" style="width: 100%;">';
            $.each(cups, function(index,data) {             
				tr_content += '<option value='+index+'>'+data["name"]+' - Rs.'+data["price"]+'</option>';
			}); 
            tr_content += '</select></div></td>';
			
			tr_content += '<td><input id="quantity_'+tr_index+'" onChange="generateItemCost('+tr_index+')" type="number" value="1" name="quantity" class="form-control"></td>';
			tr_content += '<td><input id="row_amount_'+tr_index+'" type="text" onClick="generateItemCost('+tr_index+')" readonly value="Rs. 300" class="form-control"></td></tr>';
			
			$("#tr_data").append(tr_content);
			generateItemCost(tr_index);
			tr_index += 1;
			generateIndex();
		}
		
		
		function removeItem(tr_id){
			items_array.splice( $.inArray(tr_id, items_array), 1 );
			$("#tr_"+tr_id).remove();
			generateNetItemsAmount();
			generateIndex();
		}
		
		
		function generateIndex(){
			var i = 1;
			 $.each(items_array, function(key,value) {             
			 	$("#index_"+value).html(i++);
			}); 
		}
		
		function generateItemCost(tr_id){
			var sel_icecream_index = $("#icecream_"+tr_id).val();
			var sel_topping_index = $("#topping_"+tr_id).val();
			var sel_cup_index = $("#cup_"+tr_id).val();
			
			var sel_icecream_price = parseInt(icecreams[sel_icecream_index]["price"]);
			var sel_topping_price = parseInt(toppings[sel_topping_index]["price"]);
			var sel_cup_price = parseInt(cups[sel_cup_index]["price"]);
			
			var quantity = parseInt($("#quantity_"+tr_id).val());
			if(quantity <= 0){
				$("#quantity_"+tr_id).val(1);
				quantity = 1;
			}
			
			var row_cost = ((sel_icecream_price+sel_topping_price+sel_cup_price)*quantity);
			$("#row_amount_"+tr_id).val(row_cost);
			generateNetItemsAmount();
		}
		
		function generateNetItemsAmount(){
			var items_total = 0;
			$.each(items_array, function(index,each_tr_id) {             
				items_total += parseInt($("#row_amount_"+each_tr_id).val());
			});
			$("#items_total").val(items_total);
		}
    </script>

</body>

</html>