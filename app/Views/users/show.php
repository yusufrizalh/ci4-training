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
                        <div class="btn-group">
                            <button class="btn btn-sm text-white">
                                <i class="fa-solid fa-pencil"></i>
                            </button>&nbsp;&nbsp;
                            <button class="btn btn-sm text-white">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Name: <b>
                                <?= $user['username']; ?>
                            </b></p>
                        <p>Email: <b><?= $user['usermail']; ?></b></p>
                        <p>Department: <b><?= $user['dept_name']; ?></b></p>
                        <span>Status:
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <?php if ($user['status'] == 1): ?>
                                    <b>Active</b>
                                <?php else: ?>
                                    <b>Inactive</b>
                                <?php endif; ?>
                            </a>
                        </span>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Status</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="status">
                                                <label class="form-check-label" for="status">Active / Inactive</label>
                                            </div>
                                            <hr>
                                            <div class="form-group mt-3 d-flex justify-content-end">
                                                <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-dismiss="modal">Cancel</button>
                                                <form action="#" method="post">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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