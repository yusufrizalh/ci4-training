<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Employee Detail
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Employee Edit</h1>
<hr>

<?php if (session()->has('message')): ?>
    <div class="alert <?= session()->getFlashdata('alert-class'); ?>">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<?php $validation = \Config\Services::validation(); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white fw-bold h3">
                Employee Edit ID: <strong><?php echo $employee['id']; ?></strong>
            </div>
            <div class="card-body bg-white text-dark">
                <form action="<?= base_url('employees/update/') . $employee['id']; ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-4">
                        <label for="name" class="fw-bold mb-2">Employee Name</label>
                        <input type="text" name="name" value="<?= $employee['name']; ?>" class="form-control">
                    </div>
                    <?php if ($validation->getError('name')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('name'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-4">
                        <label for="email" class="fw-bold mb-2">Employee Email</label>
                        <input type="text" name="email" value="<?= $employee['email']; ?>" class="form-control">
                    </div>
                    <?php if ($validation->getError('email')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-4">
                        <label for="phone" class="fw-bold mb-2">Employee Phone</label>
                        <input type="text" name="phone" value="<?= $employee['phone']; ?>" class="form-control">
                    </div>
                    <?php if ($validation->getError('phone')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('phone'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-4">
                        <label for="phone" class="fw-bold mb-2">Employee Address</label>
                        <textarea name="address" rows="5" class="form-control"><?= $employee['address']; ?></textarea>
                    </div>
                    <?php if ($validation->getError('address')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('address'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-md btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>