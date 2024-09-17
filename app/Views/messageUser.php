<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="card shadow-lg form-signin">
        <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4"><?php echo $title; ?></h1>

            <p><?php echo $message; ?></p>

            <div class="d-flex align-items-center">
              
                <a href="<?= base_url('login'); ?>" class="btn btn-primary ms-auto">
                    Sign in
                </a>
            </div>

<?= $this->endSection(); ?>