<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Create New User
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Create New User</h1>
<hr>

<?php if (session()->has('message')): ?>
    <div class="alert <?= session()->getFlashdata('alert-class'); ?>">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<?php $validation = \Config\Services::validation(); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white fw-bold h3">
                Create New User
            </div>
            <div class="card-body bg-white text-dark">
                <form action="<?= base_url('users'); ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-4">
                        <label for="username" class="fw-bold mb-2">User Name **</label>
                        <input type="text" name="username" class="form-control" autocomplete="off">
                    </div>
                    <?php if ($validation->getError('username')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('username'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-4">
                        <label for="usermail" class="fw-bold mb-2">User Email **</label>
                        <input type="text" name="usermail" class="form-control" autocomplete="off">
                    </div>
                    <?php if ($validation->getError('usermail')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('usermail'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-4">
                        <label for="userpass" class="fw-bold mb-2">User Password **</label>
                        <input type="password" name="userpass" class="form-control" autocomplete="off">
                    </div>
                    <?php if ($validation->getError('userpass')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('userpass'); ?>
                        </div>
                    <?php } ?>

                    <?php

                    use App\Models\DepartmentModel;

                    $departmentmodel = new DepartmentModel();
                    $departments = $departmentmodel->select('departments.*')->orderBy('departments.dept_name', 'asc')->findAll();
                    $data = ['departments' => $departments];
                    ?>
                    <div class="form-group mb-4">
                        <label for="userpass" class="fw-bold mb-2">Department **</label>
                        <select name="fk_dept_id" class="form-control">
                            <?php if ($departments):  ?>
                                <option disabled selected>-- Choose One --</option>
                                <?php foreach ($departments as $dept) : ?>
                                    <option value="<?= $dept['dept_id']; ?>"><?= $dept['dept_name']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <?php if ($validation->getError('fk_dept_id')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('fk_dept_id'); ?>
                        </div>
                    <?php } ?>

                    <?php
                    $db = \Config\Database::connect();
                    $builder = $db->table('skills');
                    $skills = $builder->select('skills.*')->orderBy('skills.skill_name', 'asc')->get()->getResultArray();
                    $data = ['skills' => $skills];
                    ?>
                    <div class="form-group mb-4">
                        <label for="skills" class="fw-bold mb-2">Skills **</label>
                        <div class="row">
                            <?php if ($skills):  ?>
                                <?php foreach ($skills as $skill):  ?>
                                    <div class="col-md-4">
                                        <div class="input-group-text mb-2">
                                            <input class="form-check-input" type="checkbox" multiple name="skills[]" value="<?= $skill['skill_id']; ?>">
                                            <span class="ms-3"><?= $skill['skill_name']; ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($validation->getError('skills[]')) { ?>
                        <div class="alert alert-danger mt-2 mb-2">
                            <?= $error = $validation->getError('skills[]'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-md btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>