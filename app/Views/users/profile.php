<?= $this->extend('layout/templateUser'); ?>


<?= $this->section('content'); ?>



<div class="container">
        <h2>Your information</h2>

        <img src="https://www.lascimmiapensa.com/wp-content/uploads/2020/12/Bud-spencer-terence-hill.png" style="width: 400px;" class="img-thumbnail" alt="foto profilo">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name:</span>
            <input type="text" class="form-control" placeholder="<?php echo $user['name']; ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Surname:</span>
            <input type="text" class="form-control" placeholder="<?php echo $user['surname']; ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Email:</span>
            <input type="text" class="form-control" placeholder="<?php echo $user['email']; ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone number:</span>
            <input type="text" class="form-control" placeholder="<?php echo $user['telefono']; ?>" aria-label="Username" aria-describedby="basic-addon1" disabled>
        </div>



    </div>

<?= $this->endSection(); ?>