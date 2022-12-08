<?php

// QUERY FUNCTIONS

$conn = mysqli_connect("localhost", "root", "", "online_news");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function signup($data, $adminParameter) {
    global $conn;
    $username = inputValidation($data["username"]);
    $name = inputValidation($data["name"]);
    $password = inputValidation($data["password"]);
    $admin = $adminParameter;

    $confirmPassword = inputValidation($data["confirmPassword"]);

    $query = "INSERT INTO writer VALUES ('', '$username', '$name', '$password', '$admin')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// GLOBAL FUNCTIONS

function inputValidation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function usernameValidation($username)
{
    if (preg_match('/^\w{5,}$/', $username)) {
        return true;
    }
    return false;
}

function rgbRandom()
{
    $yakRanFirst = rand(0, 255);
    $yakRanSecond = rand(0, 255);
    $yakRanThird = rand(0, 255);
    return "$yakRanFirst, $yakRanSecond, $yakRanThird";
}