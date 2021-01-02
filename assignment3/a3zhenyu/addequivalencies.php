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
	<h1>You Have Added an Equivalency!</h1>
	
	<?php
		$westerncoursenumber = $_POST["westerncoursenumber"];
		$outsidecoursearray = explode("-", $_POST["outsidecoursecode"]);
		$currentdate = date("Y-m-d");
		
		$query = "INSERT INTO equivalentto VALUES('" . $westerncoursenumber . "', '" . $outsidecoursearray[0] .
		"', " . $outsidecoursearray[1] . ", " . "'" . $currentdate . "')";
		
		
		if (mysqli_query($connection, $query)) {
			echo "Added your new equivalency to the database.";
		}
		else {
			$query = "UPDATE equivalentto SET decisiondate=" . "'" . $currentdate . 
			"' WHERE equivalentto.coursenumber=" . "'" . $westerncoursenumber . 
			"' AND equivalentto.coursecode=" . "'" . $outsidecoursearray[0] . 
			"' AND equivalentto.universitynumber=" . $outsidecoursearray[1];
			mysqli_query($connection, $query);
			echo "An equivalency already exists for those courses, so we only updated the decision date.";
		}
	?>
	
</div>
</body>
