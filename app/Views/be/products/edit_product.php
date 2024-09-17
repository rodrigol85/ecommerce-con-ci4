<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<h1>Product</h1>
<h3>Edit product:</h3><br>
<form action="<?= base_url('be/products/edit_product/' . $product['id']); ?>" method="POST">

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="id" value="<?= $product['id']; ?>">
<?= csrf_field(); ?>
    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="category_id">
        <option value="<?php echo $product['category_id']; ?>"  selected><?php echo  $product['category']; ?></option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Name:</span>
  <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $product['name']; ?>"  required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Quantity:</span>
  <input type="number" class="form-control" name="quantity" aria-label="Sizing example input" min=1 aria-describedby="inputGroup-sizing-default" value="<?php echo $product['quantity']; ?>"  required>
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Price:</span>
  <input type="number" class="form-control" name="price" min=1 aria-label="Sizing example input" step="0.01" aria-describedby="inputGroup-sizing-default" value="<?php echo $product['price']; ?>" required>
</div>
<div class="input-group">
  <span class="input-group-text">Description:</span>
  <textarea class="form-control" name="description" aria-label="With textarea" value="<?php echo $product['description']; ?>" required><?php echo $product['description']; ?></textarea>
</div>
<br>
<a href="javascript:history.back()" class="btn btn-info">Back</a>
<button type="submit" class="btn btn-success mx-auto">Update</button>
</form>

<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

<?= $this->endSection(); ?>