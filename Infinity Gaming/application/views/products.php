<?php if($this->session->flashdata('registered')) : ?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('registered'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('pass_login')) : ?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('pass_login'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('fail_login')) : ?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('fail_login'); ?>
  </div>
<?php endif; ?>
<?php  foreach($products as $product) : ?>
  <div class="col-md-4 game">
    <div class="game-price"><?php echo $product->price; ?></div>
    <!--products controller and details method passed with id-->
    <a href="<?php echo base_url(); ?>products/details/<?php echo $product->id; ?>">
      <img class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>"/>
    </a>
    <div class="game-title">
    <?php echo $product->title; ?>
    </div>
    <div class="game-add">
      <!---->
      <!--cart controller and add function-->
      <form method="post" action="<?php echo base_url(); ?>cart/add/<?php echo $product->id; ?>">
        Qty: <input type="text" class="qty" name="qty" value="1"/><br><br>
        <input type="hidden" name="item_number" value="<?php echo $product->id; ?>"/>
        <input type="hidden" name="price" value="<?php echo $product->price; ?>"/>
        <input type="hidden" name="title" value="<?php echo $product->title; ?>"/>
        <button class="btn btn-primary" type="submit">Add to Cart</button>
      </form>

    </div>
  </div>
<?php endforeach; ?>
