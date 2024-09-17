<?= $this->extend('layout/templateLogged'); ?>


<?= $this->section('content'); ?>

<?php if (session()->has('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<h1>Order Detail</h1>
    <h3>User information</h3>
    <table class="table table-striped">
        <thead class="table-info">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Address</th>
                <th>City </th>
                <th>Cap </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo  $user['name']; ?></td>
                <td><?php echo  $user['email']; ?></td>
                <td><?php echo  $user['telefono']; ?></td>
                <td><?php echo  $user['street']; ?></td>
                <td><?php echo  $user['city']; ?></td>
                <td><?php echo  $user['cap']; ?></td>

            </tr>
   
        </tbody>
    </table>

    <h1>Products List</h1>
    <table class="table table-striped table-bordered">
            <thead class="table-info">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Immage</th>
                </tr>
            </thead>
            
        </table> 






<?php if (session()->getFlashdata('error') !== null) { ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php } ?>
</div>


<?= $this->endSection(); ?>