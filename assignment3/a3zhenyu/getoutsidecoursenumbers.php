<?php
	include "connectdb.php";
	
	$query = "SELECT coursecode, universitynumber FROM outsidecourses";
	$result = mysqli_query($connection,$query);
	
	while ($row = mysqli_fetch_assoc($result)) {
		$outsidecoursecode = $row["coursecode"];
		$outsideuniversitynumber = $row["universitynumber"];
		echo "<option value='". $outsidecoursecode . "-" . $outsideuniversitynumber . "'>" . 
		$outsidecoursecode . '</option>';
	}
?>


