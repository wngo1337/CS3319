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
	<h1>Here is Your Course List!</h1>
	
	<table border ="4"> <!-- making a table to store rows in an organized way -->
	<tr>
	<th>Course Number</th>
	<th>Course Name</th>
	<th>Weight</th>
	<th>Suffix</th>
	</tr>


	<?php
		$sortingfield = $_POST["sortingfield"];
		$sortingorder = $_POST["sortingorder"];
		$query = 'SELECT * FROM westerncourses ORDER BY' . ' ' . $sortingfield . ' ' . $sortingorder;
		
		$result=mysqli_query($connection,$query);
		if (!$result) {
			die("We couldn't get your query for some reason! Make sure you chose something for both options!");
		}
		// get the resulting table and print all results
		$result = mysqli_query($connection, $query);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['coursenumber'] ."</td>";
			echo "<td>" . $row['coursename'] . "</td>";
			echo "<td>" . $row['weight'] . "</td>";
			echo "<td>" . $row['suffix'] . "</td>";
			echo "</tr>";
		}
	?>
	</table>
</div>
	
<div class="boxed">	
	<p>Would you like to edit a course attribute (excluding course number)?</p>
	<form action="editwesterncourses.php" method="post">
	
		<input type="radio" name="attributetype" value="coursename">Course Name<br>
		<input type="radio" name="attributetype" value="weight">Weight (limited to 1.0 or 0.5)<br>
		<input type="radio" name="attributetype" value="suffix">Suffix (limited to A, B, or A/B, or leave blank)<br>
		
		<p>Enter the course number of the course you would like to modify:</p> <input type="text" name="coursenumber"/>
		<p>Enter the new course attribute value:</p> <input type="text" name="newvalue"/>
		<input type="submit" name="submitattributechange"/>
    </form>
</div>

<div class="boxed">
	<p>Would you like to delete a Western course?</p>
	<form action="confirmdeletewesterncourses.php" method="post">
		
		<p>Enter the course number of the course you would like to delete:</p> 
		<input type="text" name="deletecoursenumber"/>
		<input type="submit" name="deleteattributesubmit"/>
    </form>
</div>

</body>
