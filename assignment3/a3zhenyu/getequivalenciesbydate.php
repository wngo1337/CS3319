<html>
<head> 
<link rel="stylesheet" type="text/css" href="index2.css">
<meta charset="utf-8">
<title>Your Western Course List!</title>
</head>
<body>
<div class="boxed">
	<h1>Here Are Your Course Equivalencies!</h1>

<div class="boxed">
	<table border ="7"> <!-- making a table to store rows in an organized way -->
		<tr>
		<th>Western Course Name</th>
		<th>Western Course Number</th>
		<th>Western Course Weight</th>
		<th>Outside University Number</th>
		<th>Outside Course Name</th>
		<th>Outside Course Number</th>
		<th>Outside Course Weight</th>
		<th>Equivalency Date</th>
		</tr>
</div>

	<div class="boxed"

	<?php
	include "connectdb.php";
	$equivalencydate= $_POST["equivalencydate"];
	
	$query = "SELECT w.coursename as wcoursename, w.coursenumber, w.weight as wweight, o.universitynumber, 
	o.coursename as ocoursename, o.coursecode, o.weight as oweight, e.decisiondate FROM equivalentto e 
	INNER JOIN westerncourses w ON e.coursenumber=w.coursenumber 
	INNER JOIN outsidecourses o ON e.universitynumber=o.universitynumber AND e.coursecode=o.coursecode WHERE 
	decisiondate<" . "'" . $equivalencydate . "'";
	
	$result = mysqli_query($connection, $query);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["wcoursename"] ."</td>";
		echo "<td>" . $row["coursenumber"] ."</td>";
		echo "<td>" . $row["wweight"] ."</td>";
		echo "<td>" . $row["universitynumber"] ."</td>";
		echo "<td>" . $row["ocoursename"] ."</td>";
		echo "<td>" . $row["coursecode"] ."</td>";
		echo "<td>" . $row["oweight"] ."</td>";
		echo "<td>" . $row["decisiondate"] ."</td>";
		echo "</tr>";
	}
	?>
	</table>
	
</div>
</body>
