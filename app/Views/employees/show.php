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
            <div class="card-header bg-success text-white fw-bold">
                Employee Detail: <strong><?php echo $employee['id']; ?></strong>
            </div>
            <div class="card-body bg-white text-dark">
                <p class="h-5">Name: <strong><?php echo $employee['name']; ?></strong></p>
                <p>Email: <strong><?php echo $employee['email']; ?></strong></p>
                <p>Phone: <strong><?php echo $employee['phone']; ?></strong></p>
                <p>Address: <strong><?php echo $employee['address']; ?></strong></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>