<?php for ($i = 0; $i < 20; $i++) : ?>
    <div class="col-xl-4 d-grid zoom-hover">
        <div class="card text-bg-dark">
            <div class="card-img-top" style="background-image: linear-gradient(160deg, rgb(<?= rgbRandom() ?>) 0%, rgb(<?= rgbRandom() ?>) 100%);">
                <div class="card-body text-bg-dark rand-bg">
                    <h5 class="card-title"><a href="#" class="no-decoration-pure">Card title</a></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a class="no-decoration" href="#">read more</a></p>
                    <div>
                        <div class="row g-2">
                            <div class="col-6 d-grid">
                                <a href="#" class="btn btn-outline-success">Edit</a>
                            </div>
                            <div class="col-6 d-grid">
                                <a href="#" class="btn btn-outline-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>