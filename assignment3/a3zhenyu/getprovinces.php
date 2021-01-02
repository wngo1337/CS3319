<?php
	include "connectdb.php";
	
	$query = "SELECT DISTINCT province FROM otheruniversities";
	$result=mysqli_query($connection,$query);
	
	while ($row = mysqli_fetch_assoc($result)) {
		$province = $row["province"];
		echo "<option value='". $province . "'>" . $province . '</option>';
	}
?>


