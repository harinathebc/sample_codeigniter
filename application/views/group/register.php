
  
  <!-- Page -->
  <div class="page">
    <div class="page-content container-fluid">
      <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xs-12 col-lg-12 col-md-12">
          <!-- Panel Wizard Form -->
          <div class="panel" id="exampleWizardForm">
            <div class="panel-heading">
              <h3 class="panel-title">Employer Registration
			  <span class="panel-desc"><b>Please follow the steps below to set up the MyEWellness<b> benefit</span></h3>
            </div>
            <div class="panel-body">
              <!-- Steps -->
              <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
			    <div class="step col-xs-12 col-lg-2 current" data-target="#examplecontent" role="tab">
                  <span class="step-number">1</span>
                  <div class="step-desc">
                    <span class="step-title">Before We Proceed..</span>
                    <p>Instructions for Registration</p>
                  </div>
                </div>
				<div class="step col-xs-12 col-lg-2" data-target="#corporateinfo" role="tab">
                  <span class="step-number">2</span>
                  <div class="step-desc">
                    <span class="step-title">Employer Information</span>
                    <p>Corporate information</p>
                  </div>
                </div>
                <div class="step col-xs-12 col-lg-2" data-target="#newAccount" role="tab">
                  <span class="step-number">3</span>
                  <div class="step-desc">
                    <span class="step-title">Employer Admin Account</span>
                    <p>Employer Admin Account Login Creation</p>
                  </div>
                </div>
				
				<div class="step col-xs-12 col-lg-2" data-target="#corporateActivation" role="tab">
                  <span class="step-number">4</span>
                  <div class="step-desc">
                    <span class="step-title">Account Activation</span>
                    <p>Set your account activation date</p>					
                  </div>
                </div>
                <div class="step col-xs-12 col-lg-2" data-target="#uploademp" role="tab">
                  <span class="step-number">5</span>
                  <div class="step-desc">
                    <span class="step-title">Employees Information</span>
                    <p>Upload your Employees information</p>					
                  </div>
                </div>
                <div class="step col-xs-12 col-lg-2" data-target="#Confirmation" role="tab">
                  <span class="step-number">5</span>
                  <div class="step-desc">
                    <span class="step-title">Account Setup Confirmation</span>
                    <p>Waiting for the goods</p>
                  </div>
                </div>
				
              </div>
              <!-- End Steps -->
              <!-- Wizard Content -->
              <div class="wizard-content">
				<div class="wizard-pane active" id="examplecontent" role="tabpanel">
                 <p>Please have the below information before we proceed..</p>
				 <ul class="list-icons">
                  <li><i class="wb-check" aria-hidden="true"></i>Employee information in CSV file format
					<ul>
                      <li>Download the CSV Template <a href="#"> here </a> and save it to your Desktop</li>
                      <li>Add your employee's information in the CSV file </li>
					  <li>Upload the file during the registration Process</li>
                    </ul></li>
                  <li><i class="wb-check" aria-hidden="true"></i>Contact Email Addresses
                    <ul>
                      <li>Technical Contact Email Address</li>
                      <li>Customer Support Email Address</li>
                    </ul>
                  </li>
            
                </ul>
                </div>
                <div class="wizard-pane active" id="newAccount" role="tabpanel">
                  <form id="groupstep2" action="<?php echo site_url('group/customer_save'); ?>" method="POST">
				  <input type="hidden" id="emailcheck" value="0"/>
				  <input type="hidden" id="unamecheck" value="0" />
				  <div class="form-group">
                      <label class="form-control-label" for="email">Email</label>
                      <input type="text" class="form-control" onblur="validemailcheck();" autocomplete="off" id="email" name="email" required="required">
                      <span style="color:red" id="errormessagessn"></span>
					</div>
					<div class="form-group">
                      <label class="form-control-label" for="firstname">First Name</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="inputUserName">Last Name</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" required="required">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="username">Username</label>
                      <input type="text" class="form-control" onblur="validusername();" autocomplete="off" id="username" name="username" required="required">
                    <span style="color:red" id="errormessageuname"></span>
					</div>
                    <div class="form-group">
                      <label class="form-control-label" for="inputPassword">Password</label>
                      <input type="password" class="form-control" autocomplete="off" id="password" name="password" required="required">
                    </div>
					
					<div class="form-group">
                      <label class="form-control-label" for="inputPassword">Gender</label>
                      <select class="form-control" required="required" name = "gender" id = "gender">
							<option></option>
							<option value="M">Male</option>
							<option value="F">Female</option>	
					 </select>
                    </div>
                  </form>
                </div>
				 <div class="wizard-pane active" id="corporateinfo" role="tabpanel">
                  <form id="groupcreation" name="groupcreation"  action="<?php echo site_url('group/creation'); ?>" method="POST">
				  <div class="form-group">
                      <label class="form-control-label" for="inputName">OrganizationID</label>
                      <input type="text" class="form-control" id="organizationid" name="organizationid" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="inputName">Name</label>
                      <input type="text" class="form-control" id="corpname" name="corpname" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="displayname">Display Name</label>
                      <input type="text" class="form-control" id="displayname" name="displayname" required="required">
                    </div>
					 <div class="form-group">
                      <label class="form-control-label" for="accountnumber">Account Number</label>
                      <input type="text" class="form-control" id="accountnumber" name="accountnumber" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="accountnumber">Language</label>
                      <input type="text" class="form-control" id="language" name="language" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="Description">Description</label>
                      <textarea type="text" class="form-control" row="5" id="description" name="description" required="required" ></textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="Notes">Notes</label>
                      <input type="text" class="form-control" id="notes" name="notes" required="required">
                    </div>
					  <div class="form-group">
                      <label class="form-control-label" for="Support Contact Email">Support Contact Email</label>
                      <input type="email" class="form-control" autocomplete="off" id="supportemail" name="supportemail" required="required">
                    </div>                 
					<div class="form-group">
                      <label class="form-control-label" for="inputTechEmail">Technical Contact Email</label>
                      <input type="email" class="form-control" autocomplete="off" id="technicalemail" name="techemail" required="required">
                    </div>
                  </form>
                </div>
				<div class="wizard-pane active" id="corporateActivation" role="tabpanel">
                  <form id="spnsership" name="spnsership"  action="<?php echo site_url('group/sponseramount'); ?>" method="POST">
					
					<div class="form-group row">
                      <label class="col-xs-12 col-md-4 form-control-label">Would you like to sponsor this benefit for your Employees? </label>
                      <div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="sponership" name="sponsershipyesno" value="1">
                          <label for="inputBasicMale">Yes</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="sponership" name="sponsershipyesno" value="0" checked="">
                          <label for="sponership">No</label>
                        </div>
                      </div>
                    </div>
					<div class="form-group row">
                      <label class="col-xs-12 col-md-4 form-control-label"> Sponsorship %</label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" class="form-control" id="sponseramount" name="sponseramount" autocomplete="off" placeholder="Enter the % you would like to sponsor for the product">
                      </div>
                    </div>
					
					 <div class="form-group row">
                      <label class="col-xs-12 col-md-4 form-control-label">Activation Start Date</label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" class="form-control icon wb-calendar" aria-hidden="true" data-plugin="datepicker" id="activatedate" name="activatedate" autocomplete="off">
					</div>
					 </div>
                   
					</form>
				</div>
                 <div class="wizard-pane active" id="uploademp" role="tabpanel">
                
				 <h3> Upload the Employee information (CSV) file</h3>
				 <h5> Note: You can also add employees later manually</h5>
					<form class="upload-form" id="exampleUploadForm" method="POST">
					  <input type="file" id="inputUpload" name="files[]" multiple="" />
					  <div class="uploader-inline">
						<p class="upload-instructions">Click Or Drop Files To Upload.</p>
					  </div>
					  <div class="file-wrap container-fluid">
						<div class="file-list row"></div>
					  </div>
					</form>
                </div>
                <div class="wizard-pane active" id="Confirmation" role="tabpanel">
                  <div class="text-xs-center m-y-20">
                    <i class="icon wb-check font-size-40" aria-hidden="true"></i>
                    <h4>Congratulations!!!. Your Registration is complete. <a href="../html/pages/settings.html">Continue for Demo </a></h4>
                  </div>
                </div>
              </div>
              <!-- End Wizard Content -->
            </div>
          </div>
          <!-- End Panel Wizard One Form -->
        </div>     
		
		
      </div>	  	  
    </div>
  </div>
  
  <script>

  function validemailcheck() {
	$("#errormessagessn").html('');
	var cusemail=$("#email").val();
		var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
         if(re.test(cusemail)){
				jQuery.ajax({
			   url: "verifyemail",
			   data:'verifyemail='+$("#email").val(),
			   type: "POST",
			   dataType:"html",
			   success:function(data){
			   if(data=='invalid')
				{
				 $("#errormessagessn").html('Email ID  already exists');
				 $("#emailcheck").val('1');
				 return false;    
				} else {
				   //$("#errormessagessn").html('correct');
				   $("#emailcheck").val('0');
				   return false;
				 }
				
			  },
				error:function (){}
		 }); 
	}		
		return false;
    }
	
function validusername() {
	$("#errormessageuname").html('');
	var username=$("#username").val();
       if(username.length==6)
		{
			   jQuery.ajax({
			   url: "verifyusername",
			   data:'verifyusername='+$("#username").val(),
			   type: "POST",
			   dataType:"html",
			   success:function(data){
			   if(data=='invalid')
				{
				 $("#errormessageuname").html('User Name already exists');
				 $("#unamecheck").val('1');
				 return false;    
				} else {
				   //$("#errormessagessn").html('correct');
				   $("#unamecheck").val('0');
				   return false;
				 }
				
			  },
				error:function (){}
		 }); 
	}		
		return false;
    }
	  </script>

 