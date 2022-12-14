<?php
require "conn.php";

if (isset($_SESSION['login']) && isset($_SESSION["name"])) {
    $_SESSION['needLogout'] = true;
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/original/css/style.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="dark-bg">
    <div class="h-100 d-flex align-items-center justify-content-center p-5">
        <div class="container-sm card shadow-lg text-bg-dark p-5" style="width: 33rem;">
            <p class="fs-2 fw-semibold text-center mb-3 anti-white">Login</p>
            <form action="" method="post" autocomplete="off">
                <div class="mb-3 anti-white">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username">
                </div>
                <div class="mb-3 anti-white">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div>
                <div class="d-grid gap-2">
                    <button name="login" class="btn btn-primary mt-2" type="submit">Login</button>
                </div>
            </form>
            <div id="liveAlertPlaceholder"></div>
            <p class="text-center mt-3 anti-white">Don't have an account? <a href="signup.php" class="fw-semibold no-decoration">Sign up</a></p>
            <p class="text-center small-font anti-white">Not a writer or an admin? <a href="index.php" class="fw-semibold no-decoration">Login as visitor</a></p>
            <footer class="justify-content-center border-top">
                <span class="mt-3 text-center smaller-font span-space anti-white-a">Developed to fulfill the semester final exam of "Pemrograman Platform Web"</span>
                <span class="text-center smaller-font span-space anti-white-a">&copy; <?= date("Y"); ?> Azhar Zaidan Fauzi, 20106050022</span>
            </footer>
        </div>
    </div>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/original/js/alert.js"></script>

</body>

</html>

<?php

if (isset($_POST["login"])) {
    if (login($_POST)) {
        header("Location: index.php");
    }
    else {
        echo "<script>alertJ('Failed to login, check username and password again', 'danger')</script>";
    }
}
