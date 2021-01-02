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
	<h1>You Have Deleted a Course!</h1>
	
	<?php
		$deletecoursenumber = $_POST["nextdeletecoursenumber"];	
		$query = "DELETE FROM westerncourses WHERE coursenumber=" . "'" . $deletecoursenumber . "'";
		
		if (mysqli_query($connection, $query)) {
			echo "Successfully deleted " . $deletecoursenumber . " from the database.";
		}
		else {
			echo "Failed to delete your course!";	// this should never happen
		}
	?>
</div>
</body>
