<div>
<section  id="services-sec">
        <div class="container">
            <div class="row go-marg">
				<?php if($this->session->flashdata('loginerror')): ?>
					<div class="bg-success"><?php echo $this->session->flashdata('loginerror');?></div>
					<?php endif; ?>
					<?php if($this->session->flashdata('createerror')): ?>
					<div class="bg-warning"><?php echo $this->session->flashdata('createerror');?></div>
					<?php endif; ?>
                   <div class="col-md-12">
                     	<form name ="userinput" action="<?php echo site_url('user/loginPost'); ?>" method="POST">
							<?php echo validation_errors(); ?>

							<div class="col-md-6">
								Username/password
							</div>
							<div class="col-md-6">
								<input type="text" name="email" id="email" autocomplete="off" value="<?php echo set_value('email');?>" required="required"/>
							</div>
							
							<div class="col-md-6">
								Password
							</div>
							<div class="col-md-6">
								<input type="password" name="password" autocomplete="off" value="<?php echo set_value('password');?>" required="required"/>
							</div>
							<div class="col-md-6">
								<input type="submit" name="submit" value="submit"/>
							</div>
							<div class="col-md-6">
								<a href="<?php echo site_url('user/forgotpassword'); ?>">Forgot password</a>
							</div>
						</form>
                    </div> 
               </div>
          </div>
          
    </section>
</div>
    
