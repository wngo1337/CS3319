<?php
	include "connectdb.php";
	
	$query = "SELECT coursenumber FROM westerncourses";
	$result = mysqli_query($connection,$query);
	
	while ($row = mysqli_fetch_assoc($result)) {
		$coursenumber = $row["coursenumber"];
		echo "<option value='". $coursenumber . "'>" . $coursenumber . '</option>';
	}
?>


