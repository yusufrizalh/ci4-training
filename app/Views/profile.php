<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Profile
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Profile Page</h1>
<p>
    My name is <?= $myname; ?>
</p>

<?= $this->endSection(); ?>