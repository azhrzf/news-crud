<?php
require "conn.php";

if (!(isset($_SESSION['login'])) && !(isset($_SESSION["username"]))) {
    $_SESSION['notWriter'] = true;
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write New News</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/original/css/style.css" rel="stylesheet">
</head>

<body class="dark-bg">
    <?php include "assets/original/part/header.php" ?>
    <div class="container-sm mt-5">
        <p class="anti-white fs-1">Welcome Azhar Zaidan Fauzi!<span class="span-space">What news will you write this time?</span></p>
        <div class="mb-5">
            <div class="row g-2">
                <div class="col-xl-2 d-grid">
                    <button type="button" class="btn btn-outline-light py-2">Home</button>
                </div>
                <div class="col-xl-2 d-grid">
                    <button type="button" class="btn btn-outline-danger py-2">Logout</button>
                </div>
            </div>
        </div>
        <div id="liveAlertPlaceholder"></div>
        <div class="mb-5 pt-5">
            <div class="card text-bg-dark">
                <form class="card-body text-bg-dark p-5" action="" method="post" autocomplete="off">
                    <div class="row g-3 mb-5">
                        <div class="col-xl-6 d-grid">
                            <label for="titleInput" class="form-label">
                                <h5 class="card-title anti-white">Title</h5>
                            </label>
                            <input name="title" type="text" class="form-control text-bg-dark" id="titleInput" placeholder="Title">
                        </div>
                        <div class="col-xl-3 d-grid">
                            <label for="dateInput" class="form-label">
                                <h5 class="card-title anti-white">Date</h5>
                            </label>
                            <input name="date" type="text" class="form-control text-bg-dark" id="dateInput" value="<?= date('d/m/y') ?>" disabled>
                        </div>
                        <div class="col-xl-3 d-grid">
                            <label for="usernameInput" class="form-label">
                                <h5 class="card-title anti-white">Writer</h5>
                            </label>
                            <input name="writer" type="text" class="form-control text-bg-dark" id="usernameInput" value="<?= $_SESSION["username"]; ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="articleInput" class="form-label">
                            <h5 class="card-title anti-white">Article</h5>
                        </label>
                        <textarea name="article" class="form-control text-bg-dark" id="articleInput" rows="15"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button name="addnews" class="btn btn-success mt-2" type="submit">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/original/js/alert.js"></script>

</body>

</html>

<?php 

if (isset($_POST["addnews"])) {
    if (addNews($_POST, $_SESSION["userID"]) > 0) {

    } 
}