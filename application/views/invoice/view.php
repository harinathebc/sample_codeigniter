<div class="page">
    <div class="page-header">
      <h1 class="page-title">Invoice Information </h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/orders'); ?>">Orders</a></li>
	<li class="breadcrumb-item active"><a href="<?php echo site_url('invoice'); ?>">Invoice</a></li>
        <li class="breadcrumb-item active">Invoice Information</li>
      </ol>
    </div>
    <div class="page-content">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row">
		<?php if($this->session->flashdata('success')) { ?>
		<div role="alert" class="alert dark alert-success alert-dismissible">
		  <button aria-label="Close" data-dismiss="alert" class="close" type="button">
		    <span aria-hidden="true">×</span>
		  </button>
		 <?php echo $this->session->flashdata('success');?>
		</div>
		<?php } ?>
            <div class="col-xs-12 col-lg-3">
              <h4>
                <img class="m-r-10" src="<?php echo site_url('assets//images/logo-mbl.png'); ?>" alt="..."></h4>
					<?php ///echo '<pre>';print_r($details);exit;?>
              
            </div>
            <div class="col-xs-12 col-lg-3 offset-lg-6 text-xs-right">
          </div>
          <div class="page-invoice-table table-responsive">
            <table class="table table-hover text-xs-right">
              <thead>
                <tr>
                  <th class="text-xs-center">#</th>
                  <th>Total Orders</th>
                  <th class="text-xs-right">Amount</th>
                  <th class="text-xs-right">Invoice Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-xs-center">
                   <?php echo $details['invoice_id'];?>
                  </td>
                  <td class="text-xs-left">
                  <?php echo $details['total_orders'];?>
                  </td>
                  <td>
                  <?php echo $details['amount'];?>
                  </td>
                  <td>
                    <?php echo date('Y-m-d',strtotime($details['date_of_invoice']));?>
                  </td>
                  
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="text-xs-right clearfix">
            <div>

              <p class="page-invoice-amount">Grand Total:
                <span>$<?php echo $details['amount'];?></span>
              </p>
            </div>
	<div class="clear"></div>
 		<div class="pull-xs-right">
		<?php if($details['paid_status'] == 0){ ?>
                <a href="<?php echo base_url('invoice/pay/'.base64_encode($details['invoice_id']));?>" style="curser:none;" class="btn btn-outline btn-primary">Pay Invoice</a>
<?php } else { ?>
		<a href="javascript:void(0);" class="btn btn-outline btn-primary">Paid</a>
		<?php } ?>
              </div>
          </div>
         
        </div>
      </div>
      <!-- End Panel -->
    </div>
  </div>
