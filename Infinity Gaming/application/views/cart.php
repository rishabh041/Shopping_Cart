<?php if($this->cart->contents()) : ?>
  <form action="cart/process" method="post">
    <table class="table table-striped">
      <tr>
        <th>QTY</th>
        <th>Item Title</th>
        <th style="text-align:right">Item Price</th>
      </tr>
      <?php $i=1; ?>
      <?php foreach ($this->cart->contents() as $items): ?>
        <?php echo form_hidden($i.'[rowid]',$items['rowid']); ?>

        <tr>
          <td><?php echo $items['qty'] ?></td>
          <td><?php echo $items['name'] ?></td>
          <td style="text-align:right">Rs.<?php  echo $this->cart->format_number($items['price']); ?></td>

          <?php echo '<input type="hidden" name="item_name['.$i.']" value="'.$items['name'].'" />' ; ?>
          <?php echo '<input type="hidden" name="item_code['.$i.']" value="'.$items['id'].'" />' ; ?>
          <?php echo '<input type="hidden" name="item_qty['.$i.']" value="'.$items['qty'].'" />' ; ?>

        </tr>

        <?php $i++; ?>
      <?php endforeach; ?>
      <tr>
        <td></td>
        <td class="right"><strong>Shipping</strong></td>
        <td class="right" style="text-align:right"><?php  echo $this->config->item('shipping'); ?></td>

      </tr>
      <tr>
        <td></td>
        <td class="right"><strong>Tax</strong></td>
        <td class="right" style="text-align:right"><?php  echo $this->config->item('tax'); ?></td>

      </tr>
      <tr>
        <td></td>
          <td class="right"><strong>Total</strong></td>
          <td class="right" style="text-align:right">Rs.<?php  echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>
      </table>
      <?php if(!$this->session->userdata('logged_in') ) : ?>
        <p><a href="<?php echo base_url(); ?>users/register" class="btn btn-primary">Create An Account</a></p>
        <p><em>You must Login or Register first to make a Purchase</em></p>
    <?php else : ?>
      <h3> Shipping Info</h3>
      <div class="form-group">
        <label>Address:</label>
        <input type="text" class="form-control" name="address"  required>
      </div>
      <div class="form-group">
        <label>Address2:</label>
        <input type="text" class="form-control" name="address2"  required>
      </div>
      <div class="form-group">
        <label>City:</label>
        <input type="text" class="form-control" name="city"  required>
      </div>
      <div class="form-group">
        <label>State:</label>
        <input type="text" class="form-control" name="state"  required>
      </div>
      <div class="form-group">
        <label>Zipcode:</label>
        <input type="text" class="form-control" name="zipcode"  required>
      </div>
      <p><button class="btn btn-primary" type="submit" name="submit">Checkout</button>
      <?php endif; ?>
    </form>
<?php else : ?>
  <p>There are no items in your cart</p>
<?php endif; ?>
