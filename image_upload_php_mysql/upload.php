<?php
$db = mysqli_connect('localhost', 'root', '', 'petzone');
if (!$db) {
	echo "Database connection faild";
}

$image = $_FILES['image']['name'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$description = $_POST['description'];

$imagePath = 'uploads/' . $image;
$tmp_name = $_FILES['image']['tmp_name'];

$istrue = move_uploaded_file($tmp_name, $imagePath);

$db->query("INSERT INTO product(item_brand,item_name,item_price,item_image,	item_register,item_description)VALUES('" . $brand . "','$name','$price','" . $image . "',NOW(),'$description')");
