<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<h3>Update category:</h3><br>
<form action="<?php echo base_url('be/categories/edit_category/') . $category['id'];   ?>" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?= $category['id']; ?>">
    <?= csrf_field(); ?>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Category:</span>
        <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $category['name']; ?>" required>
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
    </div>
    <a href="javascript:history.back()" class="btn btn-info">Torna Indietro</a>
    <button type="submit" class="btn btn-success mx-auto">Update</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




<?= $this->endSection(); ?>