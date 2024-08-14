<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Employee Detail
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Employee Detail</h1>
<hr>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white fw-bold h3">
                Employee Detail: <strong><?php echo $employee['id']; ?></strong>
            </div>
            <div class="card-body bg-white text-dark">
                <p class="h5">Name: <strong><?php echo $employee['name']; ?></strong></p>
                <p>Email: <strong><?php echo $employee['email']; ?></strong></p>
                <p>Phone: <strong><?php echo $employee['phone']; ?></strong></p>
                <p>Address: <strong><?php echo $employee['address']; ?></strong></p>
            </div>
            <div class="card-footer bg-white">
                <a href="<?= base_url('employees/edit/') . $employee['id']; ?>" class="btn btn-md btn-info me-3">Edit</a>
                <button type="button" class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Employee</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="h4">Are you sure to delete this employee?</p>
                                <hr>
                                <p class="h3 fw-bold">Name: <?= $employee['name']; ?></p>
                                <small class="text-danger">This action cannot be undone!</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-md btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
                                <form action="" method="post">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-md btn-danger">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>