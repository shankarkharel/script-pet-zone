<?php
include("Connector.php");

//$id = isset($_POST("id")) ? $_POST("id") : ""; // lets get the action
// Check Connection
$email = $_POST["id"];

if ($conn->connect_errno) {
    die("Connection Failed: " . $conn->connect_error);
    echo 'action: ' . $action;
    return;
} else {
    $sql = "SELECT * from users WHERE id='$email'";


    $db_data = array();

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $db_data[] = $row;
        }
        // Send back the complete records as a json
        echo json_encode($db_data);
    } else {
        // echo "error";
    }
    $conn->close();
}
