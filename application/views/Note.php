<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notez</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-static-top role="navigation">
        <div class="container" style="width:100%!important">
            <div class="navbar-header pull-left">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-edit"></span> Notez</a>
            </div>
			
            <div class="collapse navbar-collapse pull-right" id="navbar">
            	<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" placeholder="Note ID" class="form-control">
					</div>
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
				</form>
            </div>
        </div>
    </nav>

<div class="container-fluid" style="margin-top:4%; height: 100%; display: flex; justify-content: center; align-items: center;">
	  
	  
	  <div class="col-sm-4">
		  <div class="row">
			  <div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success:</strong> Your account has been registered successfully.
			  </div>
			  <div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Error:</strong> Email ID already exist.
			  </div>	
		  </div>	
			<div class="panel panel-default" style="height:400px">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> <a id="div_topic">Login</a></h3>
				</div>
				<div class="panel-body">
					<br>
					<form action="#" method="POST">
					<div id="full-name-div" style="margin-top:5px">
						<label>Full Name</label>
						<input type="text" class="form-control" id="name" placeholder="John Honai">
					</div>
					<div style="margin-top:20px">
						<label>Email ID</label>
						<input type="email" class="form-control" placeholder="john@yahoo.com">
					</div>
					<div style="margin-top:20px">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="* * * * * * * * * ">
					</div>
					
					<div style="margin-top:20px">
						<button onCLick="alterForm()" name="submit_button" value="login" id="login_button" class="btn btn-info pull-right"><span class="glyphicon glyphicon-log-in"></span> Login</button>
						<button onCLick="alterForm()" name="submit_button" value="register" id="save_button" class="btn btn-success pull-right"><span class="glyphicon glyphicon-save"></span> Register</button>
						<button type="reset" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
						<button type="button" onCLick="alterForm()" id="new_reg_button" class="btn btn-info pull-left"><span class="glyphicon glyphicon-plus"></span> New Registation</button>
						<button type="button" onCLick="alterForm()" id="back_to_login_button" class="btn btn-success pull-left"><span class="glyphicon glyphicon-repeat"></span> Return To Login</button>
					</div>
					</form>
				</div>
			</div>
	  </div>
</div>

<footer style="position:fixed; bottom:0; width:100%">
	<div class="footer-blurb">
		<div class="container">
			<div class="row">
			<center>
				<p>Development Credits : Aravind R Pillai</p>
				<p>Copyright &copy; Wokidz.com 2019 </p>
			</center>
			</div>
		</div>
	</div>
</footer>
</body>
</html>

    <script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/holder.min.js"></script>
	<script>
		var negRegFlag = false;
		$("#full-name-div").hide();
		$("#back_to_login_button").hide();
		$("#save_button").hide();
		
		function alterForm(){
			if(negRegFlag == false){
				$("#div_topic").html("New Registration");
				$("#new_reg_button").hide();
				$("#login_button").hide();
				$("#save_button").show();
				$("#full-name-div").show();
				$("#back_to_login_button").show();
			}else{
				$("#div_topic").html("Login");
				$("#full-name-div").hide();
				$("#back_to_login_button").hide();
				$("#save_button").hide();
				$("#login_button").show();
				$("#new_reg_button").show();
			}
			negRegFlag = !negRegFlag;
		}
	</script>