<?php

require 'db.php';

if (isset($_POST['car_name'])) {

	$query = " INSERT INTO cars (cars) VALUES ('$_POST[car_name]') ";
	$query_add_car = mysqli_query($con, $query);

}

?>