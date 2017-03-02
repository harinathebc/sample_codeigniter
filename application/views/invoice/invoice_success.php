  <!-- Page -->
  <div class="page">
  <div class="page-header">
      <h1 class="page-title">Payment Information </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/view');?>">Invoice List</a></li>
        <li class="breadcrumb-item active">Payment Information</li>
      </ol>
    </div>
    <div class="page-content">
     <div class="row">
        <div class="col-xs-12">
          <!-- Example Panel With Heading -->
		<div id='result_div'>
		    <h1 align='center'>Thank You! your invoice paid successfully!</h1>
			<h2>Order information</h2>
			<p>Order ID: <a href="<?php echo base_url('user/orderview?id='.base64_encode($paymentdetails['order_id']));?>"><?php echo $paymentdetails['order_id'];?></a>
			<h2>Payment information</h2>
			<?php if($payment_info['type'] == 'SUBSCRIPTIONS'){ ?>
			<p>Subscription ID: <?php echo $payment_info['id'];?> AMOUNT: <?php echo $payment_info['amount'];?></p>
			<?php } else { ?>
			<p>Transaction ID: <?php echo $payment_info['id'];?>
			<?php } ?>
		   <span id='go_back'><a class='fg-button teal' href="<?php echo base_url();?>"cart>Go back</a></span>
		</div>
<!-- End Example Panel With Heading -->
        </div>
		
    </div>
  </div>
  </div>
  <!-- End Page -->

