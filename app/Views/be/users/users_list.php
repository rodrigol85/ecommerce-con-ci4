<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>


<div class="container">
  <h1>Users List</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Status</th>
        <th>Phone number</th>
        <th>Address</th>

        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>

        <tr>
          <td><?php echo  $user['name']; ?></td>
          <td><?php echo  $user['surname']; ?></td>
          <td><?php echo  $user['email']; ?></td>
          <td><?php echo $user['status']; ?></td>
          <td><?php echo  $user['telefono']; ?></td>
          <td><?php echo  $user['street']; ?></td>




          <td>
            <a href="<?= base_url('be/users/edit/' . $user['id']); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
          </td>
        


        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
  <?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php } ?>
</div>


<?= $this->endSection(); ?>