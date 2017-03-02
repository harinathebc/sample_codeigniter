<?php
$grand_total = 0;
// Calculate grand total.
if ($cart = $this->cart->contents()):
    foreach ($cart as $item):
        $grand_total = $grand_total + $item['subtotal'];
    endforeach;
endif;
?>

        <div id="bill_info">
                    <h1 align="center">Payment Information</h1>
		<div class="container">
	<div style="float:middle;"><span><b>Amount</b></span>$<?php echo number_format($grand_total, 2); ?></div>

</div>
</div>
<form class="form-horizontal" role="form" name="billing" method="post" action="<?php echo base_url() . 'cart/singlepay' ?>">
    <fieldset>
<div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Type</label>
	<div class="row">
        <div class="col-sm-3">Single
          <input type="radio" name="paymenttype" id="paymenttype" value="single">
        </div>
	<div class="col-sm-3">Subscription
          <input type="radio" name="paymenttype" id="subscription" value="subscription">
        </div>
	</div>
      </div>

	<div class="form-group">
        <label for="expiry-month" class="col-sm-3 control-label">Payment Type</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <span>Credit Card/Debit Card</span><input type="radio" name="method" value="credit" />
            </div>
            <div class="col-xs-3">
		<span>E-Check</span><input type="radio" name="method" value="echeck" />
            </div>
          </div>
        </div>
	<div id="echeckform">
      <legend>E-Check Details</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Account Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="accountnumber" id="card-holder-name" placeholder="Account Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Route Number:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="routenumber" id="card-number" placeholder="Route Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Bank Name:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="bankname" id="card-number" placeholder="Bank Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="Name on Account">Name on Account:</label>
        <div class="col-sm-9">
		<input type="text" class="form-control" name="nameonaccount" id="nameonaccount" placeholder="Name on Account">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="Account Type">Account Type</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="accounttype" id="accounttype" placeholder="Account Type">
        </div>
      </div>
	
	</div>
<!---ENDING ID-->

<div id="creditcardform">
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card_num">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card_num" id="card-number" placeholder="Card Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="cd_month" id="expiry-month">
                <option>Month</option>
		<?php $months = array('01'=>'Jan (01)','02'=>'Feb (02)','03'=>'Mar (03)','04'=>'Apr (04)','05'=>'May (05)','06'=>'Jun(06)','07'=>'Jul (07)','08'=>'Aug (08)','09'=>'Sep (09)','01'=>'Oct (10)','11'=>'Nov (11)','12'=>'Dec (12)');
		foreach($months as $key=>$value)
		{
		echo '<option value='.$key.'>'.$value.'</option>';
		}
		?>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="cd_year">
                <?php $year = date('Y');
		$endyear = $year + 10;
		for($i=$year;$i<=$endyear;$i++) { ?>
		<option value="<?php echo $i;?>"><?php echo $i;?></option>
		<?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="b_code" id="b_code" placeholder="Security Code">
        </div>
      </div>
</div>
<!---ENDING CREDIT CARD FORM -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success">Pay Now</button>
        </div>
      </div>
    </fieldset>
  </form>


</div>


                   <!-- <table border="0" cellpadding="2px" >
			<tr><td>
                        <tr><td>Order Total:</td><td><strong>$<?php echo number_format($grand_total, 2); ?></strong></td></tr>
                        <tr><td>Name On the Card:</td><td><input type="text" name="name" required=""/></td></tr>
			<tr><td>Card Number:</td><td><input type="text" name="card_num" required="" /></td></tr>
			<tr><td>Card Code:</td><td><input type="text" name="b_code" required="" /></td></tr>
			<tr><td>Month|Year:</td><td><input type="text" name="cd_month" required="" size="2" />|<input type="text" name="cd_year" size="2" /></td></tr>
                        <tr>
				<td><a class ='fg-button teal' id='back' href=" . base_url() . "cart>Back</a></td>
				<td><input type="submit" class ='fg-button teal' value="Place Order" /></td>
			</tr> 
                     
                    </table>
		<table border="0" cellpadding="2px" id="echeckform">
		<tr><td>Order Total:</td><td><strong>$<?php echo number_format($grand_total, 2); ?></strong></td></tr>
		<tr><td>Account Number</td><td><input type="text" name="accountnumber" required=""/></td></tr>
		<tr><td>Route Number:</td><td><input type="text" name="routenumber" required=""/></td></tr>
		<tr><td>Bank Name:</td><td><input type="text" name="bankname" required="" /></td></tr>
		<tr><td>Name on Account:</td><td><input type="text" name="nameonaccount" required="" /></td></tr>
		<tr><td>Bank Account type:</td><td><input type="text" name="accounttype" required="" /></td></tr>
		<tr><td>
		// This button for redirect main page.
		<a class ='fg-button teal' id='back' href=" . base_url() . "cart>Back</a>
		    </td><td><input type="submit" class ='fg-button teal' value="Place Order" /></td></tr> 

		</table> -->
                </div>
            </form
        </div>

<script>
$(document).ready(function() {
$('#creditcardform').hide();
$('#echeckform').hide();
    $('input[type=radio][name=method]').change(function() {
        if (this.value == 'credit') {
		$('#creditcardform').show();
		$('#echeckform').hide();

        }
        else if (this.value == 'echeck') {
            $('#creditcardform').hide();
		$('#echeckform').show();
        }
    });
});
</script>
