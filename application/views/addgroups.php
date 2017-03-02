 <section  id="services-sec">
        <div class="container">
					<?php if($this->session->flashdata('sucessmessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('sucessmessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('createerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('createerror');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('emailerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('emailerror');?></div>
					<?php endif; ?>
            <div class="row ">
                <div class="text-center g-pad-bottom">
				<form name ="userinput" action="<?php echo site_url('association/groupadd'); ?>" method="POST">
					<?php echo validation_errors(); ?>
			<div class="col-md-12 col-sm-12">
				<div class="col-md-6 col-sm-6 alert-info">
                        <h4>Account/Group </h4>
						<div class="col-md-12">
							OrganizationID<input type="text" name="organizationid" id="organizationid" value="<?php echo set_value('organizationid');?>" required="required"/>
						</div>
						<div class="col-md-12">
							Name<input type="text" name="groupname" id="groupname" value="<?php echo set_value('groupname');?>" required="required"/>
						</div>
						<div class="col-md-12">
							DisplayName<input type="text" name="displayname" id="displayname" value="<?php echo set_value('displayname');?>" required="required"/>
						</div>
						<div class="col-md-12">
						Description<textarea rows="1" cols="12" name="description"  required="required"/><?php echo set_value('description');?></textarea>
						</div>
						<div class="col-md-12">
							Notes<textarea rows="1" cols="12" name="notes" required="required"/></textarea>
						</div>
						<div class="col-md-12">
							Account number<input type="text" name="accountnumber" id="accountnumber" />
						</div>
						<div class="col-md-12">
						Language<input type="text" name="language" id="language" required="required" required="required"/>
						</div>
						
						<div class="col-md-12">
							SupportContactEmail<input type="text" name="supportemail" id="supportemail" autocomplete="off"  value="<?php echo set_value('supportemail');?>" required="required"/>
						</div>
						<div class="col-md-12">
							TechnicalContactEmail<input type="text" name="technicalcontactemail" id="technicalcontactemail"  autocomplete="off" value="<?php echo set_value('technicalcontactemail');?>" required="required"/>
						</div>
						
					</div>
                    <div class="col-md-6 col-sm-6 alert-success">
						<h4>Login Purpose</h4>
						<div class="col-md-12">
							FirstName<input type="text" name="firstname" id="firstname" required="required"/>
						</div>
						<div class="col-md-12">
							LastName:<input type="text" name="lastname" id="lastname" required="required"/>
						</div>
						
						<div class="col-md-12">
							Email:<input type="text" name="email" id="email" required="required"/>
						</div>
						<div class="col-md-12">
							Password:<input type="password" name="password" id="password" required="required"/>
						</div>
						<div class="col-md-12">
							Gender:<input type="radio" name="gender" value="M">MALE
							<input type="radio" name="gender" value="F">FEMALE
						</div>
                           
                    </div>
					
					<input type="submit" name="submit" value="submit"/> 
					</div>
				</form> 
                   
                </div>
                  </div>
                
          
        </div>
    </section>
    <!--END HOME SECTION-->
  
    
