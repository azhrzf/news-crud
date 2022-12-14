<?php
require "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (changeQuery($id)) {
        $change = changeQuery($id);
        foreach ($change as $edit) {
            $name = $edit["name"];
            $title = $edit["title"];
            $date = $edit["date"];
            $article = $edit["article"];
            $thumbnail = $edit["thumbnail"];
        }
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/original/css/style.css" rel="stylesheet">

</head>

<body class="dark-bg">
    <?php include "assets/original/part/header.php" ?>
    <div class="container-sm mt-5">
        <h1 class="anti-white"><?= $title ?></h1>
        <p class="small-font fs-6" style="color: white;"><?= $name ?> | <?= $date ?></p>
        <?php if (isset($_SESSION["isAdmin"]) && isset($_SESSION["name"])) : ?>
            <?php if ($_SESSION["isAdmin"] || filterWriter($_SESSION["name"], $name)) : ?>
                <div class="mb-3">
                    <div class="row g-2">
                        <div class="col-xl-2 d-grid">
                            <a class="btn btn-outline-success py-2" href="addnews.php?id=<?= $id ?>">Edit</a>
                        </div>
                        <div class="col-xl-2 d-grid">
                            <a class="btn btn-outline-danger py-2" href="delete.php?id=<?= $id ?>">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php $renderArticle = articleSeparator($article) ?>
        <?php for ($i = 0; $i < count($renderArticle); $i++) : ?>
            <p class="text-light"><?= $renderArticle[$i] ?></p>
        <?php endfor; ?>
    </div>

    </div>
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>