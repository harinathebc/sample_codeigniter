<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
<div class="page">
    <div class="page-header">
      <h1 class="page-title">New Estimate</h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item active"><a href="<?php echo site_url('user/quotations'); ?>">Estimates</a></li>
	<li class="breadcrumb-item active">New Estimate</a></li>
      </ol>
      
	<div class="page-header-actions">

	<a href="<?php echo site_url('user/quotations'); ?>" class="btn btn-sm btn-inverse btn-round">
	<i aria-hidden="true" class="icon wb-list-bulleted"></i>
	<span class="hidden-xs">View Estimates</span>
	</a>
	<a href="<?php echo site_url('user/addquote'); ?>" class="btn btn-sm btn-inverse btn-round">
	<i aria-hidden="true" class="icon wb-plus"></i>
	<span class="hidden-xs">New Estimate</span>
	</a>
    </div>
</div>
    <div class="page-content">
      <div class="panel panel-bordered panel-primary">
	  <div class="panel-heading">
	  <h3 class="panel-title">Estimate Information</h3>
	  </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-12 col-lg-12 col-xs-12">
              <!-- Example Horizontal Form -->
                 <form class="form-horizontal" name="quotation-form" onsubmit="return validateForm();" action="<?php echo base_url('user/submitquote');?>" method="POST">

<!----SELECTING TYPE OF SECURITY --->
<?php if(validation_errors()) { ?>
<div role="alert" class="alert dark alert-icon alert-danger alert-dismissible">
                  <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                    <span aria-hidden="true">×</span>
                  </button>
                 <?php echo validation_errors(); ?>
                </div>
<?php } ?>
	<?php if($this->session->flashdata('error')): ?>
		<div style="color:red;">
		<div class="bg-success"><?php echo $this->session->flashdata('error');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('error')): ?>
		<div class="bg-warning"><?php echo $this->session->flashdata('error');?></div>
	
	</div>
	<?php endif; ?>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Client Name </label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="Client Name" name="name" id="name" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Address </label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="Address 1" name="address1" id="address1" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">&nbsp;</label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="Address 2" name="address2" id="address2" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Phone</label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="Phone" name="phone" id="phone" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">E-mail</label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="E-mail" name="email" id="email" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Service Offerings: </label>
		<div class="col-md-9 col-xs-12">
		<div class="col-md-3 col-xs-6 checkbox-custom checkbox-info ">
		<input type="checkbox" id="vulassessment" name="secutiy_type[]" value="vulnerability">

		<label for="InputInternal">Vulnerability Assessment</label>
		<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Vulnerability Management identifies & quantifies security vulnerabilities in a clients environment. It is an in-depth evaluation of your clients information security posture, indicating weaknesses as well as providing the appropriate mitigation procedures required to either eliminate those weaknesses or reduce them to an acceptable level of risk. 
" data-toggle="popover" class="popover-top" data-original-title="Vulnerability Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
		</div>
	<div class="col-md-3 col-xs-6 checkbox-custom checkbox-danger">
	<input type="checkbox" id="networkpen" name="secutiy_type[]" value="network">
	<label for="InputExternal">Network Penetration Testing</label>
	<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Network Penetration Testing simulates the actions of an external and/or internal cyber attacker that aims to breach the information security of a client's organization. Our testers exploit critical systems, gain access to sensitive data and inform the client of these issues. This is usually performed after or during an effective vulnerability assessment program. "
 data-toggle="popover" class="popover-top " data-original-title="Network Penetration Testing">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
	</div>
	<div class="col-md-3 col-xs-6 checkbox-custom checkbox-info">
	<input type="checkbox" id="apptest" name="secutiy_type[]" value="application">
	<label for="InputExternal">Application Testing</label>
	<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Application(Web or mobile) Security Testing is broken down into Dynamic(app facing and most common) or Static(code based) tests. The primary objective is to identify exploitable vulnerabilities in applications before hackers are able to discover and exploit them. "
 data-toggle="popover" class="popover-top" data-original-title="Application Testing">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
	</div>
	<div class="col-md-3 col-xs-6 checkbox-custom checkbox-danger">
	<input type="checkbox" id="emailpish" name="secutiy_type[]" value="emailpish">
	<label for="InputExternal">Email Phishing</label>
	<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Application(Web or mobile) Security Testing is broken down into Dynamic(app facing and most common) or Static(code based) tests. The primary objective is to identify exploitable vulnerabilities in applications before hackers are able to discover and exploit them. "
 data-toggle="popover" class="popover-top" data-original-title="Email Phishing">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
	</div>
	</div>
	</div>

<!-----END -->


		<div id="vul">
				  <div class="step">
                   <span aria-hidden="true" style="color:#57C7D4;" class="step-icon icon wb-pluse"></span>
                    <div class="step-desc">
                      <span class="step-title">Vulnerability Assessment</span>                      
                    </div>
                  </div>

				  <div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Assessment Type: </label>
					  <div class="col-md-9 col-xs-12">
					<div class="col-md-4 col-xs-6 checkbox-custom checkbox-info ">
                  <input type="checkbox" checked="" id="vul_internalassess" name="vul_assess[]" value="internal">
                  <label for="InputInternal">Internal Assessment</label>
				  <span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Inside Network, Internal Assets "
 data-toggle="popover" class="popover-top" data-original-title="Internal Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
                </div>
                <div class="col-md-4 col-xs-6 checkbox-custom checkbox-info">
                  <input type="checkbox" checked=""  id="vul_externalassess" name="vul_assess[]" value="external">
                  <label for="InputExternal">External Assessment</label>
				  <span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Outside Network, Internet Facing"
 data-toggle="popover" class="popover-top" data-original-title="External Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
                </div>
				
				</div>
				</div>
					<div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Based On: </label>
                      <div class="col-md-9 col-xs-12">
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" name="vul_basedon" id="vul_basedon1" value="infra" onclick="getVulDetails(this.value);">
                          <label for="inputVInfrastructure">Infrastucture</label>
						  <span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Preferred quoting method. These are crtical infrastructure assets that run on day to day business." data-toggle="popover" class="popover-top" data-original-title="Based on Infrastucture">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" name="vul_basedon" id="vul_basedon2" value="employee" onclick="getVulDetails(this.value);">
                          <label for="inputVEmployees">Employees</label>
						  <span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Only use if client does not know infrastructure IP count/range that they want tested. Employees provides understanding of company size and IT infrastructure estimate." data-toggle="popover" class="popover-top" data-original-title="Based on Employees">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
                        </div>
						
                      </div>
                    </div>
                    <div class="form-group row" id="vul_iprow">
                      <label class="col-xs-12 col-md-3 form-control-label">Assumption: IP Count</label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="Infrastructure IP Count" name="vul_ipcount" id="vul_ipcount" class="form-control">
                      </div>
                    </div>
					   <div class="form-group row" id="vul_erow">
                      <label class="col-xs-12 col-md-3 form-control-label">Employee Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Employees" name="vul_ecount" id="vul_ecount" class="form-control">
                      </div>
                    </div>
					   <div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Office Locations </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Office Locations" name="vul_officecount" id="vul_officecount" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Annual Service</label>
                      <div class="col-md-9 col-xs-12">
			<div class="radio-custom radio-default radio-inline">
                          <input type="radio" checked="" name="vul_anualservice" id="vul_anualservice" value="SINGLE">
                          <label for="inputSTest">Single Test</label>
                        </div>			
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" name="vul_anualservice" id="vul_anualservice" value="FOUR">
                          <label for="inputyear">4 tests/Year(Suggested)</label>
                        </div>
                        
						
                      </div>
                    </div>
		</div>
		<div id="net">
                  <div class="step">
                   <span aria-hidden="true" style="color:#F96868;" class="step-icon icon wb-pluse"></span>
                    <div class="step-desc">
                      <span class="step-title">Network Penetration Testing</span>                      
                    </div>
                  </div>
                   
					<div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Assessment Type: </label>
					  <div class="col-md-9 col-xs-12">
						<div class="col-md-4 col-xs-6 checkbox-custom checkbox-danger ">
						<input type="checkbox" checked="" id="net_internalassess" name="net_assess[]"  value="internal">
						<label for="InputNTInternal">Internal Assessment</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Inside Network, Internal Assets "
						data-toggle="popover" class="popover-top" data-original-title="Internal Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						<div class="col-md-4 col-xs-6 checkbox-custom checkbox-danger">
						<input type="checkbox" checked="" id="vul_externalassess" name="net_assess[]" value="external">
						<label for="InputNTExternal">External Assessment</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Outside Network, Internet Facing"
						data-toggle="popover" class="popover-top" data-original-title="External Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Based On: </label>
					<div class="col-md-9 col-xs-12">
						<div class="radio-custom radio-default radio-inline">
						<input type="radio" name="net_basedon" id="net_basedon1" value="infra" onclick="getNetDetails(this.value);">
						<label for="inputNTInfrastructure">Infrastucture</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Preferred quoting method. These are crtical infrastructure assets that run on day to day business." data-toggle="popover" class="popover-top" data-original-title="Based on Infrastucture">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						<div class="radio-custom radio-default radio-inline">
						<input type="radio" name="net_basedon" id="net_basedon2" value="employee" onclick="getNetDetails(this.value);">
						<label for="inputNTEmployees">Employees</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Only use if client does not know infrastructure IP count/range that they want tested. Employees provides understanding of company size and IT infrastructure estimate." data-toggle="popover" class="popover-top" data-original-title="Based on Employees">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						
                      			</div>
                    	</div>
                    <div class="form-group row" id="net_iprow">
                      <label class="col-xs-12 col-md-3 form-control-label">Assumption: IP Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="number" autocomplete="off" placeholder="Infrastructure IP Count" name="net_ipcount" id="net_ipcount" class="form-control">
                      </div>
                    </div>
					   <div class="form-group row" id="net_erow">
                      <label class="col-xs-12 col-md-3 form-control-label">Employee Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Employees" name="net_ecount" id="net_ecount" class="form-control">
                      </div>
                    </div>
					   <div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Office Locations </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Office Locations" name="net_officecount" id="net_officecount" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Annual Service</label>
                      <div class="col-md-9 col-xs-12">

                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" checked="" id="net_anualservice" name="net_anualservice" value="SINGLE">
                          <label for="inputNTSTest">Single Test</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="net_anualservice" name="net_anualservice" value="FOUR">
                          <label for="inputNTsuggested">4 tests/Year(Suggested)</label>
                        </div>
						
                      </div>
                    </div>
		</div>
<!----APPLICATION TESTING --->
		<div id="app">
				<div class="step">
				   <span aria-hidden="true" style="color:#57C7D4;" class="step-icon icon wb-pluse"></span>
				    <div class="step-desc">
				      <span class="step-title">Application Testing</span>                      
				    </div>
				  </div>
                   
					<!--<div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Assessment Type: </label>
					  <div class="col-md-9 col-xs-12">
						<div class="col-md-4 col-xs-6 checkbox-custom checkbox-info ">
						<input type="checkbox" checked="" id="app_internalassess" name="app_assess[]"  value="internal">
						<label for="InputNTInternal">Internal Assessment</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Inside Network, Internal Assets "
						data-toggle="popover" class="popover-top" data-original-title="Internal Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						<div class="col-md-4 col-xs-6 checkbox-custom checkbox-info">
						<input type="checkbox" checked="" id="app_externalassess" name="app_assess[]" value="external">
						<label for="InputNTExternal">External Assessment</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Outside Network, Internet Facing"
						data-toggle="popover" class="popover-top" data-original-title="External Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
					</div>
					</div>-->
					<div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Based On: </label>
					<div class="col-md-9 col-xs-12">
						<div class="radio-custom radio-default radio-inline">
						<input type="radio" checked="checked" name="app_basedon" id="app_basedon1" value="infra" onclick="getAppDetails(this.value);">
						<label for="inputNTInfrastructure">Pages</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Preferred quoting method. These are crtical infrastructure assets that run on day to day business." data-toggle="popover" class="popover-top" data-original-title="Based on Infrastucture">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						<!--<div class="radio-custom radio-default radio-inline">
						<input type="radio" name="app_basedon" id="app_basedon2" value="employee" onclick="getAppDetails(this.value);">
						<label for="inputNTEmployees">Employees</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Only use if client does not know infrastructure IP count/range that they want tested. Employees provides understanding of company size and IT infrastructure estimate." data-toggle="popover" class="popover-top" data-original-title="Based on Employees">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div> -->
						
                      			</div>
                    	</div>
                    <div class="form-group row" id="app_iprow">
                      <label class="col-xs-12 col-md-3 form-control-label">Assumption: Pages Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="number" autocomplete="off" placeholder="Pages Count" name="app_pagescount" id="app_pagescount" class="form-control">
                      </div>
                    </div>
		<!--<div class="form-group row" id="app_erow">
                      <label class="col-xs-12 col-md-3 form-control-label">Employee Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Employees" name="app_ecount" id="app_ecount" class="form-control">
                      </div>
                    </div> -->
			<!--<div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Office Locations </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Office Locations" name="app_officecount" id="app_officecount" class="form-control">
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Annual Service</label>
                      <div class="col-md-9 col-xs-12">

                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" checked="" id="app_anualservice" name="app_anualservice" value="SINGLE">
                          <label for="inputNTSTest">Single Test</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="app_anualservice" name="app_anualservice" value="FOUR">
                          <label for="inputNTsuggested">4 tests/Year(Suggested)</label>
                        </div>
						
                      </div>
                    </div>

		</div>

<!-----APPLICATION TESTING --->
<!----EMAIL PISHING --->
		<div id="emailp">
				<div class="step">
				   <span aria-hidden="true" style="color:#F96868;" class="step-icon icon wb-pluse"></span>
				    <div class="step-desc">
				      <span class="step-title">Email Pishing</span>                      
				    </div>
				  </div>
                   
					<!--<div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Assessment Type: </label>
					  <div class="col-md-9 col-xs-12">
						<div class="col-md-4 col-xs-6 checkbox-custom checkbox-danger">
						<input type="checkbox" checked="" id="net_internalassess" name="net_assess[]"  value="internal">
						<label for="InputNTInternal">Internal Assessment</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Inside Network, Internal Assets "
						data-toggle="popover" class="popover-top" data-original-title="Internal Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						<div class="col-md-4 col-xs-6 checkbox-custom checkbox-danger">
						<input type="checkbox" checked="" id="vul_externalassess" name="net_assess[]" value="external">
						<label for="InputNTExternal">External Assessment</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Outside Network, Internet Facing"
						data-toggle="popover" class="popover-top" data-original-title="External Assessment">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
					</div>
					</div> -->
					<div class="form-group row">
					<label class="col-xs-12 col-md-3 form-control-label">Based On: </label>
					<div class="col-md-9 col-xs-12">
						<!--<div class="radio-custom radio-default radio-inline">
						<input type="radio" name="email_basedon" id="email_basedon1" value="infra" onclick="getEmailDetails(this.value);">
						<label for="inputNTInfrastructure">Pages</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Preferred quoting method. These are crtical infrastructure assets that run on day to day business." data-toggle="popover" class="popover-top" data-original-title="Based on Infrastucture">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div> -->
						<div class="radio-custom radio-default radio-inline">
						<input type="radio" checked="checked" name="email_basedon" id="email_basedon2" value="employee" onclick="getEmailDetails(this.value);">
						<label for="inputNTEmployees">Employees</label>
						<span style="vertical-align: super;font-size:1 em;" data-trigger="hover" data-content="Only use if client does not know infrastructure IP count/range that they want tested. Employees provides understanding of company size and IT infrastructure estimate." data-toggle="popover" class="popover-top" data-original-title="Based on Employees">  <i class="site-menu-icon wb-help-circle" aria-hidden="true"></i></span>
						</div>
						
                      			</div>
                    	</div>
                   <!-- <div class="form-group row" id="net_iprow">
                      <label class="col-xs-12 col-md-3 form-control-label">Assumption: IP Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="number" autocomplete="off" placeholder="Infrastructure IP Count" name="email_ipcount" id="email_ipcount" class="form-control">
                      </div>
                    </div> -->
					   <div class="form-group row" id="email_erow">
                      <label class="col-xs-12 col-md-3 form-control-label">Employee Count </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Employees" name="email_ecount" id="email_ecount" class="form-control">
                      </div>
                    </div>
		<!--<div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Office Locations </label>
                      <div class="col-md-9 col-xs-12">
                        <input type="text" autocomplete="off" placeholder="No.of Office Locations" name="email_officecount" id="email_officecount" class="form-control">
                      </div>
                    </div>-->
                    <div class="form-group row">
                      <label class="col-xs-12 col-md-3 form-control-label">Annual Service</label>
                      <div class="col-md-9 col-xs-12">

                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" checked="" id="email_anualservice" name="email_anualservice" value="SINGLE">
                          <label for="inputNTSTest">Single Test</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="email_anualservice" name="email_anualservice" value="FOUR">
                          <label for="inputNTsuggested">4 tests/Year(Suggested)</label>
                        </div>
						
                      </div>
                    </div>

		</div>
<!-----EMAIL PISHING --->
                  <div class="form-group row">
                      <div class="col-xs-12 col-md-9 offset-md-3">
                        <button class="btn btn-primary" type="submit">Get Estimate </button>
                        <button class="btn btn-default btn-outline" type="reset">Reset</button>
                      </div>
                    </div>
			  <p style="text-align: right;font-size: 12px;">*Note Estimate is based on assumptions above. Once SOW is executed all assumptions will be verified which may change estimate and required amended SOW. 
</p>
                  </form>
              
            </div>
		
			
			
			
			
			
          </div>
        </div>
      </div>
      <!-- Panel Inline Form -->
     
    </div>
  </div>

<script>
$(document).ready(function() {
	$('#net').hide();
	$('#vul').hide();
	$('#app').hide();
	$('#emailp').hide();
    $('#vulassessment').click(function() {
        if (!$(this).is(':checked')) {
            ///alert('Not checked');
		$('#vul').hide();
        } else {
	   //// alert('checked');
		$('#vul').show();
	}
    });

    $('#networkpen').click(function() {
        if (!$(this).is(':checked')) {
            ///alert('Not checked');
		$('#net').hide();
        } else {
	    ////alert('checked');
		$('#net').show();
	}
    });
    $('#apptest').click(function() {
        if (!$(this).is(':checked')) {
            ///alert('Not checked');
		$('#app').hide();
        } else {
	   //// alert('checked');
		$('#app').show();
	}
    });
    $('#emailpish').click(function() {
        if (!$(this).is(':checked')) {
            ///alert('Not checked');
		$('#emailp').hide();
        } else {
	   //// alert('checked');
		$('#emailp').show();
	}
    });
});

function getVulDetails(val)
{
	if(val == 'infra')
	{
		$('#vul_erow').hide();
		$('#vul_iprow').show();

	} else {
		$('#vul_erow').show();
		$('#vul_iprow').hide();
	}
}
function getNetDetails(val)
{
	if(val == 'infra')
	{
		$('#net_erow').hide();
		$('#net_iprow').show();

	} else {
		$('#net_erow').show();
		$('#net_iprow').hide();
	}
}
function getAppDetails(val)
{
	///alert(val);
	if(val == 'infra')
	{
		$('#app_erow').hide();
		$('#app_iprow').show();

	} else {
		$('#app_erow').show();
		$('#app_iprow').hide();
	}
}
function getEmailDetails(val)
{
	if(val == 'infra')
	{
		$('#email_erow').hide();
		$('#email_iprow').show();

	} else {
		$('#email_erow').show();
		$('#email_iprow').hide();
	}
}
function validateForm()
{

	if($('#vulassessment').is(':checked')) {
		if (!$("input[name='vul_basedon']").is(':checked')) 
		{
			alert('Please select based on in Vulnerability Assessment');
			return false;
		}
	}
	if($('#networkpen').is(':checked')) {
		if (!$("input[name='net_basedon']").is(':checked')) 
		{
			alert('Please select based on in Network Penetration Testing');
			return false;
		}
	}
	if($('#apptest').is(':checked')) {
		if (!$("input[name='app_basedon']").is(':checked')) 
		{
			alert('Please select based on in Application Testing');
			return false;
		}
	}
	if($('#emailpish').is(':checked')) {
		if (!$("input[name='email_basedon']").is(':checked')) 
		{
			alert('Please select based on in Email Pishing');
			return false;
		}
	}

}
</script>

