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
	<h1>Are You Sure You Want to Delete A Course?</h1>
	
	<?php
		$deletecoursenumber = $_POST["deletecoursenumber"];
		echo "Are you sure you want to delete " . $deletecoursenumber . "?";
		
		$query = "SELECT coursenumber, coursecode FROM equivalentto WHERE equivalentto.coursenumber=" . 
		"'" . $deletecoursenumber . "'";
		
		$result = mysqli_query($connection, $query);
		
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<li>";
			echo "Warning: equivalent to " . $row["coursecode"] . "\n";
		}
	?>
	
	<form action="deletewesterncourses.php" method="post">
	<input type="hidden" name="nextdeletecoursenumber" value="<?php echo $deletecoursenumber;?>">
	<input type="submit" name="deleteattributeconfirm" value="Confirm Delete"/>
	</form>

</div>
</body>
