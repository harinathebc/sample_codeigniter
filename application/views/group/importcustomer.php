<?php if(isset($errors)) {
foreach($errors as $error){
	echo $error.'<br/>';
	
	}
} 
?>

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">File Uploads</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Employees</a></li>
        <li class="breadcrumb-item active">File Uploads</li>
      </ol>
      
    </div>
    <div class="page-content">
      <!-- Panel Dropify -->
      <div class="panel">
        
        <div class="panel-body container-fluid">
          
            <!-- Panel jQuery File Upload -->
			  <div class="panel panel-transparent">
				<div class="panel-heading">
				  <h3 class="panel-title p-x-0">Upload your File		
				  </h3>
				</div>
				<div class="page-content vertical-align-middle">
				<?php if($this->session->flashdata('importcustomer')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('importcustomer');?></div>
					<?php endif; ?>
				
					<?php if($this->session->flashdata('fileerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('fileerror');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('importerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('importerror');?></div>
					<?php endif; ?>
					</diV>
				<form class="upload-form" action="<?php echo site_url('user/importcustomers'); ?>" id="groupUploadForm" method="POST" enctype="multipart/form-data">
				  <input type="file" id="file" name="file" required="required" accept="application/xlsx"/>
				  
				  <input type="submit" name="submit" value="upload"/>
				</div>
				</form>
			  </div>
      <!-- End Panel jQuery File Upload -->
            
          
        </div>
      </div>
     
      
    </div>
