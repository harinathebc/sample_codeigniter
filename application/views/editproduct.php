
     <!--END NAV SECTION -->
    <section  id="services-sec">
        <div class="container">
            
                <div class="row go-marg">
                 <?php //echo '<pre>';print_r($productdata); ?>
                  
              <div class="col-md-12">
				<div style="color:red;"><?php if($this->session->flashdata('addproductmessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('addproductmessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('adderror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('adderror');?></div>
					<?php endif; ?>
				</div>
				<?php echo validation_errors(); ?>
				<form name ="userinput" action="<?php echo site_url('association/editproductpost'); ?>" method="POST">
				<input type="hidden" name="productid" id="productid" value="<?php echo htmlentities($productdata['product_id']);?>" />
					<div class="col-md-6 col-sm-6 alert-info">
                        <h4>Add product </h4>
						<div class="col-md-12">
							Product Name<input type="text" name="productname" id="productname" value="<?php echo htmlentities($productdata['product_name']);?>" required="required"/>
						</div>
						<div class="col-md-12">
							Sku Id<input type="text" name="skuid" id="skuid" value="<?php echo htmlentities($productdata['sku_id']);?>" readonly="readonly" required="required"/>
						</div>
						<div class="col-md-12">
						Description<textarea rows="1" cols="12" name="description"  required="required"><?php echo htmlentities($productdata['description']);?></textarea>
						</div>
						<div class="col-md-12">
							Price<input type="text" name="price" id="price" value="<?php echo htmlentities($productdata['price']);?>"  />
						</div>
						<div class="col-md-12">
						Short Description<textarea rows="1" cols="12" name="shortdescription" required="required"><?php echo htmlentities($productdata['short_desc']);?></textarea>
						</div>
						<div class="col-md-12">
						Category Name<input type="text" name="categry" id="categry"  value="<?php echo htmlentities($productdata['category_id']);?>" required="required"/>
						</div>
						<div class="col-md-12">
						Validity Time<input type="text" name="validitytime" id="validitytime" value="<?php echo htmlentities($productdata['valididty_period']);?>"  required="required"/>
						</div>
						
					</div>
					<div class="col-md-12">	
					<input type="submit" name="submit" value="Edit"/> 
					</div> 
				</form>					
                    </div> 
                            
                    </div>
                </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
