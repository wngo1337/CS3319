<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="index2.css">
<meta charset="utf-8">
<title>Your Western Course List!</title>
</head>
<body>
<div class="boxed">
	<h1>Here is Your University List!</h1>

<div class="boxed">
	<table border ="2"> <!-- making a table to store rows in an organized way -->
		<tr>
		<th>University Name</th>
		<th>Nickname</th>
		</tr>
</div>

	<?php
	include "connectdb.php";
	$province = $_POST["province"];
	
	$query = "SELECT officialname, nickname FROM otheruniversities WHERE province=" . "'" . $province . "'";
	$result = mysqli_query($connection, $query);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["officialname"] ."</td>";
		echo "<td>" . $row["nickname"] ."</td>";
		echo "</tr>";
	}
	?>
	</table>
	
</div>
</body>
