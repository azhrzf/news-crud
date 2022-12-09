<?php
session_start();

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
                    $_SESSION["username"] = $verify['username'];
                }
                $isAdmin = mysqli_query($conn, "SELECT username FROM writer WHERE username = '$username'");
                $_SESSION["isAdmin"] = $isAdmin === 1 ? true : false;
                $getUserID = mysqli_query($conn, "SELECT userID FROM writer WHERE username = '$username'");
                $_SESSION["userID"] = $getUserID;
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

function addNews($data, $id)
{
    global $conn;

    $title = inputValidation($data["title"]);
    $date = inputValidation($data["date"]);
    $userID = inputValidation($id);
    $article = inputValidation($data["article"]);

    $query = "INSERT INTO writer VALUES ('', '$title', '$date', '$userID', '$article')";

    mysqli_query($conn, $query);

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
