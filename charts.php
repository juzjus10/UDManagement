<?php
    header('Content-Type: application/json');
    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "human_resources2.0";
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName); 
    
    $sql_count = "SELECT COUNT('Employee No.') AS num FROM vw_headcount";
	$result_count = mysqli_query($conn, $sql_count);
	$values_count = mysqli_fetch_assoc($result_count);
    $num_rows = $values_count['num'];

    $sql_sum = "SELECT SUM(PayRate) AS salary FROM payroll_vw";
    $result_sum = mysqli_query($conn, $sql_sum);
	$values_sum = mysqli_fetch_assoc($result_sum);
    $total_salary = $values_sum['salary'];
    
    mysqli_close($conn);
    print json_encode($values_count);
?>