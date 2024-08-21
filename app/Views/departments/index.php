<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Departments
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>
<div class="row d-flex justify-content-between align-items-center">
    <div class="col-md-6">
        <h1>Departments Data</h1>
    </div>
</div>
<hr>

<!-- display alert message -->
<?php if (session()->has('message')): ?>
    <div class="alert <?= session()->getFlashdata('alert-class'); ?>">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<?php if ($departments):  ?>
    <div class="row">
        <?php $no = 1; ?>
        <?php foreach ($departments as $department) : ?>
            <div class="col-md-3">
                <div class="card shadow border-secondary mb-4 me-2 text-decoration-none">
                    <div class="card-header bg-success text-white fw-bold">NO: <?= $no; ?></div>
                    <div class="card-body">
                        <b>
                            <a class="text-primary text-decoration-none"
                                href="<?= base_url('departments/') . $department['dept_name']; ?>">
                                <?= $department['dept_name']; ?>
                            </a>
                        </b>
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