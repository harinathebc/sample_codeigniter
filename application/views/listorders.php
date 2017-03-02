
     <!--END NAV SECTION -->
    <section  id="services-sec">
        <div class="container">
             <div class="row go-marg">
			 <div class="col-md-12">
				<div style="color:red;"><?php if($this->session->flashdata('addcus')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('addcus');?></div>
					<?php endif; ?>
					<div style="color:red;"><?php if($this->session->flashdata('updatemessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('updateerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('updateerror');?></div>
					<?php endif; ?>
				</div>
				<table border="1px">
					<thead>
						<tr style="color:red">
						<th>Order Id:</th>
						<th>NAME:</th>
						<th>Group Name:</th>
						<th>Total Amount:</th>
						<th>Discount:</th>
						<th>Status:</th>
						</tr>
					</thead>
					<tbody style="color:blue">
			<?php 
			if(count($allorders) > 0){
			foreach ($allorders as $orders){
				//echo '<pre>';print_r($allorders);exit;?>
			<tr>
			<td><?php echo htmlentities($orders['order_id']);?></td>
			<td><?php echo htmlentities($orders['lastname']);?><?php echo htmlentities($orders['firstname']);?></td>
			<td><?php echo htmlentities($orders['group_name']);?></td>
			<td><?php echo htmlentities($orders['order_total']);?></td>
			<td><?php echo htmlentities($orders['discount']);?></td>
			<td><?php if(htmlentities($orders['order_status'])==1){ echo "Completed";}else{ echo "Pending";}?></td>
			</td>
			</tr>
			<?php } } else { echo '<tr><td colspan="4" align="center">No Orders</td></tr>';} ?></tbody>

				</table>
              </div>
            </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
