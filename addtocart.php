<?php
include("Connector.php");

echo ("Add to cart");
// App will be posting these values to this server
$doctorid = $_POST["userid"];
$patientid = $_POST["itemid"];



$sql = "INSERT INTO cart(user_id, item_id) VALUES ('$doctorid', '$patientid')";

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
