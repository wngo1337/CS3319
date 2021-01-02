<?php
	include "connectdb.php";
	
	$query = "SELECT * FROM otheruniversities ORDER BY province";
	$result=mysqli_query($connection,$query);
	echo var_dump($result);
	
	while ($row = mysqli_fetch_assoc($result)) {
		$universitynumber = $row["universitynumber"];
		$officialname = $row["officialname"];
		echo "<option value='". $universitynumber . "'>" . $officialname . '</option>';
	}
?>


