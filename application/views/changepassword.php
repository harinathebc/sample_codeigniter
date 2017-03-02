  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">

<div class="page">
    
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
				<?php if($this->session->flashdata('updatpassword')): ?>
				<div class="bg-success"><?php echo $this->session->flashdata('updatpassword');?></div>
				<?php endif; ?>
				<?php if($this->session->flashdata('matchpassworderror')): ?>
				<div class="bg-warning"><?php echo $this->session->flashdata('matchpassworderror');?></div>
				<?php endif; ?>
				<?php if($this->session->flashdata('currentpassworderror')): ?>
				<div class="bg-warning"><?php echo $this->session->flashdata('currentpassworderror');?></div>
				<?php endif; ?>
				<?php $userdat=$this->session->userdata('userdetails');?>
				<?php echo validation_errors(); ?> 
		<form id="setPasswordForm" name="setPasswordForm" method="POST" action="<?php echo site_url('user/changepasswordpost')?>">
		   <input type="hidden"  id="cusid" name="cusid"  value="<?php echo $userdat['cust_id'];?>"/>
		   <input type="hidden"  id="email" name="email"  value="<?php echo $userdat['email'];?>"/>
		   
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="Password" class="form-control" id="currentpassword" name="currentpassword"  autocomplete="off" placeholder="crrrent password"  value="<?php echo set_value('currentpassword');?>" required="required"/>
              <label class="floating-label">Current Password</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control"id="newpassword" name="newpassword" autocomplete="off" placeholder="Password" value="<?php echo set_value('newpassword');?>" required="required"/>
              <label class="floating-label">New Password</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control" id="conformpassword" name="conformpassword" autocomplete="off" placeholder="Confirm Password" value="<?php echo set_value('conformpassword');?>" required="required"/>
              <label class="floating-label"> Conform Password</label>
            </div>
           
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg m-t-40">Submit</button>
          </form>
        </div>
      </div>
   
    </div>
</div>
</div>
