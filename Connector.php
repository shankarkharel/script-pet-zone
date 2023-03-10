<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petzone";
$table = "users";
// lets create a table named Employees.
// we will get actions from the app to do operations in the database...

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
$action = isset($_POST["action"]) ? $_POST["action"] : ""; // lets get the action

// Check Connection
if ($conn->connect_errno) {
    die("Connection Failed: " . $conn->connect_error);
    echo 'action: ' . $action;
    return;
} else {
    //echo ("Sucess");
}
