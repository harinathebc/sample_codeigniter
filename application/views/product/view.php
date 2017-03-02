  <!-- Page -->
  <div class="page">
    <div class="page-header">
	<h1 class="page-title">Benefits Selection</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
        <li class="breadcrumb-item active">Benefits Selection</li>
      </ol>
      
      <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip"
        data-original-title="Edit">
          <i class="icon wb-pencil" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip"
        data-original-title="Refresh">
          <i class="icon wb-refresh" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip"
        data-original-title="Setting">
          <i class="icon wb-settings" aria-hidden="true"></i>
        </button>
      </div>
    </div>

<?php foreach($products as $p): ?>
<?php echo form_open('cart/add_cart_item'); ?>
<?php echo form_hidden('product_id', $p['product_id']); ?>
<?php echo form_hidden('quantity', 1); ?>
    <div class="page-content container-fluid">
   <div class="panel panel-bordered panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $p['product_name']; ?></h3>
            </div>
           
              <div class="panel-body">
			 
              <div class="col-xs-12 col-lg-3 col-sm-3">
				<img class="img-rounded img-bordered img-bordered-primary" src="<?php echo base_url(); ?>assets/img/products/<?php echo $p['image']; ?>" style="height:250px;width:250px;"/>
				</div>
              <div class="col-xs-12 col-lg-9 col-sm-9">
			
			  <h4>Product Description</h4>
			  <p><?php echo $p['description']; ?></p>
			 
			  <div>
				<h4>$<?php echo number_format(($p['price']-$p['sponsorship_amount'])/12,2); ?> Monthly <br></h4><h5> or $<?php echo number_format(($p['price']-$p['sponsorship_amount']),2); ?>/year</h5>
				
               </div>
				</div>
			
          </div>
		  <div class="panel-footer">

		  <button type="submit" class="btn btn-animate btn-animate-side btn-success"  role="button" style="float:right;" ><span><i class="icon wb-shopping-cart" aria-hidden="true"></i> Yes, Activate this Benefit</span></button>
		  <a href="#" role="button" class="btn btn-default">No. Thank you </a></div>
    
    </div>
  </div>
<?php echo form_close(); ?>
<?php endforeach; ?>


  </div>
  <!-- End Page -->
