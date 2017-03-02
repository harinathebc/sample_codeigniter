<div class="page">
 <div class="page-header">
      <h1 class="page-title">Create/Edit Profile</h1>
      <ol class="breadcrumb">
	  <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
	  <?php } else{ ?>
	  <li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>

        <li class="breadcrumb-item active">Company Profile</li>
      </ol>
	
    </div>
	<div class="page-content">

	<div class="panel panel-bordered panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Company Profile</h3>
	</div>
		<div class="panel-body container-fluid">
			<?php //echo '<pre>';print_r($empoyeedata); ?>

			<?php if($this->session->flashdata('emailerror')): ?>
			<div class="bg-warning"><?php echo $this->session->flashdata('emailerror');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('addcus')): ?>
				<div id="alertmessages" class="alert dark alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
				<span class="sr-only">Close</span>
				</button>
				<span id="msg"><?php echo $this->session->flashdata('addcus');?></span>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('addcuserror')): ?>	
			<div class="bg-warning"><?php echo $this->session->flashdata('addcuserror');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('updatemessage')): ?>	
			<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
			<?php endif; ?>
			<?php if(validation_errors()): ?>
				<div id="alertmessages" class="alert dark alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
				<span class="sr-only">Close</span>
				</button>
				<span id="msg"><?php echo validation_errors();?></span>
				</div>
			<?php endif; ?>
		<form name ="userinput" action="<?php echo site_url('user/customerupdate'); ?>" method="POST"  enctype="multipart/form-data">
		<input type="hidden" name="customerid" id="customerid" value="<?php echo htmlentities($empoyeedata['user_id']);?>"/>
		
			
			<!--<div class="col-sm-6 ">
				<label class="form-control-label" for="inputFirstname">Name</label>
				<input type="text" class="form-control" name="name" id="name" value="<?php echo htmlentities($empoyeedata['name']);?>" required="required"/>
			</div> -->
			<div class="col-sm-6">
				<div class="form-group">
				<label for="inputLastName">Company Name</label>
				<input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo htmlentities($empoyeedata['company_name']);?>" required="required"/>
				</div>
				<div class="form-group">
				<label for="inputaddress">Address1</label>
				<input type="text" class="form-control" name="address1" id="address1" value="<?php echo htmlentities($empoyeedata['address1']);?>" required="required"/>
				</div>
				<div class="form-group">
				<label for="address">Address2</label>
				<input type="text" class="form-control" name="address2" id="address2" value="<?php echo htmlentities($empoyeedata['address2']);?>" required="required"/>
				</div>
				<div class="form-group">
				<label for="city">City</label>
				<input type="text" class="form-control" name="city" id="city" value="<?php echo htmlentities($empoyeedata['city']);?>" required="required"/>
				</div>
				<div class="form-group">
				<label class="control-label" for="state">State</label>
				<select  class="form-control" name="state" id="state" value="<?php echo set_value('state');?>" required="required"/>
						<?php
						$states = array('AK'=>'Alaska', 'HI'=>'Hawaii', 'CA'=>'California', 'NV'=>'Nevada', 'OR'=>'Oregon', 'WA'=>'Washington', 'AZ'=>'Arizona', 'CO'=>'Colorada', 'ID'=>'Idaho', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NM'=>'New Mexico', 'ND'=>'North Dakota', 'UT'=>'Utah', 'WY'=>'Wyoming', 'AL'=>'Alabama', 'AR'=>'Arkansas', 'IL'=>'Illinois', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'OK'=>'Oklahoma', 'SD'=>'South Dakota', 'TX'=>'Texas', 'TN'=>'Tennessee', 'WI'=>'Wisconsin', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'FL'=>'Florida', 'GA'=>'Georgia', 'IN'=>'Indiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NY'=>'New York', 'NC'=>'North Carolina', 'OH'=>'Ohio', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WV'=>'West Virginia');
						foreach($states as $abbrev => $name){
						echo "<option value='".$abbrev."'";
						if($name == $empoyeedata['state'] || $abbrev == $empoyeedata['state']){
						echo " selected='selected'";
						}
						echo ">".$name."</option>";
						} ?>
				</select>
					</div>
					<!--<div class="col-sm-6">
				<label class="control-label" for="Country">Country</label>
				<select class="form-control" name="country" id="country" value="<?php echo set_value('country');?>" required="required"/>
					<?php
						$country = array('US'=>'USA');
							foreach($country as $abbrev => $name){
							echo "<option value='".$abbrev."'";
							if($name == $empoyeedata['country'] || $abbrev == $empoyeedata['country']){
							echo " selected='selected'";
							}
							echo ">".$name."</option>";
							} ?> 
					</select>
			</div> -->
		      <div class="form-group">
				<label class="form-control-label" for="zipcode">Zip Code</label>
				<input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo htmlentities($empoyeedata['zipcode']);?>" required="required"/>
				</div>
			</div>
		
			<!--<div class="col-sm-6">
				<label class="form-control-label" for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" autocomplete="off" value="<?php echo htmlentities($empoyeedata['email']);?>" readonly="readonly"  required="required"/>
			</div> -->
			<div class=" col-sm-6 ">
				<div class="form-group">
				<label class="control-label" for="phone">Phone Number</label>
				<input type="text" class="form-control" maxlength="14" name="phone" id="phone" value="<?php echo htmlentities($empoyeedata['phone']);?>" required="required"/>
				</div>
				<div class="form-group">
				<label class="control-label" for="fax">Fax Number</label>
				<input type="text" class="form-control"  maxlength="14" name="fax" id="fax" value="<?php echo htmlentities($empoyeedata['fax']);?>" required="required"/>
				</div>
					
			
			<div class="form-group">
			<label class="control-label" for="Gender">Company Logo</label>
                  <div class="input-group input-group-file">
                    <!--<input type="file"  class="btn btn-file" name="company_logo" id="company_logo" readonly="">-->
                    <span class="input-group-btn">
                      <span class="btn btn-success btn-file">
                        <i class="icon wb-upload" aria-hidden="true"></i>
                        <input type="file" class="form-control" name="company_logo" id="company_logo">
                      </span>
                    </span>
                  </div>
				  	<span style="font-style:italic;font-size:13px;"><b>Note:</b> Logo dimensions should be 250X160 will be preferred for better quality.</span>
                </div>
			
			<div class="form-group">
				<?php if($empoyeedata['company_logo']!=''){ ?>

				<img class="m-r-10" height="60" width="237" src="<?php echo base_url('assets/photos/'.$empoyeedata['company_logo']);?>" alt="OnDefend">
				<?php } else { ?>
				<!--<label class="control-label" for="Logo">Upload Logo</label>Default Dimensions</label>
				<img class="m-r-10" src="<?php echo base_url('assets/images/logo-mbl.png');?>" alt="OnDefend" />-->
				<?php } ?>
			</div>
		
			
			</div>
		
			
			

			
			<!--<div class="col-sm-6 form-group">
				<label class="control-label" for="DOB">Date of Birth (YYYY/MM/DD)</label>
				<div class="input-group">
					<span class="input-group-addon">
					<i class="icon wb-calendar" aria-hidden="true"></i>
					</span>
					<input type="text"  maxlength="10"   class="form-control patientdateofbirth" name="dob" id="dob" value="<?php echo htmlentities($empoyeedata['birthday']);?>" placeholder="YYYY/MM/DD" required="required"/>
				</div>
			</div> -->
			<div class="col-sm-12 form-group">
				<div class="input-group">
				  <button type="submit" name="submit" class="btn btn-outline btn-primary">Update Company Details</button>

				</div>
			</div>
			
		</form>

</div>
</div>
	</div>
</div>
                          
