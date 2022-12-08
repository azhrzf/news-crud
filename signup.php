<?php
session_start();

require "conn.php";

if (isset($_POST["signupWriter"])) {
    if (signup($_POST, 0) > 0) {
        
    }
    else {

    }
}

else if (isset($_POST["signupAdmin"])) {
    if (signup($_POST, 1) > 0) {

    }
    else {
            
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        <?php include "assets/original/css/style.css" ?>
    </style>
</head>

<body class="dark-bg">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="container-sm card shadow-lg text-bg-dark px-5 py-4" style="width: 33rem;">
            <p class="fs-2 fw-semibold text-center mb-3 anti-white">Sign-up</p>
            <form action="" method="post" autocomplete="off">
                <div class="mb-3 anti-white">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
                </div>
                <div class="mb-3 anti-white">
                    <label for="name" class="form-label">Full Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required>
                </div>
                <div class="mb-3 anti-white">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="mb-3 anti-white">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input name="comfirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div>
                    <div class="row g-2">
                        <div class="col-xl-5 d-grid">
                            <button name="signupWriter" class="btn btn-primary mt-2" type="submit" >Sign-up as a Writer</button>
                        </div>
                        <div class="col-xl-5 d-grid">
                            <button name="signupAdmin" class="btn btn-info mt-2 text-white" type="submit">Sign-up as an Admin</button>
                        </div>
                        <div class="col-xl-2 d-grid">
                            <button class="btn btn-secondary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">?</button>
                        </div>
                        <div class="collapse mt-3" id="collapseExample">
                            <div class="card card-body text-bg-dark border-light">
                                The difference is that the admin can delete and change all news data, while the writer can only change his own news.
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <p class="text-center mt-3 anti-white">Already have an account? <a href="login.php" class="fw-semibold no-decoration">Login</a></p>
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