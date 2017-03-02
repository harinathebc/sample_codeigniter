
<div class="page">
    <div class="page-header">
      <h1 class="page-title">Estimates</h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item active">Estimates</li>
      </ol>
	<div class="page-header-actions">
	<a href="<?php echo site_url('user/addquote'); ?>" class="btn btn-sm btn-inverse btn-round">
	  <i aria-hidden="true" class="icon wb-plus"></i>
	  <span class="hidden-xs">New Estimate</span>
	</a>
	</div>
	  
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      
      <!-- Panel Table Individual column searching -->
      <div class="panel">
        <div class="panel-body container-fluid">
          <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
            <thead>
              <tr>
                <th>#</th>
		<th>Client Name</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tfoot>
              <!--<tr>
                <th>#</th>
		<th>Name</th>
		<th>&nbsp;</th>
               
              </tr> -->
            </tfoot>
            <tbody>
             <?php 
			if(count($invoices) > 0){
			foreach ($invoices as $invoice){
				//echo '<pre>';print_r($product);exit;?>
              <tr>
                <td><a href="<?php echo base_url('user/viewquote/'.base64_encode($invoice['quote_id'])); ?>" style="text-decoration:none;"><?php echo $invoice['quote_id'];?></a></td>
		<td><?php echo $invoice['name'];?></td>
                <td><a href="<?php echo base_url('user/viewquote/'.base64_encode($invoice['quote_id'])); ?>" style="text-decoration:none;">View</a> | <a target="_blank" href="<?php echo base_url('user/pdf/'.base64_encode($invoice['quote_id'])); ?>" style="text-decoration:none;">Print</a>
	
 		</td>
               </tr>
              <?php } } else { echo '<tr><td colspan="4" align="center">No Estimations</td></tr>';} ?>
            </tbody>
          </table>
        </div>
      </div>
	  </div>
</div>
<script>
$(document).ready(function() {
    $('#exampleTableSearch').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
</script>
