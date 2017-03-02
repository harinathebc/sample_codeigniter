
     <!--END NAV SECTION -->
    <section  id="services-sec">
        <div class="container">
            
                <div class="row go-marg">
                 <?php //echo '<pre>';print_r($groupdata); ?>
                  
              <div class="col-md-12">
				<div style="color:red;"><?php if($this->session->flashdata('addproductmessage')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('addproductmessage');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('adderror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('adderror');?></div>
					<?php endif; ?>
				</div>
				<?php echo validation_errors(); ?>
				<form name ="userinput" action="<?php echo site_url('association/addproductpost'); ?>" method="POST">
					<div class="col-md-6 col-sm-6 alert-info">
                        <h4>Add product </h4>
						<div class="col-md-12">
							Product Name:<input type="text" name="productname" id="productname" required="required"/>
						</div>
						<div class="col-md-12">
							Sku Id:<input type="text" name="skuid" id="skuid"  required="required"/>
						</div>
						<div class="col-md-12">
						Description:<textarea rows="1" cols="12" name="description" required="required"></textarea>
						</div>
						<div class="col-md-12">
							Price:<input type="text" name="price" id="price"  required="required"/>
						</div>
						<div class="col-md-12">
						Short Description:<textarea rows="1" cols="12" name="shortdescription" required="required"></textarea>
						</div>
						<div class="col-md-12">
						Category Name:<input type="text" name="categry" id="categry"  required="required"/>
						</div>
						<div class="col-md-12">
						Validity Time:<input type="text" name="validitytime" id="validitytime"  required="required"/>
						</div>
						<div class="col-md-12">
						Image:<input type="file" name="image" id="image"  required="required"/>
						</div>
						
					</div>
					<div class="col-md-12">	
					<input type="submit" name="submit" value="Add"/> 
					</div> 
				</form>					
                    </div> 
                            
                    </div>
                </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
