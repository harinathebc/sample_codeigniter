
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
                  <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="<?php echo site_url('user/dashboard'); ?>" aria-controls="profile"
                  role="tab">Association Profile</a></li>
			</ul>
			 <?php //echo '<pre>';print_r($associationdata);exit; ?>
			 <?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('perimisionserror');?></div>
					<?php endif; ?>
					 <?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
					<?php endif; ?>
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="profile" role="tabpanel">
				<div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
				<h4 style="margin-top:10px;">Association Information</h4>
				<p> Control Name (Client name):&nbsp;&nbsp;<b><?php echo htmlentities($associationdata['control_name']);?></b></p>
				<p> Employer Account Name:&nbsp;&nbsp;<b><?php echo htmlentities($associationdata['employer_name']);?></b></p>
				<p> ASG Account Number:&nbsp;&nbsp;<b><?php echo htmlentities($associationdata['asg_accountnumber']);?></b></p>
				<p> Effective Date: &nbsp;&nbsp;<b><?php echo htmlentities($associationdata['effective_date']);?></b></p>
				<p> Go-Live Date: &nbsp;&nbsp;<b><?php echo htmlentities($associationdata['golive_date']);?></b></p>
				<p> Submission Type:&nbsp;&nbsp;<b> <?php echo htmlentities($associationdata['submission_type']);?></b></p>
				<p> Login Mode: &nbsp;&nbsp;<b><?php echo htmlentities($associationdata['login_mode']);?></b></p>

				</div>
				<div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
				<address>
				<p> Branding: &nbsp;&nbsp;<b><?php echo htmlentities($associationdata['branding']);?></b></p>
				<p> Theme: &nbsp;&nbsp;<b><?php echo htmlentities($associationdata['theme']);?></b></p>
				<p> Registration Code:&nbsp;&nbsp;<b> <?php echo htmlentities($associationdata['registration_code']);?></b></p>
				<p> Remote StyleSheet Url: &nbsp;&nbsp;<b><?php echo htmlentities($associationdata['remotestylesheeturl']);?></b></p>
				<p> Require Full Profile: &nbsp;&nbsp;<b><?php if(htmlentities($associationdata['requirefullprofile'])=='Y'){echo "Yes";}else{echo "No";};?></b></p>
				<p> Auto Register Eligibility:&nbsp;&nbsp;<b> <?php if(htmlentities($associationdata['autoeligility'])=='Y'){echo "Yes";}else{echo "No";};?></b></p>
				<p> Technical Contact Email:&nbsp;&nbsp;<b> <?php echo htmlentities($associationdata['technicalemail']);?></p>
				<p> Support Contact Email:&nbsp;&nbsp;<b> <?php echo htmlentities($associationdata['supportemail']);?></b></p>
				</address>
				</div>
				</div>
				</div>
				</div>
              </div>
			  <div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
					<a class="btn btn-outline btn-primary" href="<?php echo base_url('association/editprofile'); ?>?id=<?php echo  base64_encode($associationdata['association_id']);?>" style="text-decoration:none;">Edit Profile</a>
				</div>
				</div>
			 </div>
	
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
  </div>
