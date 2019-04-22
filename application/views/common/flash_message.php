
<?php
if(
	$this->session->flashdata('success_flash_message') ||
	$this->session->flashdata('error_flash_message') ||
	$this->session->flashdata('warning_flash_message') ||
	$this->session->flashdata('info_flash_message')
):
?>

<div class="row">
        <div class="col-md-12">
            <div class="box-body">
              
			  <?php if($this->session->flashdata('error_flash_message')): ?>
				  <div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Error!</h4>
					<?php echo $this->session->flashdata('error_flash_message'); ?>
				  </div>
			  <?php endif; ?>
              
			  <?php if($this->session->flashdata('info_flash_message')): ?>
				  <div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-info"></i> Info!</h4>
					<?php echo $this->session->flashdata('info_flash_message'); ?>
				  </div>
			  <?php endif; ?>
              
			  <?php if($this->session->flashdata('warning_flash_message')): ?>
				  <div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Warning!</h4>
					<?php echo $this->session->flashdata('warning_flash_message'); ?>
				  </div>
			  <?php endif; ?>
              
			  <?php if($this->session->flashdata('success_flash_message')): ?>
				  <div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					<?php echo $this->session->flashdata('success_flash_message'); ?>
				  </div>
			  <?php endif; ?>
			  
            </div>
          </div>
      </div>
	  
<?php endif; ?>