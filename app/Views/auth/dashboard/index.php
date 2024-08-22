<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Dashboard
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Welcome, <strong><?= $session->get('username'); ?></strong></h1>
<hr>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-success text-white fw-bold h4">
                Total Active Users
            </div>
            <div class="card-body">
                <h3>
                    <a href="<?= base_url('users'); ?>" class="text-primary text-decoration-none"><?= $countUsers['count_users'] . " Users."; ?></a>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-info text-white fw-bold h4">
                Total Departments
            </div>
            <div class="card-body">
                <h3>
                    <a href="<?= base_url('departments'); ?>" class="text-primary text-decoration-none"><?= $countDepartments['count_departments'] . " Departments."; ?></a>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold h4">
                Total Skills
            </div>
            <div class="card-body">
                <h3>
                    <a href="<?= base_url('skills'); ?>" class="text-primary text-decoration-none"><?= $countSkills['count_skills'] . " Skills."; ?></a>
                </h3>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>