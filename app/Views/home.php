<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Home
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Home Page</h1>
<p>
    This is Home Page.
</p>

<?= $this->endSection(); ?>