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
<?php $total_vul = $total_vul_ipscount_external+$total_vul_ipscount_internal+$total_vul_empcount_external+$total_vul_empcount_internal;
	$total_net = $total_net_ipscount_external+$total_net_ipscount_internal+$total_net_empcount_external+$total_net_empcount_internal; 
	$total_app = $total_app_pagescount;
	$total_email = $total_email_empcount;
	?>
<?php $userdeetails = $this->session->userdata('userdetails');?>
<!-- <div class="page-content">-->
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
              <h4>Estimation  <span>#<?php echo $quote_id;?></span></h4>
			  <p>              
                <br> To:
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
          <div class="page-invoice-table table-responsive" style="page-break-after:always;">
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
                    $<?php echo number_format(($total_vul_ipscount_external+$total_vul_empcount_external),2);?>
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
                    $<?php echo number_format(($total_vul_ipscount_internal+$total_vul_empcount_internal),2);?>
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
                    $<?php echo number_format(($total_net_ipscount_external+$total_net_empcount_external),2);?>
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
                    $<?php echo number_format(($total_net_ipscount_internal+$total_net_empcount_internal),2);?>
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
         

<div class="row" style="page-break-after:always;">
<div class="col-sm-12">
<?php $userdeetails = $this->session->userdata('userdetails');?>
<!--<?php if($userdeetails['company_logo']!=''){ ?>

                <img class="m-r-10" height="60" width="237" src="<?php echo base_url('assets/photos/'.$userdeetails['company_logo']);?>" alt="OnDefend">
<?php } else { ?>
<img class="m-r-10" src="<?php echo base_url('assets/images/logo-mbl.png');?>" alt="OnDefend" />
<?php } ?> 
-->
<h1><?php echo $userdeetails['company_name'];?> Service Overview</h1>
<p>
We are proud to submit the following quote in support of our client’s efforts to assess and
improve the maturity of their information security program. We are a leading provider of
information security testing and consulting services, partnering with our customers to improve
the safety and security of their employees </p>
<p>The proposed services in this Statement of Work are:</p>
<div class="row">
  <div class="col-md-6">
<ol>
<li> Vulnerability Management </li>
<li> Network Penetration Testing (external, internal or both) </li>
<li> Web/Mobile Application Security Assessment </li>
<li> Email Phishing Campaign </li>
</ol>
</div>
</div>


<p>The following sections provide additional details about each service including pricing and
payment terms.</p>

<h1>Selected Services Descriptions</h1>
<?php if($vul_security == 1): ?>
<h2>Vulnerability Assessments &amp; Management</h2>

<p>A vulnerability assessment is the process of identifying and quantifying security vulnerabilities
in an environment. It is an in-depth evaluation of your information security posture, indicating
weaknesses as well as providing the appropriate mitigation procedures required to either
eliminate those weaknesses or reduce them to an acceptable level of risk</p>
<p>
Vulnerability assessments consist of:
<ol>
<li>Defining and classifying network or system resources </li>
<li>Assigning relative levels of importance to the resources</li>
<li> Identifying potential threats to each resource</li>
<li>Developing a strategy to deal with the most serious potential problems first</li>
<li> Defining and implementing ways to minimize the consequences if an attack
occurs</li></ol><p>
<p>
The vulnerability management service offering is a complete solution for finding and tracking
the remediation of vulnerabilities within the Client enterprise. Vulnerabilities are well-known
flaws, usually a result of out-of- date software, missing patches or a misconfiguration that would
enable an attacker to cause an unauthorized change to the way systems operate or process
data.</p>

<h3>Vulnerability Management Process</h3>
<div class="row">
  <div class="col-md-6"> 
<ol>
<li>System and Service Discovery/Scoping</li>
<li>Vulnerability Identification &amp; Manual Verification</li>
<li>Remediation Building Development</li>
<li>Reporting</li>
<li>Tracking of Findings</li>
<li>Testing to Confirm Remediation</li>
<li>Report &amp; Presentation</li>
<li>Reassessment</li>
</ol>
</div>
 <!--<div class="col-md-6"> 
 <img src="..." alt="..." class="img-circle">
 
</div>-->
</div>

<p>
Vulnerability management is a continuous testing cycle. New patches are always being issued,

software and applications are reaching the end of support and system configurations are

changed as new requirements are added.</p>
<p>
Deliverables include detailed report of findings for the current cycle, trending information to

show the progress of remediation for previous issues and vulnerability data in an easy-to-

import format based on specific requirements. All final report materials will be provided in a

generic format where you can add your corporate logo and contact information.</p>
<?php endif; ?>
<!----- START PEN TESTING ---->

<?php if($net_security == 1): ?>
<h2>Network Penetration Testing (external, internal or both)</h2>

<p>A network penetration test simulates the actions of an external and/or internal cyber attacker

that aims to breach the information security of the organization. Using many tools and

techniques, the penetration tester (ethical hacker) attempts to exploit critical systems and gain

access to sensitive data.</p>
<p>
A penetration test doesn’t stop at simply uncovering vulnerabilities: it goes the next step to

actively exploit those vulnerabilities in order to prove (or disprove) a real-world attack would be

successful and what systems and data that attacker could gain access to.</p>
<p>
Our teams use the Penetration Testing Execution Standard (PTES) framework when conducting

these types of assessments. Following this framework, we execute the following phases in our

network penetration testing service:<p>

<h3>Network Penetration Process</h3>
<div class="row">
  <div class="col-md-6">
 
<ol>
<li>Goals and Rules Scoping</li>
<li>Intelligence Gathering – Recon and Mapping</li>
<li>Vulnerability Analysis and Identification</li>
<li>Exploitation</li>
<li>Post Exploitation</li>
<li>Remediation Exploration</li>
<li>Report and Presentation</li>
<li>Reassessment</li> 
</ol>
</div>
 <!--<div class="col-md-6">
 <img src="..." alt="..." class="img-circle">
 
 </div>-->
</div>
<p>
Throughout the network penetration test, we will cycle through the phases, gathering
intelligence and analyzing vulnerabilities the further into the network they reach. The final
report includes a detailed write-up of findings, as well as a comprehensive list of testing
activities red flags which enable full visibility into how well your security controls performed
during the assessment. Findings can also be delivered in an easy-to- import format based on
certain requirements. All final report materials will be provided in a generic format where you
can add your corporate logo and contact information.</p>

<h3>Vulnerability Assessments vs Network Penetration Testing</h3>
<p>
Simply said, a vulnerability assessment identifies vulnerabilities in an external (web facing) and
internal network as well as instructions on how to fix these vulnerabilities. It would be like
getting an opinion from your home security company on where a robber would potentially
break in your home and how to secure it.</p>
<p>
A penetration test is the next step after you have had a good vulnerability assessment(s). The
penetration test finds any remaining external (web facing) and internal network vulnerabilities,
but the test also exploits these vulnerabilities to access systems and data, which helps to
display your actual risk. Using the home security example, it would then be like getting a
“ethical robber” to try to break into your home and if a break in is successful, what the robber
could destroy or steal…hence how much you would lose.</p>
<?php endif; ?>
<?php if($app_security == 1): ?>
<h2>Web/Mobile Application Security Assessment</h2>
<p>
A web or mobile application security test is broken down into Dynamic (app facing and most

common) or Static (code based) tests. The primary objective is to identify exploitable

vulnerabilities in applications before hackers are able to discover and exploit them. Web

application testing will reveal real-world opportunities for hackers to be able to compromise

applications in such a way that allows for unauthorized access to sensitive data or even take-

over systems for malicious/non-business purposes.</p>
<p>
This type of security testing helps clients:
<ol>
<li>Identify application security flaws present in the environment</li>
<li>Understand the level of risk for your organization</li>
<li>Help address and fix identified application flaws</li>
</ol>
</p>
<p>
We provide a comprehensive review of targeted web and mobile applications which follow the

approach in the Penetration Testing Execution Standard (PTES). Our web and mobile

application assessments use the following phases to deliver this service:</p>

<h3>Web/Mobile Application Assessment Process</h3>
<div class="row">
  <div class="col-md-6"> 
<ol>
<li>Goals and Rules Scoping</li>
<li>Intelligence Gathering – Recon and Mapping</li>
<li> Vulnerability Analysis and Identification</li>
<li> Exploitation</li>
<li> Post Exploitation</li>
<li> Remediation Exploration</li>
<li>Report and Presentation</li>
<li>Reassessment</li>
</ol>
</div>
  <!--<div class="col-md-6"> 
   <img src="..." alt="..." class="img-circle">
  </div>-->
  </div>
<p>
We use the Open Web Application Security Project (OWASP) Testing Guide to build a complete

checklist of all items tested during the course of the engagement. This enables us to provide

easy to understand artifacts after the assessment for validation and retesting as required.

Deliverables from this service include a detailed report of all findings, a summary of controls

that worked correctly and prevented successful exploitation and an easy-to- import output of

findings, ready to import into a ticketing system or GRC tool. All final report materials will be

provided in a generic format where you can add your corporate logo and contact information.

</p>
<?php endif; ?>
<?php if($email_security == 1): ?>
<h2>Email Phishing Campaign</h2>
<p>
Email phishing is a form of fraud in which the attacker tries to learn information such as login

credentials or account information by masquerading as a reputable entity or person in an email.

Typically a victim receives a message that appears to have been sent by a known contact or

organization. An attachment or links in the message may install malware on the user’s device or

direct them to a malicious website set up to trick them into divulging personal and financial

information, such as passwords, account IDs or credit card details.</p>
<p>
An email phishing campaign simulates such an attack to help a company see which employees

are opening suspicious emails, what they are clicking on and what information they are

providing. This service creates employee awareness and promotes a more defensive posture

when handling inbound emails.</p>

<p>The Email Phishing Campaign service runs continuously throughout the year, sending phishing

test emails to each user every month.</p>
<p>
The list of email addresses being tested will be provided with every report to ensure accuracy

and completeness of information. Client Service Desk staff will be provided with a verification

mechanism to test if a given message was a test phishing message when user reports such a

message through the email reporting process. All final report materials will be provided in a

generic format where you can add your corporate logo and contact information.</p>
<?php endif; ?>

<h2>Assumptions</h2>
<p>
All service quotes above are based on information provided through our service provider online

portal. This is only an initial security services quick quote. Once we execute a statement of

work, we will verify all assumptions and if necessary, provide an amended statement of work.</p>
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



