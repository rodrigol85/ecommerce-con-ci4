
<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<div class="container">
    <h1>Orders List</h1>
    <span>(Show all orders) </span>
    <div style="padding-left: 40%;">
    <?= $pager_links ?>
  </div>
    <table class="table table-striped table-hover">
      <thead class="table table-dark">
        <tr>
          <th>Order N°:</th>
          <th>User Email</th>
          <th>Chart code</th>
          <th>Created at</th>
          <th>Order state</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($orders as $order) : ?>
        <tr style="cursor: pointer;" onclick="window.location.href='<?php echo base_url('be/orders/order_detail/') . $order['user_id']; ?>' ">
            <td><?php echo $order['id_order']; ?></td>
            <td><?php echo $order['email']; ?></td>
            <td><?php echo $order['chart_id']; ?></td>
            <td><?php echo date("d/m/Y", strtotime($order['order_at'])); ?></td>
            <td><?php echo $order['order_state']; ?></td>
            <td><?php echo $order['total']; ?></td>
            <td>
            <a href="<?= base_url('be/orders/edit/' . $order['id_order']); ?>" class="btn btn-warning btn-sm me-2">Update State</a>
            </td>
        </tr>
    <?php endforeach; ?>


      </tbody>
    </table>
  </div>
  <div style="padding-left: 40%;">
    <?= $pager_links ?>
  </div>
  <?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php } ?>
</div>


<?= $this->endSection(); ?>