<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<h1>Ordine</h1>
<h6>Ordine N°: <?php echo $order['id_order']; ?> </h6>
<h6>Ordinato in data: <?php echo date("d/m/Y", strtotime($order['order_at'])); ?> </h6>
<form action="<?php echo base_url('be/orders/edit_order/') . $order['id_order']  ?>" method="POST">
<input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?= $order['id_order']; ?>">
    <?= csrf_field(); ?>

<span class="input-group-text" id="inputGroup-sizing-default">Seleziona lo stato:</span>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="order_state" value="<?php echo $order['order_state']; ?>">
            <option value="<?php echo $order['order_state']; ?>" selected><?php echo $order['order_state']; ?></option>
            <option value="pending">pending</option>
            <option value="delivering">delivering</option>
            <option value="delivered">delivered</option>
        </select>

        <button type="submit" class="btn btn-success mx-auto">Update</button>
   
</form>


<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php } ?>
</div>


<?= $this->endSection(); ?>