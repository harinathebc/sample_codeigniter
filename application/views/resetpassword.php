<div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
		<?php if($this->session->flashdata('error')): ?>
		<div class="bg-warning"><?php echo $this->session->flashdata('error');?></div>
		<?php endif; ?>	
      <form name="userinput" action="<?php echo site_url('user/resetpassword'); ?>" method="post" role="form">
        <input type="hidden" name="email"  value="<?php echo $email;?>"/>
		<input type="hidden" name="userid"  value="<?php echo $userid;?>"/>
		<div class="form-group">
		</div>
		<div class="form-group">
          <input type="password" class="form-control" name="password" autocomplete="off" placeholder="password"/>
        </div>
		<div class="form-group">
          <input type="password" class="form-control"  name="conpassword" autocomplete="off" placeholder="Conform Password"/>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Reset Your Password</button>
        </div>
      </form>
    </div>
</div>
 

    