<?php

$db = mysqli_connect('localhost', 'root', '', 'petzone');
if (!$db) {
	echo "Database connection faild";
}

$person = $db->query("SELECT * FROM product");
$list = array();

while ($rowdata = $person->fetch_assoc()) {
	$list[] = $rowdata;
}

echo json_encode($list);
