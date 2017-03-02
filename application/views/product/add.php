<div class="page">
  <div class="panel-body">
	 <div class="page-content container-fluid">
	   <div class="col-xs-12 col-lg-12 col-md-12">
	     <div class="panel-body" id="addproduct">
		<?php if($this->session->flashdata('addproduct')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('addproduct');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('adderror')): ?>
		<div class="bg-warning"><?php echo $this->session->flashdata('adderror');?></div>
		<?php endif; ?>
		 <?php echo validation_errors(); ?>
                  <form id="productname" name="productname" action="<?php echo site_url('product/addpost'); ?>" enctype="multipart/form-data" method="POST">
				  <div class="form-group">
                      <label class="form-control-label" for="productname">Product Name</label>
                      <input type="text" class="form-control" id="productname" name="productname" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="skuid">Sku Id</label>
                      <input type="text" class="form-control" id="skuid" name="skuid" required="required">
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="description">Description</label>
                      <textarea type="text" class="form-control" row="5" id="description" name="description" ></textarea>
                    </div>
					<div class="form-group">
                      <label class="form-control-label" for="shortdescription">Short Description</label>
                      <textarea type="text" class="form-control" row="5" id="shortdescription" name="shortdescription" ></textarea>
                    </div>
                    
					<div class="form-group">
                      <label class="form-control-label" for="Price">Price</label>
                      <input type="text" class="form-control" id="price" name="price" required="required">

					</div>
					<div class="form-group">
                      <label class="form-control-label" for="period">Valididty period</label>
                        <input type="text" class="form-control icon wb-calendar" aria-hidden="true" data-plugin="datepicker" id="valididityperiod" name="valididityperiod" autocomplete="off">
                    </div> 
					<div class="form-group">
                      <label class="form-control-label" for="image">Image</label>
                      <input type="file"  id="image" name="image" required="required">
                    </div>
					<div class="input-group">
					 <button type="submit" name="submit" class="btn btn-outline btn-primary">Add</button>
				  </div>
					</form>
				</div>	
                </div>
			</div>
		</div>
	 </div>
	</div>