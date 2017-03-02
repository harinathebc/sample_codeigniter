  <!-- Page -->
  <div class="page">
    <div class="page-header">
	<h1 class="page-title">Training</h1>
     <ol class="breadcrumb">
         <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('/user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('/user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item active">Training Information</li>
      </ol>
      
    </div>
    <div class="page-content blue-grey-500"">
         
          <!-- Panel -->
        <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="masonry">
        <li class="masonry-item">
          <div class="card card-shadow">
            <div class="card-header cover">
              <img class="cover-image" src="../assets/photos/startup.jpg" alt="Security Industry">
            </div>
            <div class="card-block">
              <h3 class="card-title">Cyber Security Market</h3>
               <p class="card-text">Learn about the market and your clients cyber security risks.</p>
            </div>
            <div class="card-block">
               <a role="button" target="_blank" class="btn btn-outline btn-primary card-link" href="<?php echo base_url();?>assets/photos/CSM.pdf" >View Info</a>
            </div>
          </div>
        </li>
		
		 <li class="masonry-item">
          <div class="card card-shadow">
            <div class="card-header cover">
              <img class="cover-image" src="../assets/photos/services.jpg" alt="...">
            </div>
            <div class="card-block">
              <h3 class="card-title">Security Services Overview</h3>
              <p class="card-text">Understand the preventative security testing services that we offer.</p>
            </div>
            <div class="card-block">
                   <a role="button" target="_blank" class="btn btn-outline btn-primary" href="<?php echo base_url();?>assets/photos/OSO.pdf" >View Info</a>
            </div>
          </div>
        </li>
		 <li class="masonry-item">
          <div class="card card-shadow">
            <div class="card-header cover">
              <img class="cover-image" src="<?php echo base_url();?>assets/photos/WhyUs.jpg" alt="...">
            </div>
            <div class="card-block">
              <h3 class="card-title">Why Us</h3>
              <p class="card-text">Find out why our security services are unique and necessary for your clients protection.</p>
            </div>
            <div class="card-block">
              
              <a role="button" target="_blank" class="btn btn-outline btn-primary" href="<?php echo base_url();?>assets/photos/WhyUs.pdf" >View Info</a>
            </div>
          </div>
        </li>
			<li class="masonry-item">
          <div class="card card-shadow">
            <div class="card-header cover">
              <img class="cover-image" src="../assets/photos/strategy.jpg" alt="...">
            </div>
            <div class="card-block">
              <h3 class="card-title">Client Types & Strategies</h3>
             <p class="card-text">Your client’s size, their needs and our security service strategy.</p>
            </div>
            <div class="card-block">
              
              <a role="button" target="_blank" class="btn btn-outline btn-primary card-link" href="<?php echo base_url();?>assets/photos/CTS.pdf" >View Info</a>
            </div>
          </div>
        </li>
        
		</ul>
       
    </div>
  </div>
  <!-- End Page -->

