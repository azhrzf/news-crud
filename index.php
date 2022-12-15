<?php
require "conn.php";
$search = notSearch();

if (isset($_POST["search"])) {
    $search = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ON! News</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/original/css/style.css" rel="stylesheet">
</head>

<body class="dark-bg">
    <?php include "assets/original/part/header.php" ?>
    <div class="container-sm mt-5">
        <p class="anti-white fs-1">Designed by Azhar Zaidan Fauzi,<span class="span-space">ON! News is the best online news all over the world.</span></p>
        <div class="mb-5">
            <div class="row g-2">
                <?php if (isset($_SESSION["login"])) : ?>
                    <div class="col-xl-2 d-grid">
                        <a class="btn btn-outline-light py-2" href="addnews.php">Write new news</a>
                    </div>
                    <div class="col-xl-2 d-grid">
                        <a class="btn btn-outline-danger py-2" href="logout.php">Logout</a>
                    </div>
                <?php else : ?>
                    <div class="col-xl-2 d-grid">
                        <a class="btn btn-outline-primary py-2" href="login.php">Login</a>
                    </div>
                    <div class="col-xl-2 d-grid">
                        <a class="btn btn-outline-info py-2" href="signup.php">Sign-up</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="liveAlertPlaceholder"></div>
        <div class="mb-5 pt-5">
            <div class="row g-3">
                <?php include "assets/original/part/card.php"; ?>
            </div>
        </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/original/js/alert.js"></script>
    <script src="assets/original/js/height.js"></script>
</body>

</html>

<?php

if (isset($_SESSION['needLogout'])) {
    echo "<script>alertJ('Logout first before login again', 'danger')</script>";
    unset($_SESSION["needLogout"]);
} else if (isset($_SESSION['notWriter'])) {
    echo "<script>alertJ('Login first to write!', 'danger')</script>";
    unset($_SESSION['notWriter']);
} else if (isset($_SESSION['delete'])) {
    if ($_SESSION["delete"]) {
        echo "<script>alertJ('Deleted successfully!', 'success')</script>";
    } else {
        echo "<script>alertJ('Failed to delete!', 'success')</script>";
    }
    unset($_SESSION['delete']);
} else if (isset($_SESSION["editNews"])) {
    if ($_SESSION["editNews"]) {
        echo "<script>alertJ('News changed successfully!', 'success')</script>";
    } else {
        echo "<script>alertJ('News failed to change, check the input again!', 'danger')</script>";
    }
    unset($_SESSION["editNews"]);
} else if (isset($_SESSION['login']) && isset($_SESSION["name"])) {
    $welcomeName = $_SESSION["name"];
    echo "<script>alertJ('Login success! Welcome, $welcomeName!', 'success')</script>";
} else {
    echo "<script>alertJ('Welcome visitor! If you want to add news, please sign-up or login', 'primary')</script>";
}
