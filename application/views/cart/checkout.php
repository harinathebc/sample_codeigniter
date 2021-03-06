  <!-- Page -->
  <div class="page">
  <div class="page-header">
      <h1 class="page-title">Payment Information </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/view');?>">Product List</a></li>
        <li class="breadcrumb-item active">Payment Information</li>
      </ol>
    </div>
    <div class="page-content">
	
     <div class="row">
        <div class="col-xxl-4 col-lg-6 col-xs-12">
          <!-- Example Panel With Heading -->
          <div class="panel panel-bordered">
            <div class="panel-heading">
              <h3 class="panel-title">Order Summary</h3>
            </div>
            <div class="panel-body">
             <table class="table table-hover">
              <thead>
		<?php if(count($this->cart->contents())>0){ ?>
                <tr>
                  <th>Product</th>
		  <th>Qty</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
		<?php 
		foreach($this->cart->contents() as $items): ?>
                <tr>
                  <td><?php echo $items['name']; ?></td>
		  <td><?php echo $items['qty']; ?></td>
                  <td>$<?php echo $this->cart->format_number($items['price']); ?></td>
	          <!--<td><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
              </button></td> -->
                </tr>
                <?php endforeach; ?>  
		<tr>
                  <td colspan="2"><b>Total</b></td>
                  <td>$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr> 
		<?php } else { ?>
		<tr>
		<td colspan="2">No items in the cart</td>
		</tr>
		<?php } ?>      
              </tbody>
            </table>
		<div><a href="<?php echo base_url('cart/empty_cart');?>">Empty Cart</a></div>
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
			<label class="col-xs-12 col-md-4 form-control-label"><h4>Subscription</h4><!--<h4>Subscription Type</h4>--></label>
			<form class="form-horizontal">                     
                        <div class="form-group col-md-4 col-xs-6">
                        <input type="radio" class="to-labelauty" name="paymenttype" data-plugin="labelauty" value="subscription"
                        data-labelauty="$<?php echo number_format($this->cart->format_number($this->cart->total())/12,2);?> / month" checked/>
                      </div>
                      <div class="form-group col-md-4 col-xs-6">
                        <input type="radio" class="to-labelauty" name="paymenttype" value="single" data-plugin="labelauty"
                        data-labelauty="$<?php echo number_format($this->cart->format_number($this->cart->total()),2);?> / Year" />
                      </div>       
					
            </form>
			</div>
			<!--<div class="example">
			<label class="col-xs-12 col-md-4 form-control-label"><h4>Billing Address</h4></label>
			<div class="col-xs-12 col-md-8">
                  <form class="form-horizontal">
                    <div class="form-group">
                     <input type="text" class="form-control" name="address1" placeholder="Address 1" autocomplete="off"/>                    
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="address2" placeholder="Address 2" autocomplete="off"/>
                    </div>
					<div class="row">
                    <div class="form-group col-md-5">
                       <input type="text" class="form-control" name="city" placeholder="City" autocomplete="off"/>
					   
                     </div>
					<div class="form-group  col-md-4">
                        <input type="text" class="form-control" name="state" placeholder="State" autocomplete="off"/>
                    
                    </div>
					<div class="form-group col-lg-3 col-md-3">
                     <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" autocomplete="off"/>
                      
                    </div>
					</div>                   
                  </form> 
				  </div>
                </div>-->
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
                      <form class="form-horizontal" method="post" action="<?php echo base_url() . 'cart/pay' ?>" onsubmit="return checkcreditcard();">
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
			<a class="btn btn-default" role="button" href="<?php echo base_url('product/view');?>">Back</a>
                        <button type="submit" class="btn btn-success">Submit Payment </button>
                      
                      </div>
                    	</div>
                    
                  </form>
                    </div>
                    <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">
                      <form class="form-horizontal" method="post" action="<?php echo base_url() . 'cart/pay' ?>" onsubmit="return checkcaccount();">
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
					<a class="btn btn-default" role="button" href="<?php echo base_url('product/view');?>">Back</a>
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
			<div class="panel-footer">
			<!---<div class="form-group row">
                      <div class="col-xs-12 col-md-12 offset-md-4">
                        <button type="button" class="btn btn-success">Submit Payment </button>
                        
                      </div>
                    	</div>-->
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
