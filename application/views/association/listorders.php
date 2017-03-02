<div class="page">
    <div class="page-header">
      <h1 class="page-title">Orders </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/orders'); ?>">Orders</a></li>
        <li class="breadcrumb-item active">Orders List</li>
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
      <div class="panel">
       	
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
            <thead>
              <tr>
                <th>Order #</th>
                <th>Employee</th>
				<th>Group Name</th>
                <th>Purchased on</th>
                <th>Order Total</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Order #</th>
                <th>Employee</th>
				<th>Group Name</th>
                <th>Purchased on</th>
                <th>Order Total</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
				<?php 
			if(count($listorders) > 0){
			foreach ($listorders as $orders){
				//echo '<pre>';print_r($orders);exit;?>
              <tr>
                <td><a href="<?php echo site_url('user/orderview'); ?>?id=<?php echo  base64_encode($orders['order_id']);?>"><?php echo htmlentities($orders['order_id']);?></a></td>
                <td><?php echo htmlentities($orders['lastname']);?><?php echo htmlentities($orders['firstname']);?></td>
                <td><?php echo htmlentities($orders['group_name']);?></td>
                <td><?php echo htmlentities($orders['purchase_date']);?></td>
                <td><?php echo htmlentities($orders['order_total']);?></td>
				<td class="actions">
                   <a href="<?php echo site_url('user/orderview'); ?>?id=<?php echo  base64_encode($orders['order_id']);?>"  class="btn btn-sm btn-icon btn-pure btn-primary"
                  data-toggle="tooltip" data-original-title="View Order"><i class="icon wb-file" aria-hidden="true"></i></a>
                   <a href="<?php echo site_url('user/printview'); ?>?id=<?php echo  base64_encode($orders['order_id']);?>"  target="_blank" class="btn btn-sm btn-icon btn-pure btn-danger"
                  data-toggle="tooltip" data-original-title="Print Order"><i class="icon wb-print" aria-hidden="true"></i></a>
                </td>		
              </tr>
			  <?php } } else { echo '<tr><td colspan="4" align="center">No Orders</td></tr>';} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>