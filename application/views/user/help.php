<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
<div class="page">
    <div class="page-header">
      <h1 class="page-title">Help</h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <!--<li class="breadcrumb-item active"><a href="<?php echo site_url('user/quotations'); ?>">Estimates</a></li>-->
	<li class="breadcrumb-item active">Help</a></li>
      </ol>
      
	<!--<div class="page-header-actions">

	<a href="<?php echo site_url('user/quotations'); ?>" class="btn btn-sm btn-inverse btn-round">
	<i aria-hidden="true" class="icon wb-list-bulleted"></i>
	<span class="hidden-xs">Help</span>
	</a>
    </div>-->
</div>
    <div class="page-content">
      <div class="panel panel-bordered panel-primary">
	  <div class="panel-heading">
	  <h3 class="panel-title">Contact Us</h3>
	  </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-12 col-lg-12 col-xs-12">
              <!-- Example Horizontal Form -->
                 <form class="form-horizontal" name="quotation-form" onsubmit="return validateForm();" action="" method="POST">

<!----SELECTING TYPE OF SECURITY --->
<?php if(validation_errors()) { ?>
<div role="alert" class="alert dark alert-icon alert-danger alert-dismissible">
                  <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                    <span aria-hidden="true">×</span>
                  </button>
                 <?php echo validation_errors(); ?>
                </div>
<?php } ?>
	<?php if($this->session->flashdata('success')): ?>
		<div>
		<div class="bg-success"><?php echo $this->session->flashdata('success');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('error')): ?>
		<div class="bg-warning"><?php echo $this->session->flashdata('error');?></div>
	
	</div>
	<?php endif; ?>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Name </label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="Name" name="name" id="name" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">E-mail</label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="E-mail" name="email" id="email" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Subject</label>
		<div class="col-md-9 col-xs-12">
		<input type="text" autocomplete="off" placeholder="Subject" name="subject" id="subject" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-xs-12 col-md-2 form-control-label">Message</label>
		<div class="col-md-9 col-xs-12">
		<textarea type="text" autocomplete="off" placeholder="Message" name="message" id="message" class="form-control"></textarea>
		</div>
	</div>
	

                  <div class="form-group row">
                      <div class="col-xs-12 col-md-9 offset-md-3">
                        <button class="btn btn-primary" type="submit">Contact</button>
                        <button class="btn btn-default btn-outline" type="reset">Reset</button>
                      </div>
                    </div>
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

