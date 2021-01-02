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
	<h1>You have added a course!</h1>
	
	<?php
		$newcoursenumber = $_POST["newcoursenumber"];
		$newcoursename = $_POST["newcoursename"];
		$newcourseweight = $_POST["newcourseweight"];
		$newcoursesuffix = $_POST["newcoursesuffix"];
		
		$query = "INSERT INTO westerncourses VALUES (" . "'" . $newcoursenumber . "','" . $newcoursename . "'," . 
		$newcourseweight . ",'" . $newcoursesuffix . "')";
		
		if (mysqli_query($connection, $query)) {
			echo "Added " . $newcoursenumber . " to the database!";
		}
		else {
			echo "You are trying to add a course that already exists! Please use another course name.";
		}
	?>
	
</div>
</body>
