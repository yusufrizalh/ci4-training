<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
User Login
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<?php if (session()->has('message')): ?>
    <div class="alert <?= session()->getFlashdata('alert-class'); ?>">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<?php $validation = \Config\Services::validation(); ?>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold h3">
                User Login
            </div>
            <div class="card-body bg-white text-dark">
                <form action="<?= base_url('auth/loginuser'); ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-4">
                        <label for="usermail" class="fw-bold mb-2">User Email</label>
                        <input type="text" name="usermail" class="form-control" autocomplete="off">
                    </div>
                    <?php if ($validation->getError('usermail')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('usermail'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-4">
                        <label for="userpass" class="fw-bold mb-2">User Password</label>
                        <input type="password" name="userpass" class="form-control" autocomplete="off">
                    </div>
                    <?php if ($validation->getError('userpass')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('userpass'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-md btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>