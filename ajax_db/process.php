<?php

require 'db.php';


$query = " SELECT * FROM cars WHERE id = '$_POST[id]' ";
$query_car_info = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($query_car_info)) {

	echo "<input rel='".$row['id']."' type='text' class='form-control title-input' value='".$row['cars']."'>  ";
	echo "<input type='button' class='btn btn-success update' value='Update'> ";
	echo "<input type='button' class='btn btn-danger delete' value='Delete'> ";
	echo "<input type='button' class='btn btn-close' value='Close'> ";

}

if (isset($_POST['updatethis'])) {

	$query = " UPDATE cars SET cars = '$_POST[title]' WHERE id = '$_POST[id]' ";
	$result_set = mysqli_query($con, $query);

}

if (isset($_POST['deletethis'])) {

	$query = " DELETE FROM cars WHERE id = '$_POST[id]' ";
	$result_set = mysqli_query($con, $query);

}

?>

<script>

	$(document).ready(function () {

		var id;
		var title;
		var updatethis = "update";
		var deletethis = "delete";

		$(".title-input").on('input', function(){

			id = $(this).attr('rel');
			title = $(this).val();

		});

		$(".update").on('click', function() {

			$.post("process.php", {id: id, title: title, updatethis: updatethis}, function(data) {
					
				//alert(data);

			});

		});

		$(".delete").on('click', function() {

			id = $(".title-input").attr('rel');
			$.post("process.php", {id: id, deletethis: deletethis}, function(data) {
					
				//alert(data);

			});

		});

		$(".btn-close").on('click', function() {

			$("#action-container").hide();

		});

	});

</script>