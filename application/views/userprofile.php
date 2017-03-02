
<div class="page">
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-xs-12 col-lg-3">
          <!-- Page Widget -->
          <div class="card card-shadow text-xs-center">
            <div class="card-block">
              <a class="avatar avatar-lg" href="javascript:void(0)">
                <img src="<?php echo site_url('assets/portraits/5.jpg'); ?>">
              </a>
              <h4 class="profile-user">Terrance arnold</h4>
           </div>
             </div>
          <!-- End Page Widget -->
        </div>
        <div class="col-xs-12 col-lg-9">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
              <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                  <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#profile" aria-controls="profile"
                  role="tab">Profile</a></li>
			</ul>
			 <?php //echo '<pre>';print_r($userdetails);exit; ?>
			 <?php if($this->session->flashdata('perimisionserror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('perimisionserror');?></div>
					<?php endif; ?>
					
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="profile" role="tabpanel">
				<div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
				<h4 style="margin-top:10px;">General Information</h4>
				<p> User Name:&nbsp;&nbsp;<b><?php echo htmlentities($userdetails['username']);?></b></p>
				<p> First Name:&nbsp;&nbsp;<b><?php echo htmlentities($userdetails['firstname']);?></b></p>
				<p> Last Name:&nbsp;&nbsp;<b><?php echo htmlentities($userdetails['lastname']);?></b></p>
				<p> Date of Birth:&nbsp;&nbsp;<b> <?php echo htmlentities($userdetails['birthday']);?></b></p>
				<p> Email Address:&nbsp;&nbsp;<b> <?php echo htmlentities($userdetails['email']);?></b></p>
				<p> Contact Number:&nbsp;&nbsp;<b> <?php echo htmlentities($userdetails['phone']);?></b></p>
				<p> Gender:&nbsp;&nbsp;<b> <?php if(htmlentities($userdetails['work_phone'])=='M'){ echo "Male";}else{echo "Female";}?></b></p>
				<p> Workphone:&nbsp;&nbsp;<b> <?php echo htmlentities($userdetails['work_phone']);?></b></p>
				<p> Cellphone:&nbsp;&nbsp;<b> <?php echo htmlentities($userdetails['cell_phone']);?></b></p>
				</div>
				<div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
				<h4 style="margin-top:10px;">Billing Address</h4>
				<address>
                  <strong><?php echo htmlentities($userdetails['address1']);?>,<?php echo htmlentities($userdetails['address2']);?></strong>
                  <br> <?php echo htmlentities($userdetails['city']);?>,<?php echo htmlentities($userdetails['state']);?>
                  <br> <?php echo htmlentities($userdetails['country']);?>, <?php echo htmlentities($userdetails['zipcode']);?>
				 <abbr title="Phone">P:</abbr> <?php echo htmlentities($userdetails['phone']);?>
                </address>
				</div>
				</div>
				</div>
				</div>
              </div>
			  <div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
					<a class="btn btn-outline btn-primary" href="<?php echo base_url('user/edit'); ?>?id=<?php echo  base64_encode($userdetails['cust_id']);?>" style="text-decoration:none;">Edit Profile</a>
				</div>
				</div>
            </div>
	
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
  </div>
