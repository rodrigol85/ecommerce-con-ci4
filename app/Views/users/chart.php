<?= $this->extend('layout/templateUser'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<div class="container" style="padding-top: 10px;">

<?php if(empty($items)){ ?>

    <h1>Your chart is empty</h1>
<?php }else{ ?>
   



<table class="table table-striped table-bordered">
            <thead class="table-info">
                <tr>
                    <th scope="col">Product </th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th> 
                    <th scope="col">Total</th>
                    <th scope="col">Immage</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

            <tbody>
                
            <?php foreach ($items as $product) :?>


        <tr>
            
            <th><?php echo $product['name']; ?></th>
            
            <th><?php echo $product['category'];?></th>
           
            <th><?php echo $product['price']  . " &euro;"; ?></th>
            <th><?php echo $product['quantity'] ; ?></th>
            <th><?php echo ($product['quantity'] * $product['price']) ; ?></th>
          
            <th>
                <img src="https://newlupetto.com/5462-amazon/sciarpa-stadium-giallo-rosso.jpg" style="width: 100px;" class="rounded float-end" alt="">
            </th>
            <th>
            <button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('userLogged/remove/') . $product['id']; ?>' ">
                Remove
            </button>
            </th>
        </tr>
   
<?php endforeach; ?>
<tr>
<th colspan="4" class="table-info">Totale</th>
<th class="table-primary"><?php echo $total; ?></th>
<th class="table-info"></th>
<th class="table-info"></th>
</tr>

</tbody>
</table>

<div style="display: flex; gap: 10px;">

<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('userLogged/payment'); ?>' ">
               payment
            </button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
  Remove All
</button>
</div>

<?php } ?>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure? You'll delete all items
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"  id="confirmRemove">Delete All</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#confirmRemove').on('click', function() {
        // Invia una richiesta AJAX per rimuovere il carrello
        $.ajax({
            url: '<?php echo base_url('userLogged/removeChart'); ?>',
            method: 'GET',
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            success: function(response) {
               
                location.reload();
            }
        });
    });
});
</script>

<?= $this->endSection(); ?>