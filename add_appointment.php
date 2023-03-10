<?php
include("Connector.php");

echo ("Add appointment");
// App will be posting these values to this server
$doctorid = $_POST["doctorId"];
$patientid = $_POST["patientId"];
$appointmentDate = $_POST["appointmentDate"];
$appointmentTime = $_POST["appointmentTime"];
$description = $_POST["description"];
$appointmentStatus = $_POST["appointmentStatus"];
$sql = "INSERT INTO appointments(doctorid, patientid, date, time, description, status) VALUES ('$doctorid', '$patientid', '$appointmentDate', '$appointmentTime', '$description','$appointmentStatus')";

$result = $conn->query($sql);
if ($result) {
    echo ("Sucess");
} else {
    echo "error";
}
$conn->close();
