
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>P</b>W</span>
      <span class="logo-lg"><b>Pagoto</b>Wagon</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
		<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/dp/'.@$this->session->userdata('user_dp')) ?>"" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo @$this->session->userdata('user_name') ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url('assets/dp/'.@$this->session->userdata('user_dp')) ?>" class="img-circle" alt="User Image">

                <p>
				<?php echo @$this->session->userdata('user_name') ?>
				<small><?php echo "Employee ID : ".@$this->session->userdata('employee_id') ?></small>
				<small><?php echo "Aadhar Number : ".@$this->session->userdata('aadhar_number') ?></small>
				</p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('/Profile') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('/Login/Logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
