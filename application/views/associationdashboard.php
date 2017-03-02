
 <section  id="services-sec">
        <div class="container">
					<?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('updateerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('updateerror');?></div>
					<?php endif; ?>
			<div class="row ">
                <div class="text-center g-pad-bottom">
				<form name ="userinput" action="<?php echo site_url('association/update'); ?>" method="POST">
					<?php echo validation_errors(); ?>
					<?php //echo '<pre>';print_r($associationdata);exit; ?>
			<div class="col-md-12 col-sm-12">
				<div class="col-md-6 col-sm-6 alert-info">
                        <h4>Account/Group </h4>
						<div class="col-md-12">
							Control Name (Client name)<input type="text" name="controlname" id="controlname" value="<?php echo htmlentities($associationdata['control_name']);?>" />
						</div>
						<div class="col-md-12">
							Employer Account Name<input type="text" name="employeraccountname" id="employeraccountname" value="<?php echo htmlentities($associationdata['employer_name']);?>" />
						</div>
						<div class="col-md-12">
							ASG Account Number<input type="text" name="asgaccountnumber" id="asgaccountnumber" value="<?php echo htmlentities($associationdata['asg_accountnumber']);?>"/>
						</div>
						<div class="col-md-12">
							Effective Date<input type="text" name="effectivedate" id="effectivedate" value="<?php echo htmlentities($associationdata['effective_date']);?>"/>
						</div>
						<div class="col-md-12">
							Go-Live Date<input type="text" name="golivedate" id="golivedate" value="<?php echo htmlentities($associationdata['golive_date']);?>" />
						</div>
						
						<div class="col-md-12">
							Submission Type<input type="text" name="submissiontype" id="submissiontype" value="<?php echo htmlentities($associationdata['submission_type']);?>" />
						</div>
						<div class="col-md-12">
						Login Mode<input type="text" name="loginmode" id="loginmode" value="<?php echo htmlentities($associationdata['login_mode']);?>" />
						</div>
						<div class="col-md-12">
						Branding :<?php if($associationdata['branding']=="true") {?>
								<input type="radio" name="branding" value="true" checked="checked">Yes
								<?php }else{ ?>
								<input type="radio" name="branding" value="true" >True
								<?php } ?>
								<?php if($associationdata['branding']=="false") {?>
								<input type="radio" name="branding" value="false" checked="checked">False
								<?php }else{ ?>
								<input type="radio" name="branding" value="false" >False
								<?php } ?>
						</div>
						<div class="col-md-12">
						Theme<input type="text" name="theme" id="theme" value="<?php echo htmlentities($associationdata['theme']);?>" />
						</div>
						<div class="col-md-12">
						Registration Code<input type="text" name="registrationcode" id="registrationcode" value="<?php echo htmlentities($associationdata['registration_code']);?>"/>
						</div>
						<div class="col-md-12">
						RemoteStyleSheetUrl:<input type="text" name="remotestylesheeturl" id="remotestylesheeturl" value="<?php echo htmlentities($associationdata['remotestylesheeturl']);?>" />
						</div>
						<div class="col-md-12">
							RequireFullProfile:
								<?php if($associationdata['requirefullprofile']=="Y") {?>
								<input type="radio" name="requirefullprofile" value="Y" checked="checked">Yes
								<?php }else{ ?>
								<input type="radio" name="requirefullprofile" value="Y" >Yes
								<?php } ?>
								<?php if($associationdata['requirefullprofile']=="N") {?>
								<input type="radio" name="requirefullprofile" value="N" checked="checked">No
								<?php }else{ ?>
								<input type="radio" name="requirefullprofile" value="N" >No
								<?php } ?>
						</div>
						<div class="col-md-12">
							AutoRegisterEligibility:
								<?php if($associationdata['autoeligility']=="Y") {?>
								<input type="radio" name="autoeligility" value="Y" checked="checked">Yes
								<?php }else{ ?>
								<input type="radio" name="autoeligility" value="Y" >Yes
								<?php } ?>
								<?php if($associationdata['autoeligility']=="N") {?> 
								<input type="radio" name="autoeligility" value="N" checked="checked">No
								<?php }else{ ?>
								<input type="radio" name="autoeligility" value="N" >No
								<?php } ?>
						</div>
						<div class="col-md-12">
							Technical Contact Email<input type="text" name="supportemail" id="supportemail" autocomplete="off" value="<?php echo htmlentities($associationdata['supportemail']);?>" />
						</div>
						<div class="col-md-12">
							Support Contact Email<input type="text" name="technicalcontactemail" id="technicalcontactemail"  autocomplete="off" value="<?php echo htmlentities($associationdata['technicalemail']);?>" />
						</div>
					</div>
					<div class="col-md-6 col-sm-6 alert-success">
						<h4>Billing rules</h4>
						<div class="col-md-12">
							Sponsership Payment By Association:
							<?php if($associationdata['sponsership_payment_by_ass']=1) {?>
							<input type="radio" name="sponsershippaymentassociation" onclick="paymentassociationyesno(this.value);" value="1" checked="checked">Yes
							<?php }else{ ?>
							<input type="radio" name="sponsershippaymentassociation" onclick="paymentassociationyesno(this.value);" value="1">Yes
							<?php } ?>
							<?php if($associationdata['sponsership_payment_by_ass']=0) {?> 
							<input type="radio" name="sponsershippaymentassociation" onclick="paymentassociationyesno(this.value);" value="0" checked="checked">NO
							<?php }else{ ?>
							<input type="radio" name="sponsershippaymentassociation" onclick="paymentassociationyesno(this.value);" value="0" />NO
							<?php } ?>
						</div>
						<div class="col-md-12" id="paymentcheck">
							<?php  $payment=explode(',',$associationdata['payment_methods']);
							//echo '<pre>';print_r($payment);exit;?>
								Payment Methods:
								<?php if(in_array('cc', $payment, true)) {?>
								<input type="checkbox" id="cc" name="paymentmethods[]" value="cc" checked="checked">Credit card
								<?php }else{ ?>
								<input type="checkbox" id="cc" name="paymentmethods[]" value="cc">Credit card
								<?php } ?>
								<?php if(in_array('ach', $payment, true)) {?>
								<input type="checkbox" id="ach" name="paymentmethods[]" value="ach" checked="checked">ACH
								<?php }else{ ?>
								<input type="checkbox"  id="ach" name="paymentmethods[]" value="ach">ACH
								<?php } ?>
								<?php if(in_array('echeck', $payment, true)) {?>
								<input type="checkbox" id="echeck" name="paymentmethods[]" value="echeck" checked="checked">echeck
								<?php }else{ ?>
								<input type="checkbox" id="echeck" name="paymentmethods[]" value="echeck">echeck
								<?php } ?>
							</div>
						<div class="col-md-12" id="sponsershipproduct">
							Do you want to apply spnsership:
							<input type="radio" name="spnosershipproduct" onclick="paymentspnosershipproduct(this.value);" value="1">All products
							<input type="radio" name="spnosershipproduct" onclick="paymentspnosershipproduct(this.value);" value="0">Specific products.
						</div>
						<div class="col-md-12" id="sponsershippercentage">
							sponsership(%):<input type="text" name="sponsership" id="sponsership"  autocomplete="off" value="" />

						</div>
						<div id="item_list">
						</div>
						<input type="submit" name="submit" value="update"/> 

                           
                    </div>
				</form> 
                   
                </div>
                  </div>
         </div>
    </section>
 <script type="text/javascript">
 paymentassociationyesno('<?php echo htmlentities($associationdata['sponsership_payment_by_ass']);?>');
function paymentassociationyesno(val)
{
	if(val==1){
		$('#sponsershipproduct').show();
		$('#paymentcheck').show();
	}else{
		$('#sponsershipproduct').hide();
		$('#sponsershippercentage').hide();
		$('#paymentcheck').hide();
	}
}
function paymentspnosershipproduct(val)
{
	var radioValue = $("input[name='spnosershipproduct']:checked").val();
	if(val==1){
		$('#sponsershippercentage').show();
		$('#item_list').hide();
		
	}else{
		$('#sponsershippercentage').hide();
		$('#item_list').show();
		if(radioValue==0)
		{
			jQuery.ajax({
			url: "sponsership",
			data: 
			 { form_key : window.FORM_KEY,
                                sponsership: radioValue,
             },
			type: "POST",
			dataType:"json",
			success:function(data){
				$("#item_list").html('');
				jQuery.each(data, function(index, item) {
					
					var length = data.length;
					var product_id = item.product_id;
					var product_name = item.product_name;
					var form_rendered = '';
					form_rendered += '<tr id="row_'+length+'" >';
					form_rendered += '<td><input name="product_id[]" type="hidden" class="form-control input-sm" value="'+ product_id +'"></td>';
					form_rendered += '<td><input name="product_name[]" type="text" class="form-control input-sm" value="'+ product_name +'"></td>';
					form_rendered += '<td><input name="product_sponsership[]" type="text" class="form-control input-sm" value=""></td>';
					form_rendered += '</tr>';
					$("#item_list").append( form_rendered );			
				});
		}
		});
		
	 }
	}
}
</script>
  
    
