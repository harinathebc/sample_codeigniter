 <!-- Page -->
  <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
	<?php if($this->session->flashdata('loginerror')): ?>
	<div class="bg-success"><?php echo $this->session->flashdata('loginerror');?></div>
	<?php endif; ?>
	<?php if($this->session->flashdata('createerror')): ?>
	<div class="bg-warning"><?php echo $this->session->flashdata('createerror');?></div>
	<?php endif; ?>
	<?php if($this->session->flashdata('success')): ?>
	<div class="bg-success"><?php echo $this->session->flashdata('success');?></div>
	<?php endif; ?>
	<?php if(validation_errors()){ ?>
		<div role="alert" class="alert dark alert-icon alert-danger alert-dismissible">
                  <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                    <span aria-hidden="true">×</span>
                  </button>
<?php echo validation_errors();?>
                </div>
	<?php } ?>

            <img class="brand-img" src="<?php echo base_url().'/assets/images/logo-mbl.png';?>" alt="...">
           
          </div>
		  
          <form class="form-horizontal" action="#" id="register" method="POST" autocomplete="off" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <div class="summary-errors alert alert-danger alert-dismissible" style="display: none;">
                  <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                  </button>
                  <p>Errors list below: </p>
                  <ul></ul>
                </div>
           <div class="form-group ">
                  <input class="form-control" name="fullname" data-fv-field="FullName" type="text" placeholder="Full Name">
                  <small style="display: none;" class="text-help" data-fv-validator="notEmpty" data-fv-for="FullName" data-fv-result="NOT_VALIDATED">The FullName is required and cannot be empty</small>
                </div>
             <div class="form-group ">
                  <input class="form-control" name="email" data-fv-field="Email" type="text" placeholder="Email Address">
                  <small style="display: none;" class="text-help" data-fv-validator="notEmpty" data-fv-for="Email" data-fv-result="NOT_VALIDATED">The Email Address is required and cannot be empty</small>
                </div>
            <div class="form-group ">
                  <input class="form-control" name="password" id="passwordreg" data-fv-field="passwordreg" type="password" placeholder="Password">
                  <small style="display: none;" class="text-help" data-fv-validator="notEmpty" data-fv-for="passwordreg" data-fv-result="NOT_VALIDATED">The  Password is required and cannot be empty</small>
                </div>
            <div class="form-group ">
                  <input class="form-control" name="cpassword" data-fv-field="cpassword" type="password" placeholder="Confirm Password">
                  <small style="display: none;" class="text-help" data-fv-validator="notEmpty" data-fv-for="cpassword" data-fv-result="NOT_VALIDATED">The FullName is required and cannot be empty</small>
                </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg m-t-40" id="validateButton4">Sign up</button>
          </form>
          <p>Have account already? Please go to <a href="<?php echo base_url('user/login');?>">Sign In</a></p>
        </div>
      </div>
      <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY Ondefend</p>
        <p>© 2016. All RIGHT RESERVED.</p>
        <div class="social">
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->
<div class="clear"></div>
