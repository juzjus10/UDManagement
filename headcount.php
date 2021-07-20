<?php
	$query = "SELECT * FROM `vw_headcount`";
    $search_result = filterTable($query);

	function filterTable($query){
	    $dbServerName = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "human_resources2.0";

		$connect = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName); 

	    $filter_Result = mysqli_query($connect, $query);
	    return $filter_Result;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Headcount</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/headcount_style.css"/>
</head>
<body>
	<?php 
		$dbServerName = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "human_resources2.0";

		$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName); 
		$sql = "SELECT COUNT('Employee No.') AS num FROM vw_headcount";
		$result = mysqli_query($conn, $sql);
		$values = mysqli_fetch_assoc($result);
		$num_rows = $values['num'];
	?>
	<div class="logo"></div>
	<h1>Universidad De Manila</h1>
	<p>(formerly City College of Manila)</p>
	<p>A.J. Villegas cor. C.M. Palma St., Mehan Gardens, Ermita, Manila</p>
	<br>
	<br>
	<?php echo "<h2>Date: " .date("F d, Y"). "</h2>";?>
	<?php echo "<h2>Number of Employees: " .$num_rows. "</h2>";?>
	<table>
		<tr>
			<th>Employee No.</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Gender</th>
			<th>Position</th>
			<th>Employment Status</th>
			<th>Salary Grade</th>
		</tr>
		<?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
	            <td><?php echo $row['Employee No.'];?></td>
	            <td><?php echo $row['Last Name'];?></td>
	            <td><?php echo $row['First Name'];?></td>
	            <td><?php echo $row['Middle Name'];?></td>
	            <td><?php echo $row['Gender'];?></td>
	            <td><?php echo $row['Position'];?></td>
	            <td><?php echo $row['Employment Status'];?></td>
	            <td><?php echo $row['Salary Grade'];?></td>
	        </tr>
        <?php endwhile;?>
	</table>

</body>
</html>