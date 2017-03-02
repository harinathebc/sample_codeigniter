
<section  id="services-sec">
        <div class="container">
            
                <div class="row go-marg">
                 <?php //echo '<pre>';print_r($groupprofiledata);exit; ?>
                  
              <div class="col-md-12">
				<div style="color:red;"><?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('updateerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('updateerror');?></div>
					<?php endif; ?>
				</div>
				<?php echo validation_errors(); ?>
				<form name ="userinput" action="<?php echo site_url('association/profilepost'); ?>" method="POST">
					<div class="col-md-6 col-sm-6 alert-info">
						<input type="hidden" name="customerid" id="customerid" value="<?php echo htmlentities($groupprofiledata['cust_id']);?>"/>
						<input type="hidden" name="group_id" id="group_id" value="<?php echo htmlentities($groupprofiledata['group_id']);?>"/>
                        <div class="col-md-12">
							Username<input type="text" name="username" id="username" value="<?php echo htmlentities($groupprofiledata['username']);?>"  required="required"/>
						</div>
						
						<div class="col-md-12">
							FirstName<input type="text" name="firstname" id="firstname" value="<?php echo htmlentities($groupprofiledata['firstname']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							LastName:<input type="text" name="lastname" id="lastname" value="<?php echo htmlentities($groupprofiledata['lastname']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							Address1:<input type="text" name="address1" id="address1" value="<?php echo htmlentities($groupprofiledata['address1']);?>" required="required"/>
						</div>
						
						<div class="col-md-12">
							Address2:<input type="text" name="address2" id="address2" value="<?php echo htmlentities($groupprofiledata['address2']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							City:<input type="text" name="city" id="city" value="<?php echo htmlentities($groupprofiledata['city']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							State:<select  name="state" id="state" required="required"/>
						<?php
						$states = array('AK'=>'Alaska', 'HI'=>'Hawaii', 'CA'=>'California', 'NV'=>'Nevada', 'OR'=>'Oregon', 'WA'=>'Washington', 'AZ'=>'Arizona', 'CO'=>'Colorada', 'ID'=>'Idaho', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NM'=>'New Mexico', 'ND'=>'North Dakota', 'UT'=>'Utah', 'WY'=>'Wyoming', 'AL'=>'Alabama', 'AR'=>'Arkansas', 'IL'=>'Illinois', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'OK'=>'Oklahoma', 'SD'=>'South Dakota', 'TX'=>'Texas', 'TN'=>'Tennessee', 'WI'=>'Wisconsin', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'FL'=>'Florida', 'GA'=>'Georgia', 'IN'=>'Indiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NY'=>'New York', 'NC'=>'North Carolina', 'OH'=>'Ohio', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WV'=>'West Virginia');
						foreach($states as $abbrev => $name){
						echo "<option value='".$abbrev."'";
						if($name == $groupprofiledata['state'] || $abbrev == $groupprofiledata['state']){
						echo " selected='selected'";
						}
						echo ">".$name."</option>";
						} ?> 
							</select>						
						</div>
						<div class="col-md-12">
							Country:<select name="country" id="country" required="required"/>
							<?php
							$country = array('US'=>'USA');
							foreach($country as $abbrev => $name){
							echo "<option value='".$abbrev."'";
							if($name == $groupprofiledata['country'] || $abbrev == $groupprofiledata['country']){
							echo " selected='selected'";
							}
							echo ">".$name."</option>";
							} ?> 
							</select>	</div>
						<div class="col-md-12">
							Zip:<input type="text" name="zipcode" id="zipcode" value="<?php echo htmlentities($groupprofiledata['zipcode']);?>" required="required"/>
						</div>
						
						<div class="col-md-12">
							Email:<input type="text" name="email" id="email" value="<?php echo htmlentities($groupprofiledata['email']);?>" readonly="readonly" required="required"/>
						</div>
						<div class="col-md-12">
							phone:<input type="text" name="phone" id="phone" value="<?php echo htmlentities($groupprofiledata['phone']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							Workphone:<input type="text" name="workphone" id="workphone" value="<?php echo htmlentities($groupprofiledata['work_phone']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							Cellphone:<input type="text" name="cellphone" id="cellphone" value="<?php echo htmlentities($groupprofiledata['cell_phone']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							Gender:
								<?php if($groupprofiledata['gender']=="M") {?>
								<input type="radio" name="gender" value="M" checked="checked">MALE
								<?php }else{ ?>
								<input type="radio" name="gender" value="M" >MALE
								<?php } ?>
								<?php if($groupprofiledata['gender']=="F") {?> 
								<input type="radio" name="gender" value="F" checked="checked">FEMALE
								<?php }else{ ?>
								<input type="radio" name="gender" value="F" >FEMALE
								<?php } ?>
						</div>
						<div class="col-md-12">
							Date of Birth:<input type="text" name="dob" id="dob" value="<?php echo htmlentities($groupprofiledata['birthday']);?>" required="required"/>
						</div>
					</div>
					<div class="col-md-12">	
					<input type="submit" name="submit" value="Update"/> 
					</div> 
			</form>					
                    </div> 
                            
                    </div>
                </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
