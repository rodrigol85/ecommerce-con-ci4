<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php $errors = session()->get('errors'); ?>

<div class="card shadow-lg form-signin">
            <div class="card-body p-5">
                <h1 class="fs-4 card-title fw-bold mb-4">Sign up</h1>
                <form method="POST" action="<?php base_url('register'); ?>" autocomplete="off">

                <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="mb-2" for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>" required autofocus>
                    </div>
                    <?php if (isset($errors['name'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['name']; ?></div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="mb-2" for="surname">Surname</label>
                        <input type="text" class="form-control" name="surname" id="surname" value="<?= set_value('surname'); ?>" required>
                    </div>
                    <?php if (isset($errors['surname'])): ?>
                        <div class="alert alert-danger"><?php  echo $errors['surname']; ?></div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="mb-2" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" required>
                    </div>
                    <?php if (isset($errors['email'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['email']; ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="mb-2" for="street">Street</label>
                        <input type="text" class="form-control" name="street" id="street" value="<?= set_value('street'); ?>" required>
                    </div>
                    <?php if (isset($errors['street'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['street']; ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="mb-2" for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="<?= set_value('city'); ?>" required>
                    </div>
                    <?php if (isset($errors['city'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['city']; ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="mb-2" for="cap">Cap</label>
                        <input type="number" class="form-control" name="cap" id="cap" value="<?= set_value('cap'); ?>" required>
                    </div>
                    <?php if (isset($errors['cap'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['cap']; ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="mb-2" for="phone">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="<?= set_value('phone'); ?>" required>
                    </div>
                    <?php if (isset($errors['phone'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['phone']; ?></div>
                    <?php endif; ?>


                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['password']; ?></div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="repassword">Confirm Password</label>
                        <input type="password" class="form-control" name="repassword" id="repassword" required>
                    </div>
                    <?php if (isset($errors['repassword'])): ?>
                        <div class="alert alert-danger"><?php echo $errors['repassword']; ?></div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary">
                        Sing up
                    </button>
                </form>

               

            </div>
            <div class="card-footer py-3 border-0">
                <div class="text-center">
                    <a href="<?php echo base_url('login'); ?>">Sign in</a>
                </div>
            </div>


<?= $this->endSection(); ?>