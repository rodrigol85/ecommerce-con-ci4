<?= $this->extend('layout/templateGuest'); ?>


<?= $this->section('content'); ?>

<div class="container">
  <h1>Products List</h1>

  <div style="padding-left: 40%;">
    <?= $pager_links ?>
  </div>

  <div class="cards-container ">
    <?php foreach ($data as $product) :
    ?>

      <div class="card" style="width: 18rem;">
        <img src="https://static.tecnichenuove.it/logisticanews/2018/04/ecommerce-1.jpg" class="card-img-top fixed-size" alt="imagine del prodotto">
        <div class="card-body">
          <h2 class="card-title"><?php echo $product['name']; ?></h2>
          <p class="card-text"><?php echo $product['price'] . " " . '&euro;';  ?></p>
          <p class="card-text"><?php echo substr($product['description'], 0, 20) . " " . "..."; ?></p>
          <div class="button-group">
          <a href="<?php echo base_url('product_detail_no/') . $product['id']; ?>" class="card-link">Info... &ggg;</a>
            <form method="get" action="<?php echo base_url('askForLogin') ?>">
              
              <button type="submit" class="btn btn-primary <?php echo ($product['quantity'] < 1) ? 'disabled' : ''; ?>">
                <?php echo ($product['quantity'] < 1) ? 'Esaurito' : 'Aggiungi <i class="fas fa-shopping-cart"></i>'; ?>
              </button>
            </form>
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