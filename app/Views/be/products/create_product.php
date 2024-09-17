<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<h1>Product</h1>
<h3>Insert the new product:</h3><br>
<form action="<?= base_url('be/products/create_product'); ?>" method="POST">
<?= csrf_field(); ?>
    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="category_id">
        <option value="" disabled selected>Scelga la categoria</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Name:</span>
  <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= set_value('name'); ?>"  required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Quantity:</span>
  <input type="number" class="form-control" name="quantity" aria-label="Sizing example input" min=1 aria-describedby="inputGroup-sizing-default" value="<?= set_value('quantity'); ?>"  required>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price:</span>
  <input type="number" class="form-control" name="price" min=1 aria-label="Sizing example input" step="0.01" aria-describedby="inputGroup-sizing-default" required>
</div>
<div class="input-group">
  <span class="input-group-text">Description:</span>
  <textarea class="form-control" name="description" aria-label="With textarea" required></textarea>
</div>
<br>
<a href="javascript:history.back()" class="btn btn-info">Back</a>
<button type="submit" class="btn btn-success mx-auto">Insert</button>
</form>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<?= $this->endSection(); ?>