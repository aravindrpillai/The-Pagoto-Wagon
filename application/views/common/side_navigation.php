 <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dp/'.@$this->session->userdata('user_dp')) ?>"" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo @$this->session->userdata('user_name') ?></p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
		<li class="<?php echo @$this->session->flashdata('is_home_selected') ?> ">
          <a href="<?php echo base_url('/Home') ?>"><i class="fa fa-home"></i> <span>Home</span></a>
        </li>
		
		<?php if(@$this->session->userdata('is_master')): ?>
			<li class="<?php echo @$this->session->flashdata('is_shops_selected') ?>">
			  <a href="<?php echo base_url('/Shops') ?>"><i class="fa fa-building"></i> <span>Shops</span></a>
			</li>
			<li class="<?php echo @$this->session->flashdata('is_employees_selected') ?>">
			  <a href="<?php echo base_url('/Employees') ?>"><i class="fa fa-user"></i> <span>Employees</span></a>
			</li>
			<li class="<?php echo @$this->session->flashdata('is_roles_selected') ?>">
			  <a href="<?php echo base_url('/Roles') ?>"><i class="fa fa-check"></i> <span>Roles</span></a>
			</li>
		<?php endif; ?>
		
		<?php if(@$this->session->userdata('is_biller')): ?>
			<li class="<?php echo @$this->session->flashdata('is_billing_selected') ?>">
			  <a href="<?php echo base_url('/Billing') ?>"><i class="fa fa-tasks"></i> <span>Billing</span></a>
			</li>
		<?php endif; ?>
		
		<?php if(@$this->session->userdata('is_admin')): ?>
			<li class="<?php echo @$this->session->flashdata('is_icecreams_selected') ?>">
			  <a href="<?php echo base_url('/Icecreams') ?>"><i class="fa fa-child"></i> <span>Icecreams</span></a>
			</li>
			<li class="<?php echo @$this->session->flashdata('is_toppings_selected') ?>">
			  <a href="<?php echo base_url('/Toppings') ?>"><i class="fa fa-star"></i> <span>Toppings</span></a>
			</li>
		<?php endif ?>
		
		
      </ul>
    </section>
  </aside>