<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Contact
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Contact Page</h1>
<hr>

<?php $validation = \Config\Services::validation(); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">Please contact us</div>
            <div class="card-body">
                <form action="<?= base_url('contact'); ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group mb-3">
                        <label for="name"><b>Name</b></label>
                        <input type="text" name="name" class="form-control" autocomplete="off">
                    </div>
                    <!-- if name error -->
                    <?php if ($validation->getError('name')) { ?>
                        <div class="alert alert-danger mt-2">
                            <?= $error = $validation->getError('name'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-3">
                        <label for="email"><b>Email address</b></label>
                        <input type="text" name="email" class="form-control" autocomplete="off">
                    </div>
                    <!-- if email error -->
                    <?php if ($validation->getError('email')) { ?>
                        <div class="alert alert-danger mt-2">
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mb-3">
                        <label for="message"><b>Message</b></label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <!-- if message error -->
                    <?php if ($validation->getError('message')) { ?>
                        <div class="alert alert-danger mt-2">
                            <?= $error = $validation->getError('message'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-md btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>