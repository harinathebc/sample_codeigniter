
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
                  role="tab">Group Profile</a></li>
			</ul>
			 <?php //echo '<pre>';print_r($groupprofiledata);exit; ?>
			 <?php if($this->session->flashdata('perimisionserror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('perimisionserror');?></div>
					<?php endif; ?>
					
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="profile" role="tabpanel">
				<div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
				<h4 style="margin-top:10px;">General Information</h4>
				<p> Group Name:<b><?php echo htmlentities($groupprofiledata['group_name']);?></b></p>
				<p> OrganizationID:<b><?php echo htmlentities($groupprofiledata['organization_id']);?></b></p>
				<p> DisplayName:<b><?php echo htmlentities($groupprofiledata['displayname']);?></b></p>
				<p> Description: <b><?php echo htmlentities($groupprofiledata['description']);?></b></p>
				<p> Notes: <b><?php echo htmlentities($groupprofiledata['notes']);?></b></p>
				<p> Account number: <b><?php echo htmlentities($groupprofiledata['account_number']);?></b></p>
				<p> Language: <b><?php echo htmlentities($groupprofiledata['language']);?></p>
				<p> Support Contact Email: <b><?php echo htmlentities($groupprofiledata['support_email']);?></b></p>
				<p> Technical Contact Email: <b><?php echo htmlentities($groupprofiledata['contact_email']);?></b></p>
				</div>
				</div>
				</div>
              </div>
			  <div class="row row-lg">
				<div class="col-xs-12 col-lg-6">
					<a class="btn btn-outline btn-primary" href="<?php echo base_url('group/groupedit'); ?>?id=<?php echo  base64_encode($groupprofiledata['group_id']);?>" style="text-decoration:none;">Edit Group Profile</a>
				</div>
				</div>
            </div>
	
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
  </div>
