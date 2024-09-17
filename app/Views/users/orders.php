<?= $this->extend('layout/templateUser'); ?>


<?= $this->section('content'); ?>


<?php
 if(empty($orders)) {   ?>

    <h3>Nessun Ordine fatto ancora</h3>


<?php }else {   ?>

    <div class="container">
    <h1>Orders List </h1>
    <table class="table table-striped table-hover">
      <thead class="table table-dark">
        <tr>
          <th>Ordine N°:</th>
          <th>Codice Carrello</th>
          <th>Data creazione</th>
          <th>Stato ordine</th>
          <th>Totale</th>
         
        </tr>
      </thead>
      <tbody>
    <?php foreach ($orders as $order) : ?>
        <!-- <tr onclick="window.location.href='?page=orders_detail&id=<?php echo $order['chart_id']; ?>'"> -->
            <td><?php echo $order['id_order']; ?></td>
            <td><?php echo $order['chart_id']; ?></td>
            <td><?php echo date("d/m/Y", strtotime($order['order_at'])); ?></td>
            <td><?php echo $order['order_state']; ?></td>
            <td><?php echo $order['total']; ?></td>
            
        </tr>
    <?php endforeach; ?>


      </tbody>
    </table>
  </div>

  <?php }   ?>

<?= $this->endSection(); ?>