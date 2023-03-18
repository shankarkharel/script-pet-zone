<?php
include("Connector.php");

$patientid = $_POST["emp_id"];
$currentuser = $_POST["userid"];



$sql = "DELETE FROM cart WHERE user_id='$currentuser'";
$db_data = array();

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $db_data[] = $row;
    }
    // Send back the complete records as a json
    echo json_encode($db_data);
} else {
    echo "error";
}
$conn->close();
