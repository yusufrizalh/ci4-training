<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
About
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>About Page</h1>
<p>
    This is About Page. My name is <?= $name; ?>.
</p>

<?= $this->endSection(); ?>