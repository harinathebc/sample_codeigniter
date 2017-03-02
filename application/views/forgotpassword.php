<div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <h2>Forgot Your Password ?</h2>
      <p>Input your registered email to reset your password</p>
		<?php if($this->session->flashdata('success')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('success');?></div>
		<?php endif; ?>
		<?php if($this->session->flashdata('emailinvalid')): ?>
		<div class="bg-success"><?php echo $this->session->flashdata('emailinvalid');?></div>
		<?php endif; ?>	
      <form name="userinput" action="<?php echo site_url('user/forgotpasswordemail'); ?>" method="post" role="form">
        <div class="form-group">
          <input type="email" class="form-control"  name="email" id="email"  placeholder="Your Email" autocomplete="off" value="<?php echo set_value('email');?>" required="required"/>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Reset Your Password</button>
        </div>
      </form>
    </div>
  </div>
