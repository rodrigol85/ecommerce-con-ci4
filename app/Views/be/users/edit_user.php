<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>
<div class="container" style="width: 80%;">
<h1>User</h1>
    <h3>Insert the changement:</h3><br>
    <form action="<?= base_url('be/users/edit_user/') . $user['id'] ?>" method="POST">

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="address_id" value="<?php echo $user['address_id']; ?>">
        <?= csrf_field(); ?>

        <div class="input-group mb-3">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <span class="input-group-text" id="inputGroup-sizing-default">Name:</span>
            <input type="text" class="form-control" name="name" aria-label="Sizing example input" value="<?php echo $user['name']; ?>" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Surname:</span>
            <input type="text" class="form-control" name="surname" aria-label="Sizing example input" value="<?php echo $user['surname']; ?>" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
            <input type="email" class="form-control" name="email" min=1 aria-label="Sizing example input" value="<?php echo $user['email']; ?>" step="0.01" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Phone number:</span>
            <input type="number" class="form-control" name="telefono" min=1 aria-label="Sizing example input" value="<?php echo $user['telefono']; ?>" step="0.01" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <span class="input-group-text" id="inputGroup-sizing-default">Change status:</span>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="status" value="<?php echo $user['status']; ?>">
            <option value="<?php echo $user['status']; ?>" selected><?php echo $user['status']; ?></option>
            <option value="activated">activated</option>
            <option value="disable">disabled</option>
        </select>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Street:</span>
            <input type="text" class="form-control" name="street" aria-label="Sizing example input" value="<?php echo $user['street']; ?>"  aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">City:</span>
            <input type="text" class="form-control" name="city" aria-label="Sizing example input" value="<?php echo $user['city']; ?>"  aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Cap:</span>
            <input type="text" class="form-control" name="cap" aria-label="Sizing example input" value="<?php echo $user['cap']; ?>"  aria-describedby="inputGroup-sizing-default" required>
        </div>

        <br>
        <button type="submit" class="btn btn-success mx-auto">Update</button>
    </form><br>
    <?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php } ?>

</div>

<?= $this->endSection(); ?>