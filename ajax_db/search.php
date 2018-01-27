<?php

require 'db.php';

$search = $_POST['search'];


if (!empty($search)) {

	$query = " SELECT * FROM cars WHERE cars LIKE '$search%' ";
	$search_query = mysqli_query($con, $query);

	if (!$search_query) {
		die('ERROR: '.mysqli_error($con));
	} 

	while ($row = mysqli_fetch_array($search_query)) {

		$car_brand = $row['cars'];

		?>

		<ul>
			<li><?= $car_brand; ?></li>
		</ul>

		<?php 

	}

}

?>