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
                                                <button onClick="placeOrder()" id="place_order_btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-check"></i> Place Order</button>
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
                                            <div class="box-body" id="addons_div"></div>
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
                                        <thead>
										<tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 30px">Icecream</th>
                                            <th style="width: 30px">Topping</th>
                                            <th style="width: 10px">Cup</th>
                                            <th style="width: 10px">Qualtity</th>
                                            <th style="width: 10px">Amount</th>
                                        </tr>
										</thead>
										<tbody id="items_final_quote"></tbody>
										<thead>
											<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
											<tr><td></td><td></td><td><b>Total</b></td><td></td><td></td><td><b id="items_net_price_on_modal"></b></td></tr>
										</thead>
                                    </table>
                                </div>
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Total Amount</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <thead><tr><th>#</th><th>Item</th><th>Price</th></tr></thead>
											<tbody id="final_quote"></tbody>
											<thead>
												<tr><th></th><td></td><td></td></tr>
												<tr><th>#</th><th>Total</th><th id="final_price_on_modal">Rs.0 /-</th></tr>
											</thead>
                                        </table>
                                    </div>
                                </div>

								<div class="box">
								
								</div>
								
                                <div class="modal-footer">
                                    <table>
									<tr width="100%">
									<td width="25%"><label class="pull-left">Pay. Mode</label></td>
									<td width="25%" class="bal_fields"><label class="pull-left">Amt Received</label></td>
									<td width="25%" class="bal_fields"><label class="pull-left">Bal. Amt.</label></td>
									<td width="25%" class="pull-right"></td>
									</tr>
									<tr>
									<td>
										<select class="form-control" id="payment_mode" onChange="enableDisableBalanceFields()"; >
											<option value="cash">Cash</option>
											<option value="card">Card</option>
											<option value="paytm">PayTM</option>
											<option value="gpay">G.Pay</option>
											<option value="phonepay">PhonePe</option>
										</select>
									</td>
									<td class="bal_fields"><input id="amount_received" type="text" onChange="generateBalanceAmount()" class="form-control" placeholder="Amount given"></td>
									<td class="bal_fields"><input id="balance_amount" type="text" onClick="generateBalanceAmount()" readonly value="0" class="form-control" placeholder="Balance"></td>
									<td><button type="button" class="btn btn-primary">Submit Purchase</button></td>
									</tr>
									</table>
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
		
		var addons = [];
		<?php foreach($optional_items as $data): ?>
			addons.push({
				id : "<?php echo $data["id"] ?>",
				name : "<?php echo $data["name"] ?>",
				price : "<?php echo $data["amount"] ?>"
			});
		<?php endforeach; ?>
		
		
		var extra_charges = [];
		<?php foreach($extra_charges as $data): ?>
			extra_charges.push({
				id : "<?php echo $data["id"] ?>",
				name : "<?php echo $data["name"] ?>",
				price : "<?php echo $data["amount"] ?>"
			});
		<?php endforeach; ?>
		
		
		var addon_content = ""
		$.each(addons, function(index,item) {           
			addon_content += '<div class="form-group"><label onClick="addAddOns(\''+index+'\')">';
			addon_content += '<input id="addon_'+index+'" type="checkbox" class="minimal"> &nbsp;'+item["name"]+" - Rs."+item["price"]+'</label></div>';
		}); 
		$("#addons_div").html(addon_content);
		
		
		items_array = [];
		$("#place_order_btn").hide();
		
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
			$("#place_order_btn").show();
		}
		
		
		function removeItem(tr_id){
			items_array.splice( $.inArray(tr_id, items_array), 1 );
			$("#tr_"+tr_id).remove();
			generateNetItemsAmount();
			generateIndex();
			if(items_array.length < 1){
				$("#place_order_btn").hide();
			}
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
				items_total += parseFloat($("#row_amount_"+each_tr_id).val());
			});
			$("#items_total").val(items_total);
			return items_total;
		}
		
		var addons_array = [];
		function addAddOns(addon_index){
			if(!$("#addon_"+addon_index).is(':checked')){
				addons_array.push(addon_index);
			}else{
				addons_array.splice( $.inArray(addon_index, addons_array), 1 );
			}
		}
		
		var gross_total_amount = 0;
		function placeOrder(){
			var ordered_items = "";
			var sel_icecream_index = "";
			var sel_topping_index = "";
			var sel_cup_index = "";
			$.each(items_array, function(index,each_tr_id) {             
				ordered_items += '<tr><td>'+(index+1)+'.</td>';
				
				sel_icecream_index = $("#icecream_"+each_tr_id).val();
				ordered_items += '<td>'+icecreams[sel_icecream_index]["name"]+' ('+icecreams[sel_icecream_index]["price"]+')</td>';
				
				sel_topping_index = $("#topping_"+each_tr_id).val();
				ordered_items += '<td>'+toppings[sel_topping_index]["name"]+' ('+toppings[sel_topping_index]["price"]+')</td>';
				
				sel_cup_index = $("#cup_"+each_tr_id).val();
				ordered_items += '<td>'+cups[sel_cup_index]["name"]+' ('+cups[sel_cup_index]["price"]+')</td>';
				
				ordered_items += '<td>'+($("#quantity_"+each_tr_id).val())+'</td>';
				ordered_items += '<td>'+($("#row_amount_"+each_tr_id).val())+'</td>';
				
				ordered_items += '</tr>';
			});
			$("#items_final_quote").html(ordered_items);
			var items_net_price = generateNetItemsAmount();
			$("#items_net_price_on_modal").html("Rs."+items_net_price+" /-");
			
			
			
			var final_bill_table = '<tr><td>1. </td><td>Icecream(s)</td><td>'+items_net_price+'</td>';
			var lastIndex = 0;
			var total_addons_cost = 0;
			$.each(addons_array, function(index,addons_array_index) {             
				final_bill_table += '<tr><td>'+(index+2)+'. </td><td>'+addons[addons_array_index]["name"]+'</td><td>'+addons[addons_array_index]["price"]+'</td></tr>';
				total_addons_cost += parseFloat(addons[addons_array_index]["price"]);
				lastIndex = index+2;
			});
			
			var total_additional_cost = 0;
			$.each(extra_charges, function(index,each_elem) {             
				final_bill_table += '<tr><td>'+(lastIndex+1)+'. </td><td>'+each_elem["name"]+'</td><td>'+each_elem["price"]+'</td></tr>';
				total_additional_cost += parseFloat(each_elem["price"]);
				lastIndex = (lastIndex+1);
			});
			
			$("#final_quote").html(final_bill_table);
			gross_total_amount = items_net_price+total_addons_cost+total_additional_cost;
			$("#final_price_on_modal").html(gross_total_amount);
			
		}
		
		
		function generateBalanceAmount(){
			enableDisableBalanceFields();
			$("#balance_amount").val(parseFloat($("#amount_received").val()) - gross_total_amount);
		}
		
		enableDisableBalanceFields();
		function enableDisableBalanceFields(){
			var pmode = $("#payment_mode").val();
			if(pmode == "cash"){
				$(".bal_fields").show();
			}else{
				$(".bal_fields").hide();
			}
		}
    </script>

</body>

</html>