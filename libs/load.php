<?php

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/_templates/$name.php"; //not consistant.
}

function validate_credentials($username, $password)
{
    if ($username == "sibi@selfmade.ninja" and $password == "password") {
        return true;
    } else {
        return false;
    }
}

function signup($user, $pass, $email, $phone)
{
    $servername = "mysql.selfmade.ninja";
    $username = "Kishore2071";
    $password = "qH@kwc8HdTKe5QK";
    $dbname = "Kishore2071_newdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `active`)
    VALUES ('$user', '$pass', '$email', '$phone', '1');";
    $error = false;
    if ($conn->query($sql) === true) {
        $error = false;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $error = $conn->error;
    }

    $conn->close();
    return $error;
}
