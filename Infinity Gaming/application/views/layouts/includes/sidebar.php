<div class="col-md-4">
  <div class="cart-block">
    <form action="cart/update" method="post">
      <table cellpadding="6" cellspacing="2" style="width:100%;" border="0" >
        <tr>
          <th>QTY</th>
          <th>Item Description</th>
          <th style="text-align:right">Price</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]',$items['rowid']); ?>

        <tr>
          <td><input class="qty" type="text" name="<?php echo $i.'[qty]'; ?>" value="<?php echo $items['qty']; ?>" maxlength="3" size="5"></td>

          <td><?php echo $items['name']; ?></td>
          <td style="text-align:right">Rs.<?php  echo $this->cart->format_number($items['price']); ?></td>

        </tr>

        <?php $i++; ?>
      <?php endforeach; ?>
      <tr>
        <td><br></td>
      </tr>
      <tr>
        <td></td>
          <td class="right"><strong>Total</strong></td>
          <td class="right" style="text-align:right">Rs.<?php  echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>
      </table>
      <br>
      <p><button class="btn btn-default" type="submit" href="<?php echo base_url(); ?>cart/update">Update Cart</button>
      <a class="btn btn-default" href="<?php echo base_url();?>cart">Go to Cart</a></p>
    </form>
</div>
<div class="panel panel-default panel-list">
  <div class="panel-heading panel-heading-dark ">
      <h3 class="panel-title">
        Categories
      </h3>
  </div>
  <ul class="list-group">
    <?php foreach(get_categories_h() as $category) : ?>

    <li class="list-group-item"><a href="<?php echo base_url(); ?>products/category/<?php echo $category->id; ?>"><?php echo $category->name; ?></a></li>
  <?php endforeach; ?>

  </ul>
</div>
<div class="panel panel-default panel-list">
  <div class="panel-heading panel-heading-dark">
      <h3 class="panel-title">
        Most Popular
      </h3>
  </div>
  <ul class="list-group">
    <?php foreach(get_popular_h() as $popular) : ?>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>products/details/<?php echo $popular->id; ?>"><?php echo $popular->title; ?></a></li>
    <!--<li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
    <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
    <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
    <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>-->
    <?php endforeach; ?>
  </ul>
</div>
</div>
