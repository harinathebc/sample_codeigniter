
     <!--END NAV SECTION -->
    <section  id="services-sec">
        <div class="container">
             <div class="row go-marg">
			 <div class="col-md-12">
				<div style="color:red;">
					<?php if($this->session->flashdata('addproductmessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('addproductmessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('editproduct')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('editproduct');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('editerror')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('editerror');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('adderror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('adderror');?></div>
					<?php endif; ?>
				</div>
				<table border="1px">
					<thead>
						<tr style="color:red">
						<th>Id:</th>
						<th>Product name:</th>
						<th>Sku:</th>
						<th>Price:</th>
						<th>Status:</th>
						<th>ACTION:</th>
						</tr>
					</thead>
					<tbody style="color:blue">
			<?php 
			if(count($allproducts) > 0){
			foreach ($allproducts as $allproduct){
				//echo '<pre>';print_r($allproduct);exit;?>
			<tr>
			<td><?php echo $allproduct['product_id'];?></td>
			<td><?php echo $allproduct['product_name'];?></td>
			<td><?php echo $allproduct['sku_id'];?></td>
			<td><?php echo $allproduct['price'];?></td>
			<td><?php if($allproduct['status']==1){ echo "Active";}else{ echo "Inactive";}?></td>
			<td style="color:red"><a href="<?php echo site_url('association/editproduct'); ?>?id=<?php echo  base64_encode($allproduct['product_id']).'__'.base64_encode($allproduct['sku_id']);?>" >Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('association/productactivate'); ?>?id=<?php echo  base64_encode($allproduct['product_id']).'__'.base64_encode($allproduct['status']);?>" >Activate/Deactivate</a> 
			</td>
			</tr>
			<?php } } else { echo '<tr><td colspan="5" align="center">No products are here</td></tr>';} ?>
		 </tbody>

				</table>
              </div>
            </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
