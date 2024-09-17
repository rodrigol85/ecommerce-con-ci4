<?= $this->extend('layout/templateUser'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<div class="container">
  
    <h1>Products List</h1>
      <div style="padding-left: 40%;">
           <?= $pager_links ?>
      </div>


    <div class="cards-container ">
      <?php foreach ($products as $product) :
      ?>

        <div class="card" style="width: 18rem;">
          <img src="<?php echo $product['id'] % 2 == 0 ? 'https://static.tecnichenuove.it/logisticanews/2018/04/ecommerce-1.jpg" class="card-img-top fixed-size" alt="imagine del prodotto' : 'https://images.pexels.com/photos/2536965/pexels-photo-2536965.jpeg';?> ">
          <div class="card-body">
            <h2 class="card-title"><?php echo $product['name']; ?></h2>
            <p class="card-text"><?php echo $product['price'] . " " . '&euro;';  ?></p>
            <p class="card-text"><?php echo substr($product['description'], 0, 20) . " " . "..."; ?></p>
            <div class="button-group">
            <a href="<?php echo base_url('userLogged/product_detail/') . $product['id']; ?>" class="card-link">Info... &ggg;</a>
            <button class="btn btn-primary <?php echo ($product['quantity'] < 1) ? 'disabled' : ''; ?>" <?php echo ($product['quantity'] < 1) ? 'disabled' : ''; ?> onclick="window.location.href='<?php echo base_url('userLogged/chart/') . $product['id']; ?>'">
    <?php echo $product['quantity'] < 1 ? 'Sold out' : 'Add to chart'; ?>
</button>
            
        </div>
    </div>
</div>
<?php endforeach; ?>


</div>
<div style="padding-left: 40%;">
    <?= $pager_links ?>
  </div>
   


  </div>



<?= $this->endSection(); ?>