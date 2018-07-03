<div class="row details">
   <div class="col-md-4">
     <img src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" class="img-responsive img-thumbnail"/>
   </div>
    <div class="col-md-8">
      <h3><?php echo $product->title; ?></h3>
      <div class="details-price">
        <?php echo $product->price; ?>
      </div>
      <div class="details-description">
        <?php echo $product->description; ?>
      </div>
      <div class="details-buy">
        <form method="post" action="<?php echo base_url(); ?>cart/add/<?php echo $product->id; ?>">
          Qty: <input type="text" class="qty" name="qty" value="1"/><br><br>
          <input type="hidden" name="item_number" value="<?php echo $product->id; ?>"/>
          <input type="hidden" name="price" value="<?php echo $product->price; ?>"/>
          <input type="hidden" name="title" value="<?php echo $product->title; ?>"/>
          <button class="btn btn-primary" type="submit">Add to Cart</button>
        </form>
      </div>
    </div>
 </div>
