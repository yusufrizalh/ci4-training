<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
User Detail
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>User Detail</h1>
<hr>

<?php if ($users):  ?>
    <div class="row">
        <?php $no = 1; ?>
        <?php foreach ($users as $user) : ?>
            <div class="col-md-8">
                <div class="card shadow border-secondary mb-4 me-2 text-decoration-none">
                    <div class="card-header bg-success text-white fw-bold d-flex justify-content-between align-items-center">
                        <span class="fw-bold">NO: <?= $no; ?></span>
                        <!-- <div class="btn-group">
                            <button class="btn btn-sm btn-outline-info text-white">Edit</button>
                            <button class="btn btn-sm btn-outline-danger text-white">Delete</button>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <p>Name: <b>
                                <?= $user['username']; ?>
                            </b></p>
                        <p>Email: <b><?= $user['usermail']; ?></b></p>
                        <p>Department: <b><?= $user['dept_name']; ?></b></p>
                    </div>
                    <div class="card-footer">
                        <span class="fw-bold me-2">Skills: </span>
                        <?php if ($userskills): ?>
                            <?php foreach ($userskills as $skills): ?>
                                <span class="badge rounded-pill text-bg-success">
                                    <a href="<?= base_url('skills/') . $skills['skill_name']; ?>" class="text-decoration-none text-white">
                                        <?= $skills['skill_name']; ?>
                                    </a>
                                </span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="badge rounded-pill text-bg-danger">No skills</span>
                        <?php endif; ?>
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