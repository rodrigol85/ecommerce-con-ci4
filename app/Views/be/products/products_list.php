<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<h1>Product list</h1>
<div style="padding-left: 40%;">
    <?= $pager_links ?>
  </div>
  <?php if(empty($products)){ ?>

<h1>Products is empty</h1>
<?php }else{ ?>


    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Category</th>
          <th>Description</th>
          <th></th>
          <th>
  <a class="btn btn-info" href="<?php echo base_url('be/products/create_product'); ?>" style="float: right;">
    Add product <ion-icon name="add-circle-sharp"></ion-icon><ion-icon name="add-circle-sharp"></ion-icon>
  </a>
</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
          <tr>
            <td><?php echo  $product['name']; ?></td>
            <td><?php echo  $product['quantity']; ?></td>
            <td><?php echo  $product['price']; ?></td>
            <td><?php echo  $product['category']; ?></td>
       
            <td><?php echo  substr($product['description'],0, 10) . " ...";?></td>
            
            
            <td>
            <a href="<?= base_url('be/products/edit/' . $product['id'] ); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?php echo base_url('be/products/' . $product['id']); ?>">Delete</button>
            </td>
        

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red;">
                <h1 class="modal-title fs-5" id="eliminaModalLabel" style="color: white;">Warning</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Are you sure?</p>
            </div>
            <div class="modal-footer">
                <form id="form-elimina" action="<?php echo base_url('be/products/' . $product['id']); ?>" method="POST">
                <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div style="padding-left: 40%;">
    <?= $pager_links ?>
  </div>

<script>
    
    const eliminaModal = document.getElementById('eliminaModal')
    if (eliminaModal) {
       
        console.log('URL della richiesta di eliminazione:', url);
        eliminaModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const url = button.getAttribute('data-bs-url')

            // Update the modal's content.
            const form = eliminaModal.querySelector('#form-elimina')
            form.setAttribute('action', url)
           // form.querySelector('input[name="_method"]').value = 'DELETE';
            console.log('URL della richiesta di eliminazione:', url);
        })
    }
</script>


    <?= $this->endSection(); ?>