  <!-- Page -->
  <div class="page">
  <div class="page-header">
      <h1 class="page-title">Payment Information </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('invoice/view/'.base64_encode($details['invoice_id']));?>">Invoice Information</a></li>
        <li class="breadcrumb-item active">Payment Information</li>
      </ol>
    </div>
    <div class="page-content">
	
     <div class="row">
        <div class="col-xxl-4 col-lg-6 col-xs-12">
          <!-- Example Panel With Heading -->
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title">Invoice Summary</h3>
            </div>
            <div class="panel-body">
             <table class="table table-hover">
              <thead>
                <tr>
                  <th>Total Amount</th>
		  <th>Status</th>
                  <!--<th>Price</th>-->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>$<?php echo $details['amount']; ?></td>
		 <td><?php echo $details['paid_status']==0?'Pending':'Paid'; ?></td>
                </tr>    
              </tbody>
            </table>
            </div>
          </div>
	
          <!-- End Example Panel With Heading -->
        </div>
	
        <div class="col-xxl-8 col-lg-6 col-xs-12">
          <!-- Example Panel With Heading -->
          <div class="panel panel-bordered">
            <div class="panel-heading">
	      <h3 class="panel-title">Payment</h3>
              <!--<h3 class="panel-title">Payment Information</h3>-->
            </div>
			
		<div style="display:none;" id="alertmessages" class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
              </button>
              <span id="msg"></span>
            </div>
	    <?php if(isset($error_msg) && $error_msg!='') { ?>
		<div id="alertmessages" class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
              </button>
              <span id="msg"><?php echo $error_msg;?></span>
            </div>
	<?php } ?>
            <div class="panel-body">
             <div class="example-wrap">
			 <label class="col-xs-12 col-md-2 form-control-label"><h4>Payment</h4></label>
			 <div class="col-xs-12 col-md-10">
                <div class="nav-tabs-horizontal" data-plugin="tabs">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">Credit / Debit Card</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">Bank Checking Account</a></li>
                    <li class="dropdown nav-item" role="presentation" style="display: none;">
                      <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">Menu </a>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">Credit / Debit Card</a>
                        <a class="dropdown-item" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">Bank Checking Account</a>                        
                      </div>
                    </li>
                  </ul>
                  <div class="tab-content p-t-20">
                    <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">
                      <form class="form-horizontal" method="post" action="<?php echo base_url() . 'invoice/processpay/'.base64_encode($details['invoice_id']) ?>" onsubmit="return checkcreditcard();">
			<input type="hidden" name="paymenttype1" id="paymenttype1" value="subscription"/> 
			<input type="hidden" name="method1" id="method1" value="credit"/>                    
			<div class="form-group">
                       <input type="text" class="form-control" name="card_name" id="card_name"  placeholder="Card Holder Name" autocomplete="off">
                    </div>
                     <div class="form-group">
                       <input type="text" class="form-control" name="card_num" id="card_num"  placeholder="16 Digit Card Number" autocomplete="off">
                    </div>
					<div class="form-group">
			<div class="row">
					  <div class="col-md-6">
                       <select class="form-control col-sm-2" name="cd_month" id="cd_month">
                <option value="">Month</option>
		<?php $months = array('01'=>'Jan (01)','02'=>'Feb (02)','03'=>'Mar (03)','04'=>'Apr (04)','05'=>'May (05)','06'=>'Jun(06)','07'=>'Jul (07)','08'=>'Aug (08)','09'=>'Sep (09)','01'=>'Oct (10)','11'=>'Nov (11)','12'=>'Dec (12)');
		foreach($months as $key=>$value)
		{
		echo '<option value='.$key.'>'.$value.'</option>';
		}
		?>
              </select>
            </div>
            <div class="col-xs-6">
              <select class="form-control" name="cd_year" id="cd_year">
		<option value="">Year</option>
                <?php $year = date('Y');
		$endyear = $year + 10;
		
		for($i=$year;$i<=$endyear;$i++) { ?>
		<option value="<?php echo $i;?>"><?php echo $i;?></option>
		<?php } ?>
              </select>
                      </div>
		</div>

		</div>
		<div class="form-group col-xs-6">

                       <input type="text" class="form-control" name="b_code" id="b_code"  placeholder="CVV Code" autocomplete="off">
			</div>

			<div class="form-group">
                      <div class="col-xs-12 col-md-12 offset-md-4">
			<a class="btn btn-default" role="button" href="<?php echo base_url('invoice/view/'.base64_encode($details['invoice_id']));?>">Back</a>
                        <button type="submit" class="btn btn-success">Submit Payment </button>
                      
                      </div>
                    	</div>
                    
                  </form>
                    </div>
                    <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">
                      <form class="form-horizontal" method="post" action="<?php echo base_url() . 'invoice/processpay/'.base64_encode($details['invoice_id']) ?>" onsubmit="return checkcaccount();">
			<input type="hidden" name="paymenttype2" id="paymenttype2" value="subscription"/>
			<input type="hidden" name="method2" value="echeck"/>
					  <div class="form-group row col-md-12">                          
                        <input type="text" class="form-control" placeholder="Name of the Bank" id="bank_name" name="bank_name" autocomplete="off">
                        </div>
					   <div class="form-group row  col-md-12">                          
                        <input type="text" class="form-control" placeholder="Account Holder Name" name="bank_acct_name" id="bank_acct_name" autocomplete="off">
                        </div>
                    <div class="form-group row  col-md-12">                          
                        <input type="text" class="form-control" placeholder="Account Number" id="bank_acct_num" name="bank_acct_num" autocomplete="off">
                        </div>
					<div class="form-group row  col-md-12">                          
                        <input type="text" class="form-control" placeholder="Routing Number" name="bank_aba_code" id="bank_aba_code" autocomplete="off">
                        </div>
			<div class="form-group row">
					<a class="btn btn-default" role="button" href="<?php echo base_url('invoice/view/'.base64_encode($details['invoice_id']));?>">Back</a>
                      <div class="col-xs-12 col-md-12 offset-md-4">
			
                        <button type="submit" class="btn btn-success">Submit Payment </button>
                      
                      </div>
                    	</div>
					
					</form>
                    </div>
                 
                  </div>
                </div>
				</div>
              </div>
            </div>
          </div>
          <!-- End Example Panel With Heading -->
        </div>
		
    </div>
  </div>
  </div>
  <!-- End Page -->
<script>
function checkaccount()
{
	if($('#card_name').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please enter Card Holder name");
		return false;	
	}
	if($('#card_num').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please enter Card Number");
		return false;	
	}
	if($('#cd_month').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please select month");
		return false;	
	}
	if($('#cd_year').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please select year");
		return false;	
	}
	if($('#b_code').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please enter Cvv");
		return false;	
	}
	return true;


}

function checkcreditcard()
{
	if($('#card_name').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please enter Card Holder name");
		return false;	
	}
	if($('#card_num').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please enter Card Number");
		return false;	
	}
	if($('#cd_month').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please select month");
		return false;	
	}
	if($('#cd_year').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please select year");
		return false;	
	}
	if($('#b_code').val() =='')
	{
		$('#alertmessages').show();
		$('#msg').html("Please enter Cvv");
		return false;	
	}
	return true;


}
$('input[type=radio][name=paymenttype]').change(function() {
	alert(this.value);
        if (this.value == 'single') {
		$('#paymenttype1').val('single');
		$('#paymenttype2').val('single');

        }
        else if (this.value == 'subscription') {
		$('#paymenttype1').val('subscription');
		$('#paymenttype2').val('subscription');
        }
    });

</script>
