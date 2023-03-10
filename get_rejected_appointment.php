<?php
include("Connector.php");
// Get all records from the database
$email = $_POST["email"];
//$patientid = "7";

$sql = "SELECT * from appointments WHERE doctorid='$email' and status='rejected' ";
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
