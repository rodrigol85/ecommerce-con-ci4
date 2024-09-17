<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<div class="card shadow-lg form-signin">
            <div class="card-body p-5">
                <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                <form method="POST" action="<?= base_url('auth'); ?>" autocomplete="off">

                 <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label class="mb-2" for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required autofocus>
                    </div>

                    <div class="mb-3">
                        <div class="mb-2 w-100">
                            <label for="password">Password</label>
                            <a href="<?= base_url('be/password-request'); ?>" class="float-end">
                                Did you forget your password?
                            </a>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </form>

                <?php if(session()->getFlashdata('errors') !== null): ?>
                    <div class="alert alert-danger my-3" role="alert">
                        <?php echo session()->getFlashdata('errors'); ?>
                    </div>
                <?php endif; ?>

            </div>
            <div class="card-footer py-3 border-0">
                <div class="text-center">
                    ¿Don't you have an account? <a href="<?= base_url('be/register');  ?>" class="text-dark">Sing up here</a>
                </div>
            </div>
        </div>
    </div>











<?= $this->endSection(); ?>