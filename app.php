
<?php
include("Connector.php");

// If connection is OK...

// If the app sends an action to create the table...
if ("CREATE_TABLE" == $action) {

    $sql = "CREATE TABLE IF NOT EXISTS $table ( 
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(55) NOT NULL,
            last_name VARCHAR(55) NOT NULL,
            email VARCHAR(55) NOT NULL,
            password VARCHAR(55) NOT NULL,
            role VARCHAR(55) NOT NULL
            )";

    if ($conn->query($sql) === TRUE) {
        // send back success message
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();

    return;
}

// Get all employee records from the database
if ("GET_ALL" == $action) {
    echo ("Get All");
    $db_data = array();
    $sql = "SELECT id, first_name, last_name from $table ORDER BY id DESC";
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
    return;
}
if ("CHECK_IF_LOGGED_IN" == $action) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $db_data = array();
    $sql = "SELECT * from $table WHERE email='$email' and password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo ("true");
    } else {
        echo ("false");
    }
    $conn->close();
    return;
}
if ("GET_DOCTORS" == $action) {
    // Get all records from the database

    $sql = "SELECT * from users WHERE role='doctor' ";
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
}

if ("GET_CURRENT" == $action) {
    // Get all records from the database
    $email = $_POST('email');
    $sql = "SELECT * from users WHERE email= 'shankar1@gmail.com'";
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
}

// Add an Employee
if ("ADD_EMP" == $action) {
    echo ("Add Emp");
    // App will be posting these values to this server
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $role = $_POST["role"];


    $sql = "INSERT INTO $table (first_name, last_name, email,password,role) VALUES ('$first_name', '$last_name', '$email', '$password', '$role')";
    $result = $conn->query($sql);
    echo "success";
    $conn->close();
    return;
}

// Remember - this is the server file.
// I am updating the server file.
// Update an Employee
if ("UPDATE_EMP" == $action) {
    // App will be posting these values to this server
    $app_id = $_POST['appointmentid'];
    $status = $_POST["status"];
    $sql = "UPDATE appointments SET status = '$status' WHERE appointmentid = '$app_id'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}


// Delete an Employee
if ('getpatientbyid' == $action) {
    // $patientid = $_POST("patientid");
    $patientid = $_POST["patientid"];



    $sql = "SELECT * from users WHERE id='$patientid' ";
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
}


if ('deleteitemtbyid' == $action) {
    // $patientid = $_POST("patientid");
    $patientid = $_POST["emp_id"];
    $currentuser = $_POST["userid"];



    $sql = "DELETE FROM cart WHERE item_id='$patientid' AND user_id='$currentuser'";
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
}

if ('deleteorderbyid' == $action) {
    // $patientid = $_POST("patientid");
    $patientid = $_POST["emp_id"];




    $sql = "DELETE FROM orders WHERE item_id='$patientid'";
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
}
