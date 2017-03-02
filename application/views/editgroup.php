
     <!--END NAV SECTION -->
    <section  id="services-sec">
        <div class="container">
            
                <div class="row go-marg">
                 <?php //echo '<pre>';print_r($groupdata); ?>
                  
              <div class="col-md-12">
				<div style="color:red;"><?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('updateerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('updateerror');?></div>
					<?php endif; ?>
				</div>
				<?php echo validation_errors(); ?>
				<form name ="userinput" action="<?php echo site_url('association/groupupdate'); ?>?id=<?php echo base64_encode($groupdata['group_id']);?>" method="POST">
					<div class="col-md-6 col-sm-6 alert-info">
						<input type="hidden" name="groupid" id="groupid" value="<?php echo htmlentities($groupdata['group_id']);?>" />
                        <h4>Account/Group </h4>
						<div class="col-md-12">
							OrganizationID<input type="text" name="organizationid" id="organizationid" value="<?php echo htmlentities($groupdata['organization_id']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							Name<input type="text" name="groupname" id="groupname" value="<?php echo htmlentities($groupdata['group_name']);?>" />
						</div>
						<div class="col-md-12">
							DisplayName<input type="text" name="displayname" id="displayname" value="<?php echo htmlentities($groupdata['displayname']);?>" required="required"/>
						</div>
						<div class="col-md-12">
						Description<textarea rows="1" cols="12" name="description" required="required"><?php echo htmlentities($groupdata['description']);?></textarea>
						</div>
						<div class="col-md-12">
							Notes<textarea rows="1" cols="12" name="notes" required="required"><?php echo htmlentities($groupdata['notes']);?></textarea>
						</div>
						<div class="col-md-12">
							Account number<input type="text" name="accountnumber" id="accountnumber" value="<?php echo htmlentities($groupdata['account_number']);?>"  required="required"/>
						</div>
						<div class="col-md-12">
						Language<input type="text" name="language" id="language" value="<?php echo htmlentities($groupdata['language']);?>" required="required"/>
						</div>
						
						<div class="col-md-12">
							SupportContactEmail<input type="text" name="supportemail" id="supportemail" value="<?php echo htmlentities($groupdata['support_email']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							TechnicalContactEmail<input type="text" name="technicalcontactemail" id="technicalcontactemail" value="<?php echo htmlentities($groupdata['contact_email']);?>" required="required"/>
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
  
    
