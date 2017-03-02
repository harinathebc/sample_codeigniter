<div class="page">
	<div class="panel-body">

			<?php if($this->session->flashdata('emailerror')): ?>
			<div class="bg-warning"><?php echo $this->session->flashdata('emailerror');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('addcus')): ?>
			<div class="bg-warning"><?php echo $this->session->flashdata('addcus');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('addcuserror')): ?>	
			<div class="bg-warning"><?php echo $this->session->flashdata('addcuserror');?></div>
			<?php endif; ?>
			<?php echo validation_errors(); ?>
		<form name ="userinput" action="<?php echo site_url('association/update'); ?>" method="POST">
			<div class="col-sm-6">
				<label class="form-control-label" for="controlname">Control Name (Client name)</label>
				<input type="text" class="form-control" name="controlname" id="controlname" value="<?php echo htmlentities($associationdata['control_name']);?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="accountname">Employer Account Name</label>
				<input type="text" class="form-control" name="employeraccountname" id="employeraccountname" value="<?php echo htmlentities($associationdata['employer_name']);?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="accountnumber">ASG Account Number</label>
				<input type="text" class="form-control" name="asgaccountnumber" id="asgaccountnumber" value="<?php echo htmlentities($associationdata['asg_accountnumber']);?>"required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="effectivedata">Effective Date</label>
				<input type="text" class="form-control"  name="effectivedate" id="effectivedate" value="<?php echo htmlentities($associationdata['effective_date']);?>"required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="golive">Go-Live Date</label>
				<input type="text" class="form-control" name="golivedate" id="golivedate" value="<?php echo htmlentities($associationdata['golive_date']);?>" required="required"/>
			</div>

			<div class="col-sm-6 ">
				<label class="form-control-label" for="submissiontype">Submission Type</label>
				<input type="text" class="form-control" name="submissiontype" id="submissiontype" value="<?php echo htmlentities($associationdata['submission_type']);?>" required="required"/>
			
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="loginmode">Login Mode</label>
				<input type="text" class="form-control" name="loginmode" id="loginmode" value="<?php echo htmlentities($associationdata['login_mode']);?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="Gender">Branding</label>
				<select class="form-control" required="required" name = "branding" id = "branding">
						
						<?php if($associationdata['branding']=="true") {?>
						<option value ="true" selected>True</option> 
						<?php } else {?>
						<option value ="true">True</option>
						<?php }if($associationdata['branding']=="false") {?>
						<option value ="false" selected>False</option>
						<?php }else{ ?>
					<option value ="false">False</option>						
						<?php } ?>						
				</select>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="loginmode">Theme</label>
				<input type="text" class="form-control" name="theme" id="theme" value="<?php echo htmlentities($associationdata['theme']);?>" required="required"/>
			</div>
			
			<div class="col-sm-6">
				<label class="form-control-label" for="code">Registration Code</label>
				<input type="text" class="form-control" name="registrationcode" id="registrationcode" value="<?php echo htmlentities($associationdata['registration_code']);?>" required="required"/>
			</div>

			<div class="col-sm-6">
				<label class="form-control-label" for="url">Remote StyleSheet Url</label>
				<input type="text" class="form-control" name="remotestylesheeturl" id="remotestylesheeturl" value="<?php echo htmlentities($associationdata['remotestylesheeturl']);?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="RequireFullProfile">Require Full Profile</label>
				<select class="form-control" required="required" name = "requirefullprofile" id = "requirefullprofile">
						<?php if($associationdata['requirefullprofile']=="Y") {?>
								<option value="Y" selected>Yes</option>
								<?php }else{ ?>
								<option value="Y" >Yes</option>
								<?php } ?>
								<?php if($associationdata['requirefullprofile']=="N") {?>
								<option value="N" selected>No</option>
								<?php }else{ ?>
								<option value="N" >No</option>
								<?php } ?>						
				</select>
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="RequireFullProfile">Auto Register Eligibility</label>
				<select class="form-control" required="required" name = "autoeligility" id = "autoeligility">
					<?php if($associationdata['autoeligility']=="Y") {?>
					<option value="Y" selected>Yes</option>
					<?php }else{ ?>
				    <option value="Y" >Yes</option>
					<?php } ?>
					<?php if($associationdata['autoeligility']=="N") {?> 
					<option value="N" selected>No</option>
					<?php }else{ ?>
					<option value="N" >No</option>
					<?php } ?>						
				</select>
			</div>
			<div class=" col-sm-6">
				<label class="control-label" for="techemail">Technical Contact Email</label>
				<input type="email" class="form-control" name="supportemail" id="supportemail" autocomplete="off" value="<?php echo htmlentities($associationdata['supportemail']);?>" required="required"/>
			</div>
			<div class=" col-sm-6">
				<label class="control-label" for="supemail">Support Contact Email</label>
				<input type="text" class="form-control"  name="technicalcontactemail" id="technicalcontactemail"  autocomplete="off" value="<?php echo htmlentities($associationdata['technicalemail']);?>" required="required"/>
			</div>
			<div class=" col-sm-12"></div>
			<div class="col-sm-6 form-group">
				<div class="input-group">
				  <button  type="submit" name="submit" class="btn btn-outline btn-primary">Update Profile</button>

				</div>
			</div>
			
		</form>
	</div>
</div>
                          