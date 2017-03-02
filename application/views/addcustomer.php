<div class="page">
	<div class="panel-body">
			<?php //echo '<pre>';print_r($groupcustomers); ?>

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
		<form name ="userinput" action="<?php echo site_url('user/addpost'); ?>" method="POST">
			<div class="col-sm-6">
				<label class="form-control-label" for="inputUserName">Username</label>
				<input type="text" class="form-control" name="username" id="username"  autocomplete="off" value="<?php echo set_value('username');?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="inputPassword">Password</label>
				<input type="text" class="form-control" name="password" id="password" value="" autocomplete="off" value="<?php echo set_value('password');?>" required="required"/>
			</div>
			<div class="col-sm-6 ">
				<label class="form-control-label" for="inputFirstname">First Name</label>
				<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo set_value('firstname');?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="inputLastName">Last Name</label>
				<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo set_value('lastname');?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="inputaddress">Address1</label>
				<input type="text" class="form-control" name="address1" id="address1" value="<?php echo set_value('address1');?>" required="required"/>
			</div>

			<div class="col-sm-6 ">
				<label class="form-control-label" for="address">Address2</label>
				<input type="text" class="form-control" name="address2" id="address2" value="<?php echo set_value('address2');?>" required="required"/>
			
			</div>
			<div class="col-sm-6">
				<label class="form-control-label" for="city">City</label>
				<input type="text" class="form-control" name="city" id="city" value="<?php echo set_value('city');?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="state">State</label>
				<select  class="form-control" name="state" id="state" value="<?php echo set_value('state');?>" required="required"/>
							<?php
							$states = array('AK'=>'Alaska', 'HI'=>'Hawaii', 'CA'=>'California', 'NV'=>'Nevada', 'OR'=>'Oregon', 'WA'=>'Washington', 'AZ'=>'Arizona', 'CO'=>'Colorada', 'ID'=>'Idaho', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NM'=>'New Mexico', 'ND'=>'North Dakota', 'UT'=>'Utah', 'WY'=>'Wyoming', 'AL'=>'Alabama', 'AR'=>'Arkansas', 'IL'=>'Illinois', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'OK'=>'Oklahoma', 'SD'=>'South Dakota', 'TX'=>'Texas', 'TN'=>'Tennessee', 'WI'=>'Wisconsin', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'FL'=>'Florida', 'GA'=>'Georgia', 'IN'=>'Indiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NY'=>'New York', 'NC'=>'North Carolina', 'OH'=>'Ohio', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WV'=>'West Virginia');
							foreach($states as $abbrev => $name){
							echo "<option value='".$abbrev."' selected='selected'";echo ">".$name."</option>";
							} ?> 
				</select>
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="Country">Country</label>
				<select class="form-control" name="country" id="country" value="<?php echo set_value('country');?>" required="required"/>
					<?php
					$states = array('US'=>'USA');
					foreach($states as $abbrev => $name){
					echo "<option value='".$abbrev."' selected='selected'";echo ">".$name."</option>";
					} ?> 
					</select>
			</div>
			
			<div class="col-sm-6">
				<label class="form-control-label" for="zipcode">Zip Code</label>
				<input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo set_value('zipcode');?>" required="required"/>
			</div>

			<div class="col-sm-6">
				<label class="form-control-label" for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" autocomplete="off" value="<?php echo set_value('email');?>" required="required"/>
			</div>
			<div class=" col-sm-6">
				<label class="control-label" for="phone">Phone</label>
				<input type="text" class="form-control" maxlength="14" name="phone" id="phone" value="<?php echo set_value('phone');?>" required="required"/>
			</div>
			<div class=" col-sm-6">
				<label class="control-label" for="CellPh">Work Phone</label>
				<input type="text" class="form-control" maxlength="14" name="workphone" id="workphone" value="<?php echo set_value('workphone');?>" required="required"/>
			</div>
			<div class=" col-sm-6">
				<label class="control-label" for="cell">Cell Phone</label>
				<input type="text" class="form-control"  maxlength="14" name="cellphone" id="cellphone" value="<?php echo set_value('cellphone');?>" required="required"/>
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="Gender">Gender</label>
				<select class="form-control" required="required" name = "gender" id = "gender">
					<?php $gender = array('F'=>'Female','M'=>'Male'); ?>
					<?php foreach($gender as $Key=>$status):
							$selected ='selected=selected';
					
							 ?>
						<option value = "<?php echo $Key;?>" <?php echo $selected;?>><?php echo $status;?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-sm-6 form-group">
				<label class="control-label" for="DOB">Date of Birth (YYYY/MM/DD)</label>
				<div class="input-group">
					<span class="input-group-addon">
					<i class="icon wb-calendar" aria-hidden="true"></i>
					</span>
					<input type="text" value="" data-pattern="datepicker" maxlength="10"  class="form-control patientdateofbirth" name="dob" id="dob" value="<?php echo set_value('dob');?>" placeholder="YYYY/MM/DD" required="required"/>
				</div>
			</div>
			<div class="col-sm-6 form-group">
				<div class="input-group">
				  <button type="submit" name="submit" class="btn btn-outline btn-primary">Add Employee</button>

				</div>
			</div>
			
		</form>
	</div>
</div>
                          