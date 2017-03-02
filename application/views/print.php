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
<div class="page">
    
    <div class="page-content">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-xs-12 col-lg-3">
              <h4>
                <img class="m-r-10" src="<?php echo site_url('assets//images/logo-mbl.png'); ?>" alt="..."></h4>
					<?php //echo '<pre>';print_r($orderdetails);exit;?>
              <address>
                <?php echo htmlentities($orderdetails['address1']);?>,<?php echo htmlentities($orderdetails['address2']);?>,
                <br> <?php echo htmlentities($orderdetails['city']);?>, <?php echo htmlentities($orderdetails['state']);?>, <?php echo htmlentities($orderdetails['zipcode']);?>
                <br>
                <abbr title="Mail">E-mail:</abbr>&nbsp;&nbsp;<?php echo htmlentities($orderdetails['email']);?>
                <br>
                <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;<?php echo htmlentities($orderdetails['phone']);?>
                <br>
                <abbr title="CellPhone">Cell Phone:</abbr>&nbsp;&nbsp;<?php echo htmlentities($orderdetails['cell_phone']);?>
              </address>
            </div>
            <div class="col-xs-12 col-lg-3 offset-lg-6 text-xs-right">
            <p>
                <a class="font-size-20" href="javascript:void(0)">Order# <?php echo htmlentities($orderdetails['order_id']);?></a>
                <br> To:
                <br>
                <span class="font-size-20">Machi</span>
              </p>
              <address>
                <?php echo htmlentities($orderdetails['address1']);?>,<?php echo htmlentities($orderdetails['address2']);?>,
                <br> <?php echo htmlentities($orderdetails['city']);?>, <?php echo htmlentities($orderdetails['state']);?>, <?php echo htmlentities($orderdetails['zipcode']);?>
                <br>
                <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;<?php echo htmlentities($orderdetails['phone']);?>
                <br>
              </address>
              <span>Ordered Date: <?php echo htmlentities($orderdetails['purchase_date']);?></span>
              <br>
              <span>Due Date:<?php echo htmlentities($orderdetails['created_at']);?></span>
            </div>
          </div>
		  <div class="row">
		  <p><b> Payment Method: <?php echo htmlentities($orderdetails['type']);?> </b></p>
		  </div>
          <div class="page-invoice-table table-responsive">
            <table class="table table-hover text-xs-right">
              <thead>
                <tr>
                  <th class="text-xs-center">#</th>
                  <th>Product Name</th>
                  <th class="text-xs-right">Quantity</th>
                  <th class="text-xs-right">Unit Cost</th>
                  <th class="text-xs-right">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-xs-center">
                   <?php echo htmlentities($orderdetails['order_id']);?>
                  </td>
                  <td class="text-xs-left">
                  <?php echo htmlentities($orderdetails['product_name']);?>
                  </td>
                  <td>
                   <?php echo htmlentities($orderdetails['quantity']);?>
                  </td>
                  <td>
                    <?php echo htmlentities($orderdetails['product_price']);?>
                  </td>
                  <td>
                    <?php echo htmlentities($orderdetails['order_total']);?>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="text-xs-right clearfix">
            <div class="pull-xs-right">
              <p>Sub - Total amount:
                <span>$<?php echo htmlentities($orderdetails['order_total']);?></span>
              </p>
              <!--<p>Tax:
                <span>$35</span>
              </p>-->
              <p class="page-invoice-amount">Grand Total:
                <span>$<?php echo htmlentities($orderdetails['order_total']);?></span>
              </p>
            </div>
          </div>
         
        </div>
      </div>
      <!-- End Panel -->
    </div>
  </div>
  