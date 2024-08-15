<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Department Data
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Department Data</h1>
<hr>

<?php if ($department):  ?>
    <div class="row">
        <?php $no = 1; ?>
        <?php foreach ($department as $dept) : ?>
            <div class="col-md-4">
                <div class="card shadow border-secondary mb-4 me-2 text-decoration-none">
                    <div class="card-header bg-success text-white fw-bold d-flex justify-content-between">
                        <span><?= $dept['dept_name']; ?></span>
                        <span><?= $no; ?></span>
                    </div>
                    <div class="card-body">
                        <p>Name: <b>
                                <a class="text-primary text-decoration-none" href="<?= base_url('users/') . $dept['username']; ?>">
                                    <?= $dept['username']; ?>
                                </a>
                            </b></p>
                        <p>Email: <b><?= $dept['usermail']; ?></b></p>
                    </div>
                </div>
            </div>
            <?php $no++; ?>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning">
        <h3 class="fw-bold text-dark">No users found.</h3>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>