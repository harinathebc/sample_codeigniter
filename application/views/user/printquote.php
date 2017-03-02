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
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
<script>
javascript:window.print();
</script>
<style>
body {
	padding-top:0px !important;
}
</style>
<?php 
	if($net_internal == 1 && $net_external == 1)
	{
		$devidend_net = 1;
	} else {
		$devidend_net = 1;
	}
	if($vul_internal == 1 && $vul_external == 1)
	{
		$devidend_vul = 1;
	} else {
		$devidend_vul = 1;
	}

$total_vul = ($total_vul_ipscount_external+$total_vul_ipscount_internal+$total_vul_empcount_external+$total_vul_empcount_internal)/$devidend_vul;
$total_net = ($total_net_ipscount_external+$total_net_ipscount_internal+$total_net_empcount_external+$total_net_empcount_internal)/$devidend_net; 
	$total_app = $total_app_pagescount;
	$total_email = $total_email_empcount;
	?>
<?php $userdeetails = $this->session->userdata('userdetails');?>
    <div>
	<div class="panel">
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-sm-7">
              <h4>
		<?php if($userdeetails['company_logo']!=''){ ?>

                <img class="m-r-10" height="60" width="237" src="<?php echo base_url('assets/photos/'.$userdeetails['company_logo']);?>" alt="OnDefend">
<?php } else { ?>
<img class="m-r-10" src="<?php echo base_url('assets/images/logo-mbl.png');?>" alt="OnDefend" />
<?php } ?>
</h4>
              <address>
		
		<?php echo $userdeetails['address1']!=''?$userdeetails['address1'].'<br>':'';?> 
		<?php echo $userdeetails['address2']!=''?$userdeetails['address2'].'<br>':'';?>               
                E-mail:&nbsp;&nbsp;<?php echo $userdeetails['email']!=''?$userdeetails['email'].'<br>':'';?> 
                Phone:&nbsp;&nbsp;<?php echo $userdeetails['phone']!=''?$userdeetails['phone'].'<br>':'';?> 
                Fax:&nbsp;&nbsp;<?php echo $userdeetails['fax']!=''?$userdeetails['fax'].'<br>':'';?> 
              </address>
            </div>
            <div class="col-sm-5 text-xs-right">
              <h4>Estimation <span>#<?php echo $quote_id;?></span></h4>
			  <p>              
                <br> To:
                <span class="font-size-20"><?php echo $name;?></span>
              </p>
              <address>
                <?php echo $address1!=''?$address1.',<br/>':'';?>
                <?php echo $address2!=''?$address2.',<br/>':'';?>
                P:&nbsp;&nbsp;<?php echo $phone!=''?$phone.',<br/>':'';?>
		E-mail:&nbsp;&nbsp;<?php echo $email!=''?$email.'<br/>':'';?>
              </address>
              <span>Estimation Date: <?php echo date('M d, Y',strtotime($created_at));?></span>
              <br>
             
            </div>
          </div>
          <div class="page-invoice-table table-responsive">
            <table class="table table-hover text-xs-right">
              <thead>
                <tr>
                  <!--<th class="text-xs-center">#</th>-->
                  <th>Description</th>
                  <th class="text-xs-right">Total</th>
                </tr>
              </thead>
              <tbody>
<?php if($total_vul !=0) { ?>
                <tr>
                  <!--<td class="text-xs-center">
                    1
                  </td> -->
                  <td class="text-xs-left">
                    <b>Vulnerability Assessment</b>
                  </td>
                  
                  <td>
                    <b>$<?php echo number_format($total_vul,2);?></b>
                  </td>
                </tr>
		<?php if(($total_vul_ipscount_external+$total_vul_empcount_external)==0 || ($total_vul_ipscount_internal+$total_vul_empcount_internal) ==0) { ?>
		<?php if(($total_vul_ipscount_external+$total_vul_empcount_external)>0) { ?>
                <tr>
                  <!--<td class="text-xs-center">
                    i.
                  </td> -->
                  <td class="text-xs-left">
                    External Assessment
                  </td>
                  
                  <td>
                    $<?php echo $total_vul_ipscount_external+$total_vul_empcount_external;?>
                  </td>
                </tr>
		<?php } ?>
		<?php if(($total_vul_ipscount_internal+$total_vul_empcount_internal)>0) { ?>
                <tr>
		
                  <!--<td class="text-xs-center">
                    ii.
                  </td> -->
                  <td class="text-xs-left">
                    Internal Assessment
                  </td>                  
                  <td>
                    $<?php echo number_format($total_vul_ipscount_internal+$total_vul_empcount_internal,2);?>
                  </td>
                </tr>
		<?php } ?>
<?php  } } ?>
<!----PEN TESTING -->
<?php if($total_net !=0) { ?>
<tr>
                  <!--<td class="text-xs-center">
                    2
                  </td> -->
                  <td class="text-xs-left">
                    <b>Network Penetration Testing</b>
                  </td>
                  
                  <td>
                    <b>$<?php echo number_format($total_net,2);?></b>
                  </td>
                </tr>
		<?php if(($total_net_ipscount_external+$total_net_empcount_external)==0 || ($total_net_ipscount_internal+$total_net_empcount_internal)==0) { ?>
		<?php if(($total_net_ipscount_external+$total_net_empcount_external)>0) { ?>
                <tr>
                  <!--<td class="text-xs-center">
                    i.
                  </td> -->
                  <td class="text-xs-left">
                    External Assessment
                  </td>
                  
                  <td>
                    $<?php echo $total_net_ipscount_external+$total_net_empcount_external;?>
                  </td>
                </tr>
		<?php } ?>
		<?php if(($total_net_ipscount_internal+$total_net_empcount_internal)>0){ ?>
                <tr>
                  <!--<td class="text-xs-center">
                    ii.
                  </td> -->
                  <td class="text-xs-left">
                    Internal Assessment
                  </td>                  
                  <td>
                    $<?php echo $total_net_ipscount_internal+$total_net_empcount_internal;?>
                  </td>
                </tr>
		<?php } ?>
<?php } } ?>
<!---APPLICATION TESTING -->
<?php if($total_app !=0) { ?>
                <tr>
                  <!--<td class="text-xs-center">
                    #
                  </td>-->
                  <td class="text-xs-left">
                    <b>Application Testing</b>
                  </td>
                  
                  <td>
                    <b>$<?php echo number_format($total_app,2);?></b>
                  </td>
                </tr>
                
<?php } ?>
<!----APPLICATION TESTING -->

<!---EMAIL PISHING TESTING -->
<?php if($total_email !=0) { ?>
                <tr>
                  <!--<td class="text-xs-center">
                    #
                  </td>-->
                  <td class="text-xs-left">
                    <b>Email Pishing Testing</b>
                  </td>
                  
                  <td>
                    <b>$<?php echo number_format($total_email,2);?></b>
                  </td>
                </tr>
                
<?php } ?>
<!----APPLICATION TESTING -->

<!---END -->
                <!--<tr>
                  <td class="text-xs-center">
                    4
                  </td>
                  <td class="text-xs-left">
                    Payment for Jan 2016
                  </td>
                  <td>
                    $866
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
          <div class="text-xs-right clearfix">
            <div class="pull-xs-right">
              <p>Sub - Total amount:
                <span>$<?php echo number_format(($total_vul + $total_net + $total_app + $total_email),2); ?></span>
              </p>
             
              <p class="page-invoice-amount">Grand Total:
                <span>$<?php echo number_format(($total_vul + $total_net + $total_app + $total_email),2); ?></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="panel panel-bordered panel-primary">
	  <div class="panel-heading">
	  <h3 class="panel-title">View Estimate - <?php echo $name?></h3>
	  </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <?php $total_vul = $total_vul_ipscount_external+$total_vul_ipscount_internal+$total_vul_empcount_external+$total_vul_empcount_internal;
		  $total_net = $total_net_ipscount_external+$total_net_ipscount_internal+$total_net_empcount_external+$total_net_empcount_internal; 
		 ?>
		
			<div class="col-md-6 col-lg-6 col-xs-12">
            <div class="card card-shadow">
           		  <div class="step">
                   <span aria-hidden="true" style="color:#57c7d4!important;" class="step-icon icon wb-pluse"></span>
                    <div class="step-desc">
                      <span class="step-title">Vulnerability Assessment</span> 
						<span style="font-size:18px;color:#57c7d4!important;" class="pull-xs-right">
                   <i aria-hidden="true" class="icon fa-dollar"></i> $ <?php echo $total_vul;?>
                  </span>					  
                    </div>
                  </div>
              <div class="p-30">
                <div class="row no-space">
                  <div>
                    <p style="font-size:18px;">
                      <span class="icon wb-medium-point cyan-600 m-r-5"></span>Internal Assessment <span style="float:right;">
			$<?php echo $total_vul_ipscount_internal+$total_vul_empcount_internal;?></span></p>
                    <p style="font-size:18px;">
                      <span class="icon wb-medium-point cyan-600 m-r-5"></span>External Assessment <span style="float:right;">$<?php echo $total_vul_ipscount_external+$total_vul_empcount_external;?></span></p>
                   
                  </div>
                  
                </div>
              </div>
           
          </div>
            </div>
			<div class="col-md-6 col-lg-6 col-xs-12">
            <div class="card card-shadow">
           
              <div class="step">
                   <span aria-hidden="true" style="color:red;" class="step-icon icon wb-pluse"></span>
                    <div class="step-desc">
                      <span class="step-title">Network Penetration Testing</span> 
						<span style="font-size:18px;color:#f96868!important;" class="pull-xs-right">
                   <i aria-hidden="true" class="icon fa-dollar"></i> $<?php echo $total_net;?>
                  </span>					  
                    </div>
                  </div>
              <div class="p-30">
                <div class="row no-space">
                  <div>
                    <p style="font-size:18px;">
                      <span class="icon wb-medium-point red-600 m-r-5"></span>Internal Assessment <span style="float:right;">$<?php echo $total_net_ipscount_internal+$total_net_empcount_internal;?></span></p>
                    <p style="font-size:18px;">
                      <span class="icon wb-medium-point red-600 m-r-5"></span>External Assessment <span style="float:right;">$<?php echo $total_net_ipscount_external+$total_net_empcount_external;?></span></p>
                   
                  </div>
                  
                </div>
              </div>
            
          </div>
            </div>
			<div class="col-md-12 col-lg-12 col-xs-12">
            <div class="card card-shadow">
           
              <div class="step">
                   <span aria-hidden="true" style="color:#369b6f;" class="step-icon icon wb-pluse"></span>
                    <div class="step-desc">
                      <span class="step-title">Total Service Cost</span> 
						<span style="font-size:18px;color:#369b6f!important;" class="pull-xs-right">
                   <i aria-hidden="true" class="icon fa-dollar"></i> $<?php echo $total_vul + $total_net; ?>
                  </span>					  
                    </div>
                  </div>
              <div class="p-30">
                <div class="row no-space">
                  <div>
                    <p style="font-size:18px;"><u>Note</u><br>OnDefend will verify the infrastructure IP's upon execution of your statement of work. Once verified, OnDefend may need to adjust its service cost quote
                      </p>

                  </div>
               
                </div>
              </div>
            
          </div>
            </div>
			
			
          </div>
        </div>
      </div>-->
      <!-- Panel Inline Form -->
     
    </div>
  </div>
