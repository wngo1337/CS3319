<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="index2.css">
<meta charset="utf-8">
<title>Your Western Course List!</title>
</head>
<body>
<div class="boxed">
	<h1>Here is Your Related Course Information!</h1>

<div class="boxed">
	<table border ="4"> <!-- making a table to store rows in an organized way -->
		<tr>
		<th>University Number</th>
		<th>Outside Course Name</th>
		<th>Outside Course Number</th>
		<th>Outside Course Weight</th>
		<th>Equivalency Date</th>
		</tr>
</div>

	<?php
	include "connectdb.php";
	$coursenumber = $_POST["coursenumber"];
	
	$westerncoursequery = "SELECT * FROM westerncourses WHERE coursenumber=" . "'" . $coursenumber . "'";
	$result = mysqli_query($connection, $westerncoursequery);
	$westerncourserow = mysqli_fetch_assoc($result);
	$westerncoursename = $westerncourserow["coursename"];
	$westerncoursenumber = $westerncourserow["coursenumber"];
	$westerncourseweight = $westerncourserow["weight"];
	
	echo "Western Course Name: " . $westerncoursename;
	echo "<br>";
	echo "Western Course Number: " . $westerncoursenumber;
	echo "<br>";
	echo "Western Course Weight: " . $westerncourseweight;
	echo "<br>";
	
	$query = "SELECT officialname, outsidecourses.coursecode, coursename, weight, decisiondate FROM outsidecourses 
	INNER JOIN equivalentto ON equivalentto.coursenumber =" . "'" . $coursenumber . "' " .
	"AND equivalentto.coursecode=outsidecourses.coursecode AND equivalentto.universitynumber=outsidecourses.universitynumber
	INNER JOIN otheruniversities ON outsidecourses.universitynumber=otheruniversities.universitynumber";
	
	$result2 = mysqli_query($connection, $query);
	
	
	while ($row = mysqli_fetch_assoc($result2)) {
		echo "<tr>";
		echo "<td>" . $row["officialname"] ."</td>";
		echo "<td>" . $row["coursecode"] ."</td>";
		echo "<td>" . $row["coursename"] ."</td>";
		echo "<td>" . $row["weight"] ."</td>";
		echo "<td>" . $row["decisiondate"] ."</td>";
		echo "</tr>";
	}
	?>
	</table>
	
</div>
</body>
