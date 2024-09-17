<?= $this->extend('layout/templateGuest'); ?>


<?= $this->section('content'); ?>


<div class="toast-container position-fixed bottom-5 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header" style="background-color: orange; color: white;">
        <strong class="me-auto">Notifica</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body" style="color: white; background-color: green;">
        Prodotto aggiunto al carrello!
      </div>
    </div>
  </div>
    <div class="container-fluid" style="width: 70%;">


    <div class="col">
    <div class="card h-80">
      <img src="https://www.teatronaturale.it/media2/articoli/27417-princ.jpg" class="card-img-top" alt="Immagine del prodotto">
      <div class="card-body">
      <h5 class="card-title"><?php echo $product['name']; ?></h5>
        <h6 class="card-title"><?php echo $product['price'] . " " . "&euro;"; ?> </h6>
        <p class="card-text"><?php echo $product['description']; ?></p>
       
        <div class="button-group">
        <a href="javascript:history.back()" class="btn btn-info">Go back</a>

        <form method="get" action="<?php echo base_url('askForLogin') ?>">
              
              <button type="submit" class="btn btn-primary <?php echo ($product['quantity'] < 1) ? 'disabled' : ''; ?>">
                <?php echo ($product['quantity'] < 1) ? 'Esaurito' : 'Aggiungi <i class="fas fa-shopping-cart"></i>'; ?>
              </button>
        </div>
            
      </div>
      <?= $this->endSection(); ?>