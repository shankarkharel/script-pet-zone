<?php
//include("../Connector.php");
$return["error"] = false;
$return["msg"] = "";
if (1) {
    try {
        $base64_string = $_POST["mail"];

        $outputfile = "uploads/image.jpg";
        file_put_contents($outputfile, $base64_string);

        $return["respo"] = $base64_string;
        // fwrite($filehandler, base64_decode($base64_string));
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    // fclose($filehandler);
} else {
    $return["respo"] = true;
    $return["msg"] =  "No image is submited.";
}

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string