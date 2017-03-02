<ul class="products">
    <?php foreach($products as $p): ?>
    <li>
        <h3><?php echo $p['product_name']; ?></h3>
        <img height="100" wifth="100" src="<?php echo base_url(); ?>assets/img/products/<?php echo $p['image']; ?>" alt="" />
        <small>&dollar;<?php echo $p['price']; ?></small>
        <?php echo form_open('cart/add_cart_item'); ?>
            <fieldset>
                <label>Quantity</label>
                <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                <?php echo form_hidden('product_id', $p['product_id']); ?>
                <?php echo form_submit('add', 'Add'); ?>
            </fieldset>
        <?php echo form_close(); ?>
    </li>
    <?php endforeach;?>
</ul>
     
    <div class="cart_list">
        <h3>Your shopping cart</h3>
        <div id="cart_content">
            <?php echo $this->view('cart/cart.php','', TRUE); ?>
        </div>
    </div>
</div>
