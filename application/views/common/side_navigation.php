 <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/bootstrap/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo @$this->session->userdata('user_name') ?></p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
		<li class="<?php echo @$this->session->flashdata('is_home_selected') ?> ">
          <a href="<?php echo base_url('/Welcome') ?>"><i class="fa fa-home"></i> <span>Home</span></a>
        </li>
		
		
		<li class="<?php echo @$this->session->flashdata('is_shops_selected') ?>">
          <a href="<?php echo base_url('/Shops') ?>"><i class="fa fa-building"></i> <span>Shops</span></a>
        </li>
		
		<li class="<?php echo @$this->session->flashdata('is_items_selected') ?>">
          <a href="<?php echo base_url('/Items') ?>"><i class="fa fa-home"></i> <span>Items</span></a>
        </li>
      </ul>
    </section>
  </aside>