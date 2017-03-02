<div class="page">
	<div class="panel-body">
			<?php //echo '<pre>';print_r($groupprofile); ?>

			<div><?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('updateerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('updateerror');?></div>
					<?php endif; ?>
				</div>
			<?php echo validation_errors(); ?>
			<form name ="userinput" action="<?php echo site_url('group/update'); ?>" method="POST">
			<input type="hidden" name="groupid" id="groupid" value="<?php echo htmlentities($groupprofile['group_id']);?>" />

			<div class="col-sm-6">
				<label class="form-control-label" for="inputUserName">Group Name</label>
				<input type="text" class="form-control" name="groupname" id="groupname" value="<?php echo htmlentities($groupprofile['group_name']);?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="inputPassword">Organization ID</label>
				<input type="text" class="form-control" name="organizationid" id="organizationid" value="<?php echo htmlentities($groupprofile['organization_id']);?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="inputFirstname">Display Name</label>
				<input type="text" class="form-control" name="displayname" id="displayname" value="<?php echo htmlentities($groupprofile['displayname']);?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="inputLastName">Description</label>
				<input type="text" class="form-control" name="description" id="description" value="<?php echo htmlentities($groupprofile['description']);?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="inputaddress">Notes</label>
				<input type="text" class="form-control" name="notes" id="notes" value="<?php echo htmlentities($groupprofile['notes']);?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="address">Account number</label>
				<input type="text" class="form-control" name="accountnumber" id="accountnumber" value="<?php echo htmlentities($groupprofile['account_number']);?>" required="required"/>
			
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="city">Language</label>
				<input type="text" class="form-control" name="language" id="language" value="<?php echo htmlentities($groupprofile['language']);?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="city">Support Contact Email</label>
				<input type="text" class="form-control" name="supportemail" id="supportemail" value="<?php echo htmlentities($groupprofile['support_email']);?>" required="required"/>
			</div>
			
				<div class="col-sm-6">
				<label class="form-control-label" for="city">Technical Contact Email</label>
				<input type="text" class="form-control" name="technicalcontactemail" id="technicalcontactemail" value="<?php echo htmlentities($groupprofile['contact_email']);?>" />
			</div>
			
			<div class="col-sm-12">
				<label class="form-control-label" for="city"></label>
				<input type="hidden" class="form-control"/>
			</div>
			<div class="col-sm-6 form-group">
            
            <div class=""><button type="submit" name="submit" class="btn btn-outline btn-primary">Update Group profile</button></div>
          </div>
		
		</form>
	</div>
</div>
                          