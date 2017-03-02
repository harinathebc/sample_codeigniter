
<div class="page">
    <div class="page-header">
      <h1 class="page-title">Employees </h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/lists'); ?>">Employees</a></li>
        <li class="breadcrumb-item active">Employees</li>
      </ol>
      
	  <div class="page-header-actions">
        <a class="btn btn-sm btn-inverse btn-round" href="<?php echo site_url('user/import'); ?>" target="_blank">
          <i class="icon wb-upload" aria-hidden="true"></i>
          <span class="hidden-xs">Upload Employees</span>
        </a>
		 <a class="btn btn-sm btn-inverse btn-round" href="<?php echo site_url('user/add'); ?>">
          <i class="icon wb-user" aria-hidden="true"></i>
          <span class="hidden-xs">Add Employee</span>
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
		<?php if($this->session->flashdata('addcus')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('addcus');?></div>
		<?php endif; ?>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full table-responsive" id="exampleTableSearch">
            <thead>
              <tr>
                <th>Employee</th>
                <th>Email Id</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Status</th>
				 <th>Action</th>
                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Employee</th>
                <th>Email Id</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Status</th>
                <th>Action</th>
               
              </tr>
            </tfoot>
            <tbody>
             <?php 
			if(count($groupcustomers) > 0){
			foreach ($groupcustomers as $cus){
				//echo '<pre>';print_r($cus);exit;?>
              <tr>
                <td><a href="<?php echo site_url('user/userprofile'); ?>?id=<?php echo  base64_encode($cus['cust_id']).'__'.base64_encode($cus['group_id']);?>" style="text-decoration:none;"><?php echo htmlentities($cus['lastname']);?><?php echo htmlentities($cus['firstname']);?></a></td>
                <td><?php echo htmlentities($cus['email']);?></td>
                <td><?php echo htmlentities($cus['address1']);?></td>
                <td><?php echo htmlentities($cus['birthday']);?></td>
                <td><?php if(htmlentities($cus['status'])==1){ echo "Active";}else{ echo "Deactive";} ?></td>
                <td><a href="<?php echo base_url('user/edit'); ?>?id=<?php echo  base64_encode($cus['cust_id']);?>" style="text-decoration:none;">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url('user/delemp'); ?>?id=<?php echo  base64_encode($cus['cust_id']).'__'.base64_encode($cus['status']);?>" style="text-decoration:none;">Activate/Deactivate</a> </td>
               </tr>
              <?php } } else { echo '<tr><td colspan="4" align="center">No Employees</td></tr>';} ?>
            </tbody>
          </table>
        </div>
      </div>
	  </div>
