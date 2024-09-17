<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<h1>Categories</h1>
  <h3>Insert the new category:</h3><br>
 
  <form action="<?php echo base_url('be/categories/categories_list');  ?>" method="POST">
  <?= csrf_field(); ?>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">Category:</span>
      <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
    </div>
    <button type="submit" class="btn btn-success mx-auto">Add category</button>
  </form>


  <div class="container">
    <h1>Lista Categorie</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Categoria</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $category) : ?>
          <tr>
            <td><?php echo $category['name']; ?></td>
            
            <td>
            <a href="<?= base_url('be/categories/edit/' . $category['id'] ); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
            </td>
           


          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


  <?= $this->endSection(); ?>