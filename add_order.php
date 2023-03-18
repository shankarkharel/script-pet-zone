<?php
include("Connector.php");

// App will be posting these values to this server

try {
    $userid = $_POST["userid"];
    $sql = "SELECT item_id FROM cart WHERE user_id = '$userid' ";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $db_data[] = $row;
        $itemId = $row['item_id'];

        $sql1 = "INSERT INTO orders_tbl(item_id,order_date_time,quantity,order_by) VALUES ('$itemId', NOW() ,'1','$userid')";
        $result2 = $conn->query($sql1);
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// Select all item IDs of the current user from the cart table
$conn->close();
