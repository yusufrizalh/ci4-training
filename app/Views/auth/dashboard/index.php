<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Dashboard
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Dashboard</h1>
<hr>

<p>Welcome, <strong><?= $session->get('username'); ?></strong></p>

<?= $this->endSection(); ?>