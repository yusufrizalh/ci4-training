<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Home
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<!-- <div class="px-4 bg-body-secondary rounded-3">
    <div class="container py-5">
        <h1 class="display-6 fw-bold">Home Page</h1>
        <p class="col-md-8 fs-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt recusandae iusto suscipit, cum quas consectetur pariatur laboriosam voluptates praesentium perspiciatis! Vel rem soluta cupiditate veniam obcaecati velit excepturi iure adipisci!
        </p>
        <button class="btn btn-primary btn-lg" type="button">Getting Started</button>
    </div>
</div> -->

<div class="row gx-4 gx-lg-5 align-items-center">
    <div class="col-md-6">
        <h1 class="font-weight-light">Learning & Certification Center</h1>
        <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
        <button class="btn btn-primary">Getting Started</button>
    </div>
    <div class="col-md-6">
        <img class="img-fluid rounded mb-4" src="https://dummyimage.com/900x400/dddddd/000000.png&text=Your+image+here" alt="your-image-here" />
    </div>
</div>

<div class="row align-items-md-stretch pt-4">
    <div class="col-md-6">
        <div class="h-100 p-5 text-bg-secondary rounded-3">
            <h2>Training & Certification</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis repudiandae in nobis eius non dolorem unde et similique, voluptate itaque necessitatibus blanditiis cum voluptates architecto delectus voluptatum. Veniam, perspiciatis inventore?</p>
            <button class="btn btn-outline-light" type="button">Learn more</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>Our Partners</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt illo eos placeat animi harum, fugit consectetur laudantium blanditiis quasi temporibus, modi error totam. Expedita, magni nihil. Perferendis, esse aperiam! Doloribus.</p>
            <button class="btn btn-outline-secondary" type="button">Learn More</button>
        </div>
    </div>
</div>
<div class="row align-items-md-stretch pt-4">
    <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>Our Teams</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat distinctio nesciunt ut velit similique explicabo suscipit veniam esse? Expedita recusandae esse deleniti quod ipsam eius, blanditiis officia autem incidunt temporibus!</p>
            <button class="btn btn-outline-secondary" type="button">Learn More</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-5 text-bg-secondary rounded-3">
            <h2>Careers</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro soluta cupiditate eveniet! Aspernatur temporibus fuga eius hic necessitatibus, voluptatum corporis dignissimos nemo, ullam ipsa nesciunt mollitia provident magnam qui atque!</p>
            <button class="btn btn-outline-light" type="button">Learn more</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>