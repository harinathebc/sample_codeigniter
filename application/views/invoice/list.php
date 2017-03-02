
<div class="page">
    <div class="page-header">
      <h1 class="page-title">Invoices</h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item active">Invoices</li>
      </ol>
      
	  <div class="page-header-actions">
			
        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Export to CSV">
          <i class="icon fa-file-excel-o" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Export to PDF">
          <i class="icon fa-file-pdf-o" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Export to Word">
          <i class="icon fa-file-word-o" aria-hidden="true"></i>
        </button>
      
      </div>
	  
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      
      <!-- Panel Table Individual column searching -->
      <div class="panel">
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
            <thead>
              <tr>
                <th>Month</th>
		<th>Total Orders</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Month</th>
		<th>Orders</th>
                <th>Amount</th>
                <th>Status</th>
               
              </tr>
            </tfoot>
            <tbody>
             <?php 
			if(count($invoices) > 0){
			foreach ($invoices as $invoice){
				//echo '<pre>';print_r($product);exit;?>
              <tr>
                <td><?php echo date('Y-m-d',strtotime($invoice['date_of_invoice']));?></td>
		<td><?php echo $invoice['total_orders'];?></td>
                <td>$<?php echo $invoice['amount'];?></td>
                <td><?php echo $invoice['paid_status']==0?'Pending':'Paid';?></td>
                <td><a href="<?php echo base_url('invoice/view/'.base64_encode($invoice['invoice_id'])); ?>" style="text-decoration:none;">View</a> | <?php if($invoice['paid_status'] == 0) { ?><a href="<?php echo base_url('invoice/pay/'.base64_encode($invoice['invoice_id'])); ?>" style="text-decoration:none;">Pay</a>
	<?php } else { ?>
<span>Paid<span>
<?php } ?>
 </td>
               </tr>
              <?php } } else { echo '<tr><td colspan="4" align="center">No Invoices</td></tr>';} ?>
            </tbody>
          </table>
        </div>
      </div>
	  </div>
