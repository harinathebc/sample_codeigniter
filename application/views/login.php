<div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src="<?php echo site_url('assets/images/logo-mbl.png'); ?>" alt="Logo">
          </div>
			<?php if($this->session->flashdata('loginerror')): ?>
				<div id="alertmessages" class="alert dark alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
				<span class="sr-only">Close</span>
				</button>
				<span id="msg"><?php echo $this->session->flashdata('loginerror');?></span>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('logout')): ?>
			<div class="bg-warning"><?php echo $this->session->flashdata('createerror');?></div>
			<?php endif; ?>
			<?php if($this->session->flashdata('success')): ?>
			<div class="bg-success"><?php echo $this->session->flashdata('success');?></div>
			<?php endif; ?>

		<form class="form-horizontal" action="<?php echo base_url('user/loginpost');?>" id="userlogin_old" method="POST" autocomplete="off" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <div class="summary-errors alert alert-danger alert-dismissible" style="display: none;">
                  <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                  </button>
                  <p>Errors list below: </p>
                  <ul></ul>
                </div>
               <div class="form-group row">
                  <input class="form-control" name="email" data-fv-field="email" id="email" type="text" placeholder="Username/E-mail" >
                  <small style="display: none;" class="text-help" data-fv-validator="notEmpty" data-fv-for=" emailAddress" data-fv-result="NOT_VALIDATED">The username is required and cannot be empty</small>
               </div>
               <div class="form-group row">
                  <input class="form-control" name="password" data-fv-field="password" id="password" type="password" placeholder="Password" >
                  <small style="display: none;" class="text-help" data-fv-validator="notEmpty" data-fv-for="password" data-fv-result="NOT_VALIDATED">The password is required and cannot be empty</small>
                </div>
			
            <div class="form-group clearfix">             
              <a class="pull-xs-right" href="<?php echo site_url('user/forgotpassword'); ?>">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg m-t-40" id="validateButton4">Sign in</button>
          </form>
		<p>Still no account? Please go to <a href="<?php echo base_url('user/register');?>">Sign up</a></p>
        </div>
      </div>
   </div>
  </div>
