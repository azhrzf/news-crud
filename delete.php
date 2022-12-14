<?php

require("conn.php");

if (!(isset($_SESSION['login']) && isset($_SESSION["name"]))) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$delete = "DELETE FROM news WHERE newsID=$id";

$deleteHandler = delete($delete);

if ($deleteHandler > 0) {
    $_SESSION["delete"] = true;
    header("Location: index.php");
} else {
    $_SESSION["delete"] = false;
    header("Location: index.php");
}
