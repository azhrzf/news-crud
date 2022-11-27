<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/original/css/style.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="gardient-bg">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="container-sm card shadow-lg p-5" style="width: 30rem;">
            <p class="fs-2 fw-semibold text-center mb-3">Sign-up</p>
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Writer Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Writer Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary mt-2" type="submit">Sign-up</button>
                </div>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="login.php" class="fw-semibold no-decoration">Login</a></p>
            <p class="text-center small-font">Not a writer? <a href="index.php" class="fw-semibold no-decoration">Login as visitor</a></p>
            <footer class="justify-content-center border-top">
                <span class="mt-3 text-center smaller-font span-space">Developed to fulfill the semester final exam of "Pemrograman Platform Web"</span>
                <span class="text-center smaller-font span-space">&copy; <?= date("Y"); ?> Azhar Zaidan Fauzi, 20106050022</span>
            </footer>
        </div>
    </div>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>