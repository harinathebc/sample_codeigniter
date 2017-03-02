<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Multipager Template- Travelic </title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-animation.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/core.css" media="screen" rel="stylesheet" type="text/css" />
 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/js.js"></script>

   </head>
<body>
     <!-- NAV SECTION -->
         <div class="navbar navbar-inverse navbar-fixed-top">
       
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">YOUR LOGO</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
			<?php  $customerdata= $this->session->userdata('userdetails');  

			//echo "<pre>";print_r($customerdata);exit;?>
			
				<?php if (htmlentities($customerdata['role_id']) ==2) {  ?>

					<li><a href="<?php echo site_url('user/dashboard'); ?>">profile</a></li>
					<li><a href="<?php echo site_url('group/dashboard'); ?>">Update group profile</a></li>
					<li><a href="<?php echo site_url('user/add'); ?>">Add Customers</a></li>
					<li><a href="<?php echo site_url('user/import'); ?>">Import</a></li>
					<li><a href="<?php echo site_url('user/lists'); ?>">List customers</a></li>
					<li><a href="<?php echo site_url('user/orders'); ?>">List Orders</a></li>
                    <li><a href="<?php echo site_url('user/changepassword'); ?>">Change Password</a></li>
                    <li><a href="<?php echo site_url('user/logout'); ?>">logout</a></li>
					<?php } else if (htmlentities($customerdata['role_id']) ==1) {  ?>
					<li><a href="<?php echo site_url('user/dashboard'); ?>">profile</a></li>
					<li><a href="<?php echo site_url('association/dashboard'); ?>">Update association profile</a></li>
					<li><a href="<?php echo site_url('group/lists'); ?>">list groups</a></li>
					<li><a href="<?php echo site_url('group/import'); ?>">Import groups</a></li>
					<li><a href="<?php echo site_url('group/add'); ?>">Add Groups</a></li>
					<li><a href="<?php echo site_url('association/product'); ?>">Product list</a></li>
					<li><a href="<?php echo site_url('association/addproduct'); ?>">Add product</a></li>
					<li><a href="<?php echo site_url('association/orders'); ?>">List Orders</a></li>
					<li><a href="<?php echo site_url('association/employer'); ?>">List Employer</a></li>
					<li><a href="<?php echo site_url('association/addemployee'); ?>">Add Employee</a></li>
					<li><a href="<?php echo site_url('user/changepassword'); ?>">Change Password</a></li>
					<li><a href="<?php echo site_url('user/logout'); ?>">logout</a></li>
				 <?php }else if(htmlentities($customerdata['role_id']) ==3){ ?>
				
                     <li><a href="<?php echo site_url('user/dashboard'); ?>">profile</a></li>
                    <li><a href="<?php echo site_url('user/changepassword'); ?>">changepassword</a></li>
					<li><a href="<?php echo site_url('user/logout'); ?>">logout</a></li>
					
				<?php  } else{?>
					<li><a href="<?php echo site_url('group/register'); ?>">register</a></li>
                    <li><a href="<?php echo site_url('user/index'); ?>">Login</a></li>
                    <li><a href="">CONTACT</a></li>	
					<?php  }?>
			
                </ul>
            </div>
           
        </div>
    </div>
     

</body>
</html>
