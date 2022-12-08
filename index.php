<?php
require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online News</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php include "assets/original/css/style.css" ?>
    </style>
</head>

<body class="dark-bg">
    <?php include "assets/original/part/header.php" ?>
    <div class="container-sm mt-5">
        <p class="anti-white fs-1">Designed by Azhar Zaidan Fauzi,<span class="span-space">ON! News is the best online news all over the world.</span></p>
        <div class="mb-5">
            <div class="row g-2">
                <div class="col-xl-2 d-grid">
                    <button type="button" class="btn btn-outline-light py-2">Write new news</button>
                </div>
                <div class="col-xl-2 d-grid">
                    <button type="button" class="btn btn-outline-danger py-2">Logout</button>
                </div>
                <div class="col-xl-2 d-grid">
                    <button type="button" class="btn btn-outline-primary py-2">Login</button>
                </div>
                <div class="col-xl-2 d-grid">
                    <button type="button" class="btn btn-outline-info py-2">Sign-up</button>
                </div>
            </div>
        </div>
        <div class="mb-5 pt-5">
            <div class="row g-3">
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
            </div>
        </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>