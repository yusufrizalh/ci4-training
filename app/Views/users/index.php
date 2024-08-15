<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Users
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Users Data</h1>
<hr>

<?php if ($users):  ?>
    <div class="row">
        <?php $no = 1; ?>
        <?php foreach ($users as $user) : ?>
            <div class="col-md-4">
                <div class="card shadow border-secondary mb-4 me-2 text-decoration-none">
                    <div class="card-header bg-success text-white fw-bold">NO: <?= $no; ?></div>
                    <div class="card-body">
                        <p>Name: <b>
                                <a class="text-primary text-decoration-none"
                                    href="<?= base_url('users/') . $user['username']; ?>">
                                    <?= $user['username']; ?>
                                </a>
                            </b></p>
                        <p>Email: <b><?= $user['usermail']; ?></b></p>
                    </div>
                    <div class="card-footer">
                        <span class="fw-bold">
                            <a href="<?= base_url('departments/') . $user['dept_name']; ?>" class="text-primary text-decoration-none"><?= $user['dept_name']; ?></a>
                        </span>
                    </div>
                </div>
            </div>
            <?php $no++; ?>
        <?php endforeach; ?>

        <!-- pagination -->
        <div class="mt-5">
            <?php if (!empty($pager)): ?>
                <?= $pager->links('group1', 'full_pager'); ?>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-sm btn-light">
                <?= 'Page ' . $currentPage . ' of ' . $totalPages; ?>
            </button>
        </div>

    </div>
<?php else: ?>
    <div class="alert alert-warning">
        <h3 class="fw-bold text-dark">No users found.</h3>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>