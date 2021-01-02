<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="index2.css">
<meta charset="utf-8">
<title>Your Western Course List!</title>
</head>
<body>
<div class="boxed">
	<?php	
		include "connectdb.php";
	?>
	<h1>You Have Edited a Course!</h1>
	
	<?php
		$attributetype = $_POST["attributetype"];
		$coursenumber = $_POST["coursenumber"];
		$newvalue = $_POST["newvalue"];
		
		// echo $attribute . $coursename . $oldvalue . $newvalue;
		$query = "UPDATE westerncourses SET " . $attributetype . "=" . "'" . $newvalue . "'" .
		" WHERE coursenumber=" . "'" . $coursenumber . "'";

		if (mysqli_query($connection, $query)) {
			echo "Updated " . $coursenumber . "'s " . $attributetype . " attribute to " . $newvalue;
		}
		else {
			echo "Error updating your record! Please double check your input.";
		}
	?>
</div>
</body>
