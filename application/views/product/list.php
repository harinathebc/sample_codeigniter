
<div class="page">
    <div class="page-header">
      <h1 class="page-title">Products</h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('product/lists'); ?>">Products</a></li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
      
	  <div class="page-header-actions">
        
		 <a class="btn btn-sm btn-inverse btn-round" href="<?php echo site_url('product/add'); ?>">
          <i class="icon wb-user" aria-hidden="true"></i>
          <span class="hidden-xs">Add Product</span>
        </a>
		
		
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
		<?php if($this->session->flashdata('updatemessage')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('addproduct')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('addproduct');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('editsuucess')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('editsuucess');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('editerror')): ?>
		<div class="bg-warning"><?php echo $this->session->flashdata('editerror');?></div>
		<?php endif; ?>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>price</th>
                <th>Create Date</th>
                <th>Valididty Period</th>
                <th>Status</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Product Name</th>
                <th>price</th>
                <th>Create Date</th>
                <th>Valididty Period</th>
                <th>Status</th>
                <th>Action</th>
               
              </tr>
            </tfoot>
            <tbody>
             <?php 
			if(count($productlist) > 0){
			foreach ($productlist as $product){
				//echo '<pre>';print_r($product);exit;?>
              <tr>
                <td><?php echo htmlentities($product['product_name']);?></td>
                <td><?php echo htmlentities($product['price']);?></td>
                <td><?php echo htmlentities($product['created_at']);?></td>
                <td><?php echo htmlentities($product['valididty_period']);?></td>
                <td><?php if(htmlentities($product['status'])==1){ echo "Active";}else{ echo "Deactive";} ?></td>
                <td><a href="<?php echo base_url('product/edit'); ?>?id=<?php echo  base64_encode($product['product_id']);?>" style="text-decoration:none;">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('product/delproduct'); ?>?id=<?php echo  base64_encode($product['product_id']).'__'.base64_encode($product['status']);?>" style="text-decoration:none;">Activate/Deactivate</a> </td>
               </tr>
              <?php } } else { echo '<tr><td colspan="4" align="center">No Orders</td></tr>';} ?>
            </tbody>
          </table>
        </div>
      </div>
	  </div>
