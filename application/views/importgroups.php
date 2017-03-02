<?php 
if(isset($errors)) {
foreach($errors as $error){
	//echo '<pre>';print_r($error);
	echo $error.'<br/>';
	}
} 
?>
<section  id="services-sec">
        <div class="container">
            <div class="row go-marg">
					<div style="color:red;"><?php if($this->session->flashdata('sucessmessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('sucessmessage');?></div>
					<?php endif; ?>
					</div>
					<div style="color:red;"><?php if($this->session->flashdata('fileerror')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('fileerror');?></div>
					<?php endif; ?>
					</div>
                   <div class="col-md-12">
                     	<form name ="userinput"  action="<?php echo site_url('association/importgroups'); ?>" enctype="multipart/form-data" method="POST">
							<div class="col-md-6">
								Import Customers
							</div>
							<div class="col-md-6">
								<input type="file" name="file" required="required" accept="application/xlsx"/>
							</div>
							<div class="col-md-6">
								<input type="submit" name="submit" value="upload"/>
							</div>
							<div class="col-md-6">
							</div>
						</form>
                    </div> 
               </div>
          </div>
          
    </section>
    