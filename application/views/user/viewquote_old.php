<div class="page">
    <div class="page-header">
      <h1 class="page-title">View Estimate</h1>
      <ol class="breadcrumb">
        <?php  if($this->session->userdata('userdetails')){?>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
		<?php } else{ ?>
		<li class="breadcrumb-item"><a href="<?php echo site_url('user/login'); ?>">Home</a></li>
	  <?php } ?>
        <li class="breadcrumb-item active"><a href="<?php echo site_url('user/quotations'); ?>">Estimates</a></li>
	   <li class="breadcrumb-item active">View Estimate</a></li>
      </ol>
	<?php $total_vul = $total_vul_ipscount_external+$total_vul_ipscount_internal+$total_vul_empcount_external+$total_vul_empcount_internal;
	$total_net = $total_net_ipscount_external+$total_net_ipscount_internal+$total_net_empcount_external+$total_net_empcount_internal; 
	$total_app = $total_app_pagescount;
	$total_email = $total_email_empcount;
	?>
	<div class="page-header-actions">

	<a href="<?php echo site_url('user/quotations'); ?>" class="btn btn-sm btn-inverse btn-round">
	<i aria-hidden="true" class="icon wb-list-bulleted"></i>
	<span class="hidden-xs">View Estimates</span>
	</a>
	<a href="<?php echo site_url('user/addquote'); ?>" class="btn btn-sm btn-inverse btn-round">
	<i aria-hidden="true" class="icon wb-plus"></i>
	<span class="hidden-xs">New Estimate</span>
	</a>
    </div>
<?php $userdeetails = $this->session->userdata('userdetails');?>
</div>
    <div class="page-content">
	<div class="panel">
        <div class="panel-body container-fluid">
          <div class="row">
          <div class="text-xs-right">
            <a href="<?php echo base_url('user/servicequote/'.base64_encode($quote_id));?>" class="btn btn-animate btn-animate-side btn-primary" target="_blank">
              <span><i class="icon wb-print" aria-hidden="true"></i> Estimation + Summary</span>
            </a>
            <a href="<?php echo base_url('user/printquote/'.base64_encode($quote_id));?>" class="btn btn-animate btn-animate-side btn-info" target="_blank">
              <span><i class="icon wb-print" aria-hidden="true"></i> Print Estimation Only</span>
            </a>
          </div>

            <div class="col-xs-12 col-lg-3">
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
            <div class="col-xs-12 col-lg-3 offset-lg-6 text-xs-right">
              <h4>Estimation  <span><a class="font-size-20" href="javascript:void(0)">#<?php echo $quote_id;?></a></span></h4>
			  <p>              
                <br> To:
                <br>
                <span class="font-size-20"><?php echo $name;?></span>
              </p>
              <address>
                <?php echo $address1!=''?$address1.',<br/>':'-';?>
                <?php echo $address2!=''?$address2.',<br/>':'-';?>
                P:&nbsp;&nbsp;<?php echo $phone!=''?$phone.',<br/>':'-';?>
		E-mail:&nbsp;&nbsp;<?php echo $email!=''?$email.'<br/>':'-';?>
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
                    <b>$<?php echo $total_vul;?></b>
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
                    $<?php echo $total_vul_ipscount_internal+$total_vul_empcount_internal;?>
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
                    <b>$<?php echo $total_net;?></b>
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
                    <b>$<?php echo $total_app;?></b>
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
                    <b>$<?php echo $total_email;?></b>
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
                <span>$<?php echo $total_vul + $total_net + $total_app + $total_email; ?></span>
              </p>
             
              <p class="page-invoice-amount">Grand Total:
                <span>$<?php echo $total_vul + $total_net + $total_app + $total_email; ?></span>
              </p>
            </div>
          </div>
          <div class="text-xs-right">
            <a href="<?php echo base_url('user/servicequote/'.base64_encode($quote_id));?>" class="btn btn-animate btn-animate-side btn-primary" target="_blank">
              <span><i class="icon wb-print" aria-hidden="true"></i> Estimation + Service Summary</span>
            </a>
            <a href="<?php echo base_url('user/printquote/'.base64_encode($quote_id));?>" class="btn btn-animate btn-animate-side btn-info" target="_blank">
              <span><i class="icon wb-print" aria-hidden="true"></i> Print Estimation Only</span>
            </a>
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
