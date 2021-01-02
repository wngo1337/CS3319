<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="index2.css">
<meta charset="utf-8">
<title>Your Western Course List!</title>
</head>
<body>
<div class="boxed">
	<h1>Here is Your Course List!</h1>

<div class="boxed">
	<table border ="4"> <!-- making a table to store rows in an organized way -->
		<tr>
		<th>Course Code</th>
		<th>Course Name</th>
		<th>Intended Year</th>
		<th>Weight</th>
		<th>University Number</th>
		</tr>
</div>

	<?php
	include "connectdb.php";
	$universitynumber = $_POST["universitynumber"];
	
	$universityquery = "SELECT * FROM otheruniversities WHERE universitynumber=" . $universitynumber;
	$universityresult = mysqli_query($connection, $universityquery);
	$universityinformation = mysqli_fetch_assoc($universityresult);
	
	echo "University number: " . $universityinformation["universitynumber"];
	echo "<br>";
	echo "Official name: " . $universityinformation["officialname"];
	echo "<br>";
	echo "City: " . $universityinformation["city"];
	echo "<br>";
	echo "Province: " . $universityinformation["province"];
	echo "<br>";
	echo "Nickname: " . $universityinformation["nickname"];
	echo "<br>";
	
	$query = "SELECT * FROM outsidecourses WHERE universitynumber=" . "'" . $universitynumber . "'";
	$result=mysqli_query($connection,$query);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["coursecode"] ."</td>";
		echo "<td>" . $row["coursename"] ."</td>";
		echo "<td>" . $row["courseintendedyear"] ."</td>";
		echo "<td>" . $row["weight"] ."</td>";
		echo "<td>" . $row["universitynumber"] ."</td>";
		echo "</tr>";
	}
	?>
	</table>
	
</div>
</body>
