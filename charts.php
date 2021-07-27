<?php
    header('Content-Type: application/json');
    require_once('NewDB.php');
    $conn = new mysqli($server,$user,$pass,$db);
    
    $query = "SELECT `Position`, COUNT(`Position`)  AS position_count  FROM `employee_info_vw`  GROUP BY `position`";
    $result= mysqli_query($conn, $query);
    $data = array();
    foreach ($result as $row) {
    $data[] = $row;
    }
    $query = "SELECT `Gender`, COUNT(`Gender`) AS gender_count FROM `employee_info_vw` GROUP BY `gender`";
    $result= mysqli_query($conn, $query);
    foreach ($result as $row) {
        $data[] = $row;
        }
    mysqli_close($conn);
    print json_encode($data);
?>