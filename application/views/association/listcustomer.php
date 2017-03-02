
<div class="page">
    <div class="page-header">
      <h1 class="page-title">Employees </h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/listall'); ?>">Employees</a></li>
        <li class="breadcrumb-item active">Employees</li>
      </ol>
      
	  
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      
      <!-- Panel Table Individual column searching -->
      <div class="panel">
		<?php if($this->session->flashdata('updatemessage')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('updatemessage');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('addcus')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('addcus');?></div>
		<?php endif; ?>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
            <thead>
              <tr>
                <th>Employee</th>
                <th>Email Id</th>
                <th>Group Name</th>
                <th>Date of Birth</th>
                <th>Status</th>
                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Employee</th>
                <th>Email Id</th>
				<th>Group Name</th>
                <th>Date of Birth</th>
                <th>Status</th>
               
              </tr>
            </tfoot>
            <tbody>
             <?php 
			if(count($customers) > 0){
			foreach ($customers as $cus){
				//echo '<pre>';print_r($cus);exit;?>
              <tr>
                <td><?php echo htmlentities($cus['lastname']);?><?php echo htmlentities($cus['firstname']);?></td>
                <td><?php echo htmlentities($cus['email']);?></td>
                <td><?php echo htmlentities($cus['group_name']);?></td>
                <td><?php echo htmlentities($cus['birthday']);?></td>
                <td><?php if(htmlentities($cus['status'])==1){ echo "Active";}else{ echo "Deactive";} ?></td>
               </tr>
              <?php } } else { echo '<tr><td colspan="4" align="center">No Employees</td></tr>';} ?>
            </tbody>
          </table>
        </div>
      </div>
	  </div>
