<?php
require "conn.php";

if (!(isset($_SESSION['login'])) && !(isset($_SESSION["name"]))) {
    $_SESSION['notWriter'] = true;
    header("Location: index.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (changeQuery($id)) {
        $change = changeQuery($id);
        foreach ($change as $edit) {
            $editName = $edit["name"];
            $editTitle = $edit["title"];
            $editDate = $edit["date"];
            $editArticle = $edit["article"];
            $editThumbnail = $edit["thumbnail"];
        }
    } else {
        header("Location: addnews.php");
    }
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
        <p class="anti-white fs-1">Welcome Azhar Zaidan Fauzi! <span class="span-space">What news will you write this time?</span></p>
        <div class="mb-5">
            <div class="row g-2">
                <div class="col-xl-2 d-grid">
                    <a href="index.php" class="btn btn-outline-light py-2">Home</a>
                </div>
                <div class="col-xl-2 d-grid">
                    <a href="logout.php" class="btn btn-outline-danger py-2">Logout</a>
                </div>
            </div>
        </div>
        <div id="liveAlertPlaceholder"></div>
        <div class="mb-5 pt-5">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="row g-5 mb-5">
                    <div class="col-xl-9 d-grid">
                        <div>
                            <label for="titleInput" class="form-label">
                                <h5 class="card-title anti-white">Title</h5>
                            </label>
                            <input name="title" type="text" class="form-control text-bg-dark" id="titleInput" placeholder="Title" value="<?= isset($editTitle) ? $editTitle : "" ?>" required>
                        </div>
                        <div class="mt-4">
                            <label for="articleInput" class="form-label">
                                <h5 class="card-title anti-white">Article</h5>
                            </label>
                            <textarea name="article" class="form-control text-bg-dark" id="articleInput" rows="15" placeholder="Write your news here" required><?= isset($editArticle) ? $editArticle : "" ?></textarea>
                        </div>
                    </div>
                    <div class="col-xl-3 px-4">
                        <div>
                            <label for="dateInput" class="form-label">
                                <h5 class="card-title anti-white">Date</h5>
                            </label>
                            <input name="date" style="display: none;" type="text" class="form-control text-bg-dark" id="dateInput" value="<?= date('l, d/m/Y'); ?>">
                            <input name="date" type="text" class="form-control text-bg-dark" id="dateInput" value="<?= date('l, d/m/Y'); ?>" disabled>
                        </div>
                        <div class="mt-4">
                            <label for="usernameInput" class="form-label">
                                <h5 class="card-title anti-white">Writer</h5>
                            </label>
                            <input type="text" class="form-control text-bg-dark" id="usernameInput" value="<?= isset($editName) ? $editName : $_SESSION["name"] ?>" disabled>
                        </div>
                        <div class="mt-4">
                            <label for="thumbnailInput" class="form-label">
                                <h5 class="card-title anti-white">Thumbnail</h5>
                            </label>
                            <?php if (isset($editThumbnail)) : ?>
                                <input name="oldThumbnail" style="display: none;" type="text" class="form-control text-bg-dark" value="<?= $editThumbnail ?>">
                            <?php endif; ?>
                            <input type="file" class="form-control text-bg-dark" name="thumbnail" id="thumbnailInput">
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button name="addnews" class="btn btn-outline-success mt-2" type="submit"><?= isset($editName) ? "Edit" : "Publish"?></button>
                        </div>
                        <div class="d-grid gap-2 mt-1">
                            <a class="btn btn-outline-danger mt-2" href="index.php">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/original/js/alert.js"></script>

</body>

</html>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (changeQuery($id)) {
        if (isset($_POST["addnews"])) {
            if (change($_POST, $_SESSION["name"], $id) > 0) {
                $_SESSION["editNews"] = true;
            } else {
                $_SESSION["editNews"] = false;
            }
            echo "<script>window.location.href = 'index.php'</script>";
        }
    } else {
        echo "<script>window.location.href = 'addnews.php'</script>";
    }
} else if (isset($_POST["addnews"])) {
    if (addNews($_POST, $_SESSION["name"]) > 0) {
        echo "<script>alertJ('News has been successfully published!', 'success')</script>";
    } else {
        echo "<script>alertJ('The news failed to be published, check the input again!', 'danger')</script>";
    }
}
