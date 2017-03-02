
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
						<th>Id:</th>
						<th>Group NAME:</th>
						<th>Organization Id:</th>
						<th>Status:</th>
						<th>ACTION:</th>
						</tr>
					</thead>
					<tbody style="color:blue">
			<?php 
			if(count($allgroups) > 0){
			foreach ($allgroups as $group){
				//echo '<pre>';print_r($group);exit;?>
			<tr>
			<td><?php echo htmlentities($group['group_id']);?></td>
			<td><?php echo htmlentities($group['group_name']);?></td>
			<td><?php echo htmlentities($group['organization_id']);?></td>
			<td><?php if(htmlentities($group['status']==1)){ echo "Active";}else{ echo "Inactive";}?></td>
			<input type="hidden" name="email" value="<? echo htmlentities($cus['group_id']); ?>"/>
			<td style="color:red"><a href="<?php echo site_url('association/groupedit'); ?>?id=<?php echo base64_encode(htmlentities($group['group_id']));?>" >edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('association/delgroup'); ?>?id=<?php echo  base64_encode(htmlentities($group['group_id'])).'__'.base64_encode(htmlentities($group['status']));?>" ><?php if(htmlentities($group['status'])==1){ echo "Deactivate";}else{ echo "Activate";}?></a> 
			</td>
			</tr>
			<?php } } else { echo '<tr><td colspan="4" align="center">No Groups</td></tr>';} ?>
		 </tbody>

				</table>
              </div>
            </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
