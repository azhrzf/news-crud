<?php
session_start();

// CHECK IF MYSQL ACTIVE
try {
    mysqli_connect("localhost", "root", "");
}
catch (Exception $e){
    echo "<h1>MYSQL-nya BELUM NYALA PAK HEHE..✌️</h1>";
    die;
}

// CHECK IF DATABASE EXIST 
$connCheck = mysqli_connect("localhost", "root", "");

try {
    empty(mysqli_select_db($connCheck, "online_news"));
} catch (Exception $e) {
    $create = "CREATE DATABASE IF NOT EXISTS online_news";
    $connCheck->query($create);

    $sql = file_get_contents('online_news.sql');
    $mysqli = new mysqli("localhost", "root", "", "online_news");
    $mysqli->multi_query($sql);

    header("Location: index.php");
}


// QUERY FUNCTIONS

$conn = mysqli_connect("localhost", "root", "", "online_news");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function signup($data, $adminParameter)
{
    global $conn;

    $username = inputValidation($data["username"]);
    $name = inputValidation($data["name"]);
    $password = inputValidation($data["password"]);
    $admin = $adminParameter;
    $confirmPassword = inputValidation($data["confirmPassword"]);

    if (!usernameValidation($username)) {
        echo "<script>alertJ('Invalid username! Valid username is alphanumeric & longer than or equals 5 chars', 'danger')</script>";
        return false;
    }

    $checkUsername = mysqli_query($conn, "SELECT username FROM writer WHERE username = '$username'");

    if (mysqli_fetch_assoc($checkUsername)) {
        echo "<script>alertJ('Username has been taken', 'danger')</script>";
        return false;
    }

    if ($password !== $confirmPassword) {
        echo "<script>alertJ('Password don't match', 'danger')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO writer VALUES ('', '$username', '$name', '$password', '$admin')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function login($data)
{
    global $conn;
    $username = inputValidation($data["username"]);
    $password = inputValidation($data["password"]);

    $verifyUsername = mysqli_query($conn, "SELECT username FROM writer WHERE username = '$username'");
    $verifyUsernameRow = mysqli_query($conn, "SELECT * FROM writer WHERE username = '$username'");

    if (mysqli_fetch_assoc($verifyUsername)) {
        if (mysqli_num_rows($verifyUsernameRow) === 1) {
            $row = mysqli_fetch_assoc($verifyUsernameRow);
            if (password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;
                foreach ($verifyUsernameRow as $verify) {
                    $_SESSION["name"] = $verify['name'];
                    $_SESSION["isAdmin"] = $verify['admin'] == 1 ? true : false;
                }
                return true;
            } else {
                "<script>alertJ('Incorrect password', 'danger')</script>";
                return false;
            }
        }
    } else {
        echo "<script>alertJ('Username not registered, have you registered?', 'danger')</script>";
        return false;
    }
}

function addNews($data, $name)
{
    global $conn;

    $title = inputValidation($data["title"]);
    $date = inputValidation($data["date"]);
    $article = inputValidation($data["article"]);
    $thumbnail = uploadThumbnail();

    if ($thumbnail) {
        $query = "INSERT INTO news VALUES ('', '$name', '$title', '$date', '$article', '$thumbnail')";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function change($data, $name, $id)
{
    global $conn;

    $title = inputValidation($data["title"]);
    $date = inputValidation($data["date"]);
    $article = inputValidation($data["article"]);
    $oldThumbnail = inputValidation($data["oldThumbnail"]);

    $thumbnail = $_FILES['thumbnail']['error'] === 4 ? $oldThumbnail : uploadThumbnail();

    if ($thumbnail) {
        $change = "UPDATE news SET name = '$name', title = '$title', date = '$date', article = '$article', thumbnail = '$thumbnail' WHERE newsID = $id";

        mysqli_query($conn, $change);
    } else {
        return false;
    }

    return mysqli_affected_rows($conn);
}

function uploadThumbnail()
{
    $fileName = $_FILES['thumbnail']['name'];
    $fileSize = $_FILES['thumbnail']['size'];
    $error = $_FILES['thumbnail']['error'];
    $tmpName = $_FILES['thumbnail']['tmp_name'];

    if ($error === 4) {
        return "random";
    }

    $validExtension = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
    $extensionName = explode('.', $fileName);
    $verivyExtension = strtolower(end($extensionName));

    if (!in_array($verivyExtension, $validExtension)) {
        echo "<script>alertJ('Invalid image or invalid image extension', 'danger')</script>";
        return false;
    }

    if ($fileSize > 2000000) {
        echo "<script>alertJ('Image size is too large', 'danger')</script>";
        return false;
    }

    $newName = uniqid();
    $newName .= '.';
    $newName .= $verivyExtension;

    move_uploaded_file($tmpName, 'assets/original/img/' . $newName);

    return $newName;
}

function changeQuery($id)
{
    global $conn;

    $verify = mysqli_query($conn, "SELECT * FROM news WHERE newsID = '$id'");

    if (mysqli_num_rows($verify) === 1) {
        return query("SELECT * FROM news WHERE newsID = '$id'");
    } else {
        return false;
    }
}

function search($data)
{
    $search = "SELECT * FROM news WHERE
            name LIKE '%$data%' OR
            title LIKE '%$data%' OR
            article LIKE '%$data%' OR
            date LIKE '%$data%' ORDER BY newsID DESC";

    return query($search);
}

function notSearch()
{
    return query("SELECT * FROM news ORDER BY newsID DESC");
}

function filterWriter($rightName, $currentName)
{
    $endReturn = false;

    $query = query("SELECT * FROM news WHERE name = '$rightName'");

    foreach ($query as $verify) {
        if ($verify["name"] == $rightName && $verify["name"] == $currentName) {
            $endReturn = true;
        }
    }
    return $endReturn;
}

function delete($data)
{
    global $conn;

    mysqli_query($conn, $data);

    return mysqli_affected_rows($conn);
}

// VALIDATION FUNCTIONS

function inputValidation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function usernameValidation($username)
{
    if (preg_match('/^[a-zA-Z0-9 ]{5,}$/', $username)) {
        return true;
    }
    return false;
}

// GLOBAL FUNCTION

function rgbRandom()
{
    $yakRanFirst = rand(0, 255);
    $yakRanSecond = rand(0, 255);
    $yakRanThird = rand(0, 255);
    return "$yakRanFirst, $yakRanSecond, $yakRanThird";
}

function getDateNow()
{
    $date = date("Y") . "-" . date("d") . "-" . date("m");
    return $date;
}

function limitText($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function articleSeparator($text)
{
    return explode(chr(0x0A), $text);
}
