<?php

require("conn.php");

if (!(isset($_SESSION['login']) && isset($_SESSION["name"]))) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!changeQuery($id)) {
        header("Location: index.php");
        exit;
    } else {
        $delete = "DELETE FROM news WHERE newsID=$id";

        $deleteHandler = delete($delete);

        if ($deleteHandler > 0) {
            $_SESSION["delete"] = true;
            header("Location: index.php");
        } else {
            $_SESSION["delete"] = false;
            header("Location: index.php");
        }
    }
}
