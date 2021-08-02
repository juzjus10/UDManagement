<?php
$resulteduc = $mysqli->query("SELECT * FROM educ_attainment 
INNER JOIN `degree` ON `degree`.`degree_code` = `educ_attainment`.`degree_code` 
where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));
$resultdeg = $mysqli->query("SELECT * FROM degree where Degree_Code ") or die(mysqli_error($mysqli));
$resultemh = $mysqli->query("SELECT * FROM employment_history 
INNER JOIN `employ_status` ON `employ_status`.`Status_of_Employ_Code` = `employment_history`.`Status_of_Employ_Code`
INNER JOIN `position` ON `position`.`Position_Code` = `employment_history`.`Position_Code`  
where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));
$resultsem = $mysqli->query("SELECT * FROM seminars where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));
$resulttra = $mysqli->query("SELECT * FROM training where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));
$image = $mysqli->query("SELECT image FROM employee where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));
$image = mysqli_fetch_array($image);


function fetch_data($mysqli, $employeeNo) {
$sql = "SELECT * FROM `employee` 
INNER JOIN `educ_attainment` ON `educ_attainment`.`Employee_No` = `employee`.`Employee_No` 
INNER JOIN `seminars` ON `seminars`.`Employee_No` = `employee`.`Employee_No`
INNER JOIN `training` ON `training`.`Employee_No` = `employee`.`Employee_No`
INNER JOIN `employment_history` ON `employment_history`.`Employee_No` = `employee`.`Employee_No`
INNER JOIN `position` ON `position`.`position_code` = `employment_history`.`position_code`
INNER JOIN `employ_status` ON `employ_status`.`Status_of_Employ_Code` = `employment_history`.`Status_of_Employ_Code` 
WHERE `employee`.`Employee_No` =  '$employeeNo'";
$result =  $mysqli->query($sql) or die(mysqli_error($mysqli));
return  mysqli_fetch_array($result);

}

$row = fetch_data ($mysqli, $employeeNo);
//Update Employee
if (isset($_POST['UpEmp'])){
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$address = $_POST['address'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];

$mysqli->query("UPDATE employee SET Employee_No='$employeeNo', LastName='$lastname', FirstName='$firstname', MiddleName='$middlename', 
Address='$address', Email='$email', Birthday='$birthdate', Gender='$gender' WHERE Employee_No='$employeeNo'") or 
die($mysqli->error);
$_SESSION['message'] = "Employee has been employee table updated!";
$_SESSION['msg_type'] = "Warning!";
$row = fetch_data ($mysqli, $employeeNo);

}

//Update Education Attainment
if (isset($_POST['UpEdu'])){
$course = $_POST['course'];
$schoolgraduated = $_POST['schoolgraduated'];
$yeargraduated = $_POST['yeargraduated']; 

$getDegree = $mysqli->query("SELECT Degree_Code from degree where Degree_Description = '$course';");
while ($rows = $getDegree->fetch_assoc()):{
$degree = $rows['Degree_Code'];
}
endwhile;
$mysqli->query("INSERT INTO educ_attainment(Employee_No,Degree_Code, Year_Graduated, School_Graduated) 
VALUES ('$employeeNo','$degree','$yeargraduated', '$schoolgraduated')") or 
die($mysqli->error);

$row = fetch_data ($mysqli, $employeeNo);
$resulteduc = $mysqli->query("SELECT * FROM educ_attainment 
INNER JOIN `degree` ON `degree`.`degree_code` = `educ_attainment`.`degree_code` 
where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));

}

if (isset($_POST['UpDeg'])){
$degree = $_POST['degree'];
$resultdeg = $mysqli->query("SELECT * FROM degree where Degree_Code LIKE '$degree%'") or die(mysqli_error($mysqli));

$row = fetch_data ($mysqli, $employeeNo);
$resulteduc = $mysqli->query("SELECT * FROM educ_attainment 
INNER JOIN `degree` ON `degree`.`degree_code` = `educ_attainment`.`degree_code` 
where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));

}

//Update Seminars
if (isset($_POST['UpSem'])){
$seminarname = $_POST['seminarname'];
$seminardate = $_POST['seminardate'];
$seminarhour = $_POST['seminarhour']; 
$seminardays = $_POST['seminardays']; 

$mysqli->query("INSERT INTO seminars(Employee_No,Seminar_Name, Sem_Date_Completed, Sem_No_of_Hours, Sem_No_of_Days) 
VALUES ('$employeeNo','$seminarname','$seminardate', '$seminarhour' , '$seminardays')") or 
die($mysqli->error);
$row = fetch_data ($mysqli, $employeeNo);
$resultsem = $mysqli->query("SELECT * FROM seminars where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));


}
//Update Training
if (isset($_POST['UpTra'])){
$trainingname = $_POST['trainingname'];
$trainingdate = $_POST['trainingdate'];
$trainingdays = $_POST['trainingdays']; 
$traininghours = $_POST['traininghours']; 

$mysqli->query("INSERT INTO training(Employee_No,Training_Name, Tra_Date_Completed, Tra_No_of_Hours, Tra_No_of_Days) 
VALUES ('$employeeNo','$trainingname', '$trainingdate', '$traininghours', '$trainingdays');") or 
die($mysqli->error);

$row = fetch_data ($mysqli, $employeeNo);
$resulttra = $mysqli->query("SELECT * FROM training where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));

}

//Update EMPLOYMENT HISTORY

if (isset($_POST['UpEmh'])){
$itemNo = $_POST['itemNo'];
$salarygrade = $_POST['salarygrade'];
$stepid = $_POST['stepID'];
$startdate = $_POST['startdate']; 
$enddate = $_POST['enddate'];
$placeassignment = $_POST['placeassignment'];
$statusemployment = $_POST['statusemployment']; 
$placeposition = $_POST['placeposition']; 

$mysqli->query("INSERT INTO employment_history(Employee_No,Item_No, Salary_Grade, Step_ID, Start_Date, End_Date, Place_of_Assignment, Status_of_Employ_Code, Position_Code) 
VALUES ('$employeeNo','$itemNo', '$salarygrade', '$stepid', '$startdate', '$enddate', '$placeassignment', '$statusemployment', '$placeposition');") or 
die($mysqli->error);
/*    
$mysqli->query("UPDATE employment_history SET Employee_No='$employeeNo', Item_No='$itemNo', Salary_Grade='$salarygrade', 
Step_ID='$stepid', Start_Date='$startdate', End_Date='$enddate', Place_of_Assignment='$placeassignment', Status_of_Employ_Code='$statusemployment'
, Position_Code='$placeposition' WHERE Employee_No='$employeeNo'") or 
die($mysqli->error);*/
$_SESSION['message'] = "Employee has been employee table updated!";
$_SESSION['msg_type'] = "Warning!";
$row = fetch_data ($mysqli, $employeeNo);
$resultemh = $mysqli->query("SELECT * FROM employment_history 
INNER JOIN `employ_status` ON `employ_status`.`Status_of_Employ_Code` = `employment_history`.`Status_of_Employ_Code`
INNER JOIN `position` ON `position`.`Position_Code` = `employment_history`.`Position_Code`  
where Employee_No = '$employeeNo';") or die(mysqli_error($mysqli));

}

if(isset($_POST['educDelete'])){

$educDelete =  $_POST['educDelete'];
$yrDelete =  $_POST['yrDelete'];
$query = "DELETE FROM educ_attainment WHERE (degree_code = '$educDelete' and Year_Graduated = '$yrDelete') and Employee_No ='$employeeNo'";
//echo $query;
$mysqli->query($query)or die(mysqli_error($mysqli));
header("Location: profile.php");
}

if(isset($_POST['emhDelete'])){
$itemNoDel = $_POST['emgDelete'];
$startdateDel =  $_POST['startDateDelete'];
$enddateDel =  $_POST['endDateDelete'];
$query = "DELETE FROM employment_history WHERE (start_date = '$startdateDel' and end_date = '$enddateDel') and Employee_No ='$employeeNo'";
//echo $query;
$mysqli->query($query)or die(mysqli_error($mysqli));
header("Location: profile.php");
}

if(isset($_POST['semDelete'])){

$semDelete =  $_POST['semDelete'];

$query = "DELETE FROM Seminars WHERE Seminar_Name = '$semDelete' and Employee_No ='$employeeNo'";
//echo $query;
$mysqli->query($query)or die(mysqli_error($mysqli));
header("Location: profile.php");
}

if(isset($_POST['traDelete'])){

$traDelete =  $_POST['traDelete'];

$query = "DELETE FROM Training WHERE Training_Name = '$traDelete' and Employee_No ='$employeeNo'";
//echo $query;
$mysqli->query($query)or die(mysqli_error($mysqli));
header("Location: profile.php");
}
?>