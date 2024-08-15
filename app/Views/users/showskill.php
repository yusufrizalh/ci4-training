<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Skill Data
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Skill Data</h1>
<hr>

<?php if ($skill):  ?>
    <div class="row">
        <?php $no = 1; ?>
        <?php foreach ($skill as $skl) : ?>
            <div class="col-md-4">
                <div class="card shadow border-secondary mb-4 me-2 text-decoration-none">
                    <div class="card-header bg-success text-white fw-bold d-flex justify-content-between">
                        <span><?= $skl['skill_name']; ?></span>
                        <span><?= $no; ?></span>
                    </div>
                    <div class="card-body">
                        <p>Name: <b>
                                <a class="text-primary text-decoration-none" href="<?= base_url('users/') . $skl['username']; ?>">
                                    <?= $skl['username']; ?>
                                </a>
                            </b></p>
                        <p>Email: <b><?= $skl['usermail']; ?></b></p>
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