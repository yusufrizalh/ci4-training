<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Employees
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1>Employees Data</h1>
    </div>
    <div><a href="<?= base_url('employees/create'); ?>" class="btn btn-success fw-bold shadow">Create Employee</a></div>
</div>
<hr>

<!-- <table class="table table-bordered table-hover">
    <thead class="table-success">
        <tr>
            <th>NO.</th>
            <th>NAME</th>
            <th>EMAIL</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        if ($employees):
            foreach ($employees as $employee):
        ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $employee['name']; ?></td>
                    <td><?= $employee['email']; ?></td>
                </tr>
        <?php
                $no++;
            endforeach;
        endif;
        ?>
    </tbody>
</table> -->

<!-- display alert message -->
<?php if (session()->has('message')): ?>
    <div class="alert <?= session()->getFlashdata('alert-class'); ?>">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<?php if ($employees): ?>
    <div class="row">
        <?php $no = 1; ?>
        <?php foreach ($employees as $employee) : ?>
            <div class="col-md-4">
                <a class="card shadow border-secondary mb-4 me-2 text-decoration-none" href="<?= base_url('employees/') . $employee['name']; ?>">
                    <div class="card-header bg-success text-white fw-bold">NO: <?= $no; ?></div>
                    <div class="card-body">
                        <p>Name: <b><?= $employee['name']; ?></b></p>
                        <p>Email: <b><?= $employee['email']; ?></b></p>
                    </div>
                </a>
            </div>
            <?php $no++; ?>
        <?php endforeach; ?>

        <!-- pagination -->
        <div class="d-flex justify-content-center align-items-center mt-5">
            <?php if (!empty($pager)): ?>
                <?= $pager_links; ?>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning">
        <h3 class="fw-bold text-dark">No data available.</h3>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>