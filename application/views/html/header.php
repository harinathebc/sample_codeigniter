<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>OnDefend - Partners</title>
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/pages/login-v3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/aspieprogress/asPieProgress.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-selective/jquery-selective.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/dashboard/team.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatables-bootstrap/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/advanced/masonry.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/tables/datatable.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/tables/datatable.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-wizard/jquery-wizard.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/formvalidation/formValidation.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/blueimp-file-upload/jquery.fileupload.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/webui-popover/webui-popover.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/toolbar/toolbar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/pages/invoice.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/advanced/masonry.css">
  <!-- Fonts -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <!--[if lt IE 9]-->
    <script src="../assets/vendor/html5shiv/html5shiv.min.js"></script>
   
  <!--[if lt IE 10]>
    <script src="../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../assets/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>assets/vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>
</head>
<?php if($this->session->userdata('userdetails')){
/////AFTER LOGIN
 ?>
<body class="animsition site-navbar-small ">
<?php } else {
/////BEFORE LOGIN
 ?>
<body class="animsition page-login-v3 layout-full">
<?php } ?>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<?php if($this->session->userdata('userdetails')): ?>
   <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <a class="navbar-brand navbar-brand-center" href="<?php echo base_url();?>">
        <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo site_url('assets/images/logo-mbl.png'); ?>">
        <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo site_url('assets/images/logo-mbl.png'); ?>">
      
      </a>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <!--<li class="nav-item hidden-sm-down" id="toggleFullscreen">
            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>-->
                   
        </ul>
		   <!-- Navbar Toolbar Right -->
         <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <?php $userdeetails = $this->session->userdata('userdetails');?>
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span>
                <!--<img src="<?php echo site_url('assets/images/imagelogo.jpg');?>" alt="Logo">-->
                <i aria-hidden="true" style="font-size:24px;" class="icon wb-user-circle"></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="<?php echo site_url('user/edit'); ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Company Profile</a>
              <!--<a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>-->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url('user/logout'); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
        
        </ul>
        <!-- End Navbar Toolbar Right -->
		</div>
	</div>
	</nav>
	<?php endif; ?>
        <!-- End Navbar Toolbar -->
		
		<?php 
		$customerdata=$this->session->userdata('userdetails');
		///echo '<pre>';print_r($customerdata);exit;
        if ($customerdata['role_id'] == 1 || $customerdata['role_id'] == 3) { 
		 require_once(APPPATH."views/html/header_user.php");
			
		}else{
			?>
			 
			
		<?php } ?>
