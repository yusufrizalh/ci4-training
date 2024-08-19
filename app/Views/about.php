<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
About
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<div class="px-4 bg-body-secondary rounded-3">
    <div class="container py-5">
        <h1 class="display-6 fw-bold">About Page</h1>
        <p class="col-md-8 fs-4">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque molestiae blanditiis natus, molestias exercitationem suscipit quidem accusantium non itaque nostrum sunt ex ea distinctio id ab sint tempora magnam. Alias.
        </p>
        <p class="fs-3">My name is <strong><?= $name; ?></strong>.</p>
        <button class="btn btn-primary btn-lg" type="button">Open about page</button>
    </div>
</div>

<div class="row align-items-md-stretch pt-4">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header">
                <img class="card-img-top" alt="Bootstrap Thumbnail First" src="https://www.layoutit.com/img/people-q-c-600-200-1.jpg" />
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    Card title
                </h5>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo obcaecati quas earum cupiditate sapiente consequuntur delectus quo veritatis adipisci nesciunt aspernatur optio eos suscipit, tenetur error nam voluptatibus culpa aut.
                </p>
            </div>
            <div class="card-footer">
                <span>
                    <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" alt="Bootstrap Thumbnail Second" src="https://www.layoutit.com/img/city-q-c-600-200-1.jpg" />
            <div class="card-body">
                <h5 class="card-title">
                    Card title
                </h5>
                <p class="card-text">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. In quia nam nulla, delectus eum repellat magni esse aliquid tenetur ipsum corrupti qui sed, sequi dolor veritatis velit aut eos distinctio!
                </p>
                <p>
                    <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="https://www.layoutit.com/img/sports-q-c-600-200-1.jpg" />
            <div class="card-body">
                <h5 class="card-title">
                    Card title
                </h5>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore totam quisquam ab ullam, dolorem tempora accusantium quis quia necessitatibus, eveniet magni voluptatum commodi eaque veritatis dolor est similique. Cumque, explicabo.
                </p>
                <p>
                    <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>