<?php
require_once('NewDB.php');

$mysqli = new mysqli($server,$user,$pass,$db);
//Employee No. from dashboard.php
    session_start();  

    if (empty($_SESSION["employeeNo"])){
        $employeeNo = 'EMP001';
    } else {
        $employeeNo = $_SESSION["employeeNo"];
    }
    
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
    $degree = $_POST['degree'];
    $schoolgraduated = $_POST['schoolgraduated'];
    $yeargraduated = $_POST['yeargraduated']; 

    $mysqli->query("UPDATE educ_attainment SET Employee_No='$employeeNo', Degree_Code='$degree', School_Graduated='$schoolgraduated', 
    Year_Graduated='$yeargraduated' WHERE Employee_No='$employeeNo'") or 
        die($mysqli->error);
   
    $row = fetch_data ($mysqli, $employeeNo);
    
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

    $mysqli->query("UPDATE employment_history SET Employee_No='$employeeNo', Item_No='$itemNo', Salary_Grade='$salarygrade', 
    Step_ID='$stepid', Start_Date='$startdate', End_Date='$enddate', Place_of_Assignment='$placeassignment', Status_of_Employ_Code='$statusemployment'
    , Position_Code='$placeposition' WHERE Employee_No='$employeeNo'") or 
        die($mysqli->error);
    $_SESSION['message'] = "Employee has been employee table updated!";
    $_SESSION['msg_type'] = "Warning!";
    $row = fetch_data ($mysqli, $employeeNo);
 
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - UDManagement</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-image: linear-gradient( 180deg, rgba(96,221,142,1) 8.7%, rgba(24,138,141,1) 88.1% );">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span style="text-transform: none;">UDManagement</span></div>
                </a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="employee.php"><i class="fas fa-table"></i><span>Employees</span></a>
                    <a class="nav-link" href="payroll.php"><i class="fa fa-credit-card-alt"></i><span>Payroll</span></a>
                    <a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="logout_process.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="background-color: #F4D03F;background-image: linear-gradient(65deg, #F4D03F 0%, #16A085 100%);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars" style="color: rgb(255,255,255);"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(255,255,255) !important;"><?php echo $_SESSION['Name'] ?></span><img class="border rounded-circle img-profile" src="assets/img/dogs/image2.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout_process.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav> 
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <form action="upload.php" id= "uploadPicture" method="post" enctype="multipart/form-data">
                                    <label for="fileToUpload">
                                    <div class="profile-pic" style="background-image: url('<?php if ($row['Image']==0) { echo htmlspecialchars('assets/img/dogs/image2.jpeg') ; } else echo $row['Image'];?>')">
                                        <i class="fas fa-camera"></i>
                                        <span>Change Image</span>
                                    </div>
                                    </label>
                                    <input type="File" name="fileToUpload" id="fileToUpload">
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold"><strong>Personal Information</strong><br></p>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <section></section>
                                                <input type="hidden" name="employeeNo" value="<?php echo $row['Employee_No'];?>">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="employeeNo"><strong>Employee No</strong></label><input class="form-control" type="text" id="username" name="employeeNo" value = "<?php echo $row['Employee_No'] ?> "placeholder="<?php echo $row['Employee_No'];?>"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="firstname"><strong>First Name</strong></label><input class="form-control" type="text" id="email" value = "<?php echo $row['FirstName'] ?> "placeholder="<?php echo $row['FirstName'];?>" name="firstname"></div>
                                                    </div>
                                                    <div class="col"><label for="firstname"><strong>Middle Name</strong></label><input class="form-control" type="text" id="email-1" value = "<?php echo $row['MiddleName'] ?> "placeholder="<?php echo $row['MiddleName'];?>" name="middlename"></div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col"><label for="lastname"><strong>Last Name</strong></label><input class="form-control" type="text" value = "<?php echo $row['LastName'] ?> "placeholder="<?php echo $row['LastName'];?>"name="lastname"></div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" value = "<?php echo $row['Address'] ?> "placeholder="<?php echo $row['Address'];?>"  name="address"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-xl-5">
                                                        <div class="form-group"><label for="email"><strong>Email</strong></label><input class="form-control" type="text" id="email" value = "<?php echo $row['Email'] ?> "placeholder="<?php echo $row['Email'];?>" name="email"></div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="form-group"><label for="birthdate"><strong>Birthdate</strong></label><input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value = "<?php echo $row['Birthday'] ?> "placeholder="<?php echo $row['Birthday'];?>" name="birthdate"></div>
                                                    </div>
                                                    <div class="col-xl-3 offset-xl-0">
                                                        <div class="form-group"><label for="gender"><strong>Gender</strong></label><select class="form-control" value = "<?php echo $row['Gender'] ?> "placeholder="<?php echo $row['Gender'];?>" name="gender">
                                                                <option value="M" selected="">Male</option>
                                                                <option value="F">Female</option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit" name="UpEmp">Save</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold"><strong>Educational Attainment</strong><br></p>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <input type="hidden" name="employeeNo" value="<?php echo $row['Employee_No'];?>">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group"><label for="degree"><strong>Degree</strong></label><select class="form-control" value = "<?php echo $row['Degree_Code'] ?> "placeholder="<?php echo $row['Degree_Code'];?>" name="degree">
                                                                    <option value="<?php echo $row['Degree_Code'];?>"  selected><?php echo $row['Degree_Code'];?></option>                                                               
                                                                    <option value="MAED" >Master of Arts in Education</option>
                                                                    <option value="DCS">Doctor of Computer Science</option>
                                                                    <option value="MA-PHIL">Master of Arts in Philosopy</option>
                                                                    <option value="MSCS">Master of Science in Computer Science</option>
                                                                    <option value="PhD">Doctor of Philosopy</option>
                                                                    <option value="PhD Comm">Doctor of Philosopy in Communication</option>
                                                                    <option value="MM">Master of Management</option>
                                                                    <option value="DPA">Doctor of Public Administration</option>
                                                                    <option value="MIT">Master in Information Technology</option>
                                                                    <option value="BLIS">Bachelor of Library and Information Science</option>
                                                                    <option value="BSBA">Bachelor of Science in Business Administration</option>
                                                                    <option value="BSN">Bachelor of Science in Nursing</option>
                                                                    <option value="MSN">Masters of Science in Nursing</option>
                                                                    <option value="MD">Doctor of Medicine</option>
                                                                    <option value="BSOA">Bachelor of Science in Office Administration</option>
                                                                </select></div>
                                                        </div>
                                                        <div class="col-xl-6 offset-xl-0"><label for="schoolgraduated"><strong>School Graduated</strong><br></label><input class="form-control" type="text" id="first_name-1" value = "<?php echo $row['School_Graduated']; ?> "placeholder="<?php echo $row['School_Graduated'];?>" name="schoolgraduated"></div>
                                                    </div>
                                                    <div class="form-row" style="border-bottom-color: rgb(133, 135, 150);">
                                                        <div class="col-xl-3">
                                                            <div class="form-group"><label for="yeargraduated"><strong>Year Graduated</strong></label><input class="form-control" type="number" min="1900" value = "<?php echo $row['Year_Graduated'];?>" placeholder="<?php echo $row['Year_Graduated'];?>" name="yeargraduated"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit" name="UpEdu">Save&nbsp;</button></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold"><strong>Seminars</strong><br></p>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-6"><label for="seminarname">Seminar Name</label><input class="form-control" type="text" value = "<?php echo $row['Seminar_Name'] ?> "placeholder="<?php echo $row['Seminar_Name'];?>" name="seminarname"></div>
                                                <div class="col-xl-6"><label for="seminarhour">No. of Hours</label><input class="form-control" type="text" onfocus="(this.type='number')" onblur="(this.type='text')"value = "<?php echo $row['Sem_No_of_Hours'] ?> "placeholder="<?php echo $row['Sem_No_of_Hours'];?>" name="seminarhour"></div>
                                            </div>
                                            <div class="form-row" style="border-bottom-color: rgb(133, 135, 150);">
                                                <div class="col-xl-6"><label for="seminardate">Date Completed</label><input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value = "<?php echo $row['Sem_Date_Completed'] ?> "placeholder="<?php echo $row['Sem_Date_Completed'];?>" name="seminardate"></div>
                                                <div class="col-xl-6"><label for="seminardays">No. of Days</label><input class="form-control" type="text" onfocus="(this.type='number')" onblur="(this.type='text')" value = "<?php echo $row['Sem_No_of_Days'] ?> "placeholder="<?php echo $row['Sem_No_of_Days'];?>" name="seminardays"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit" name="UpSem">Add&nbsp;</button></div>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <table id="seminars" class="table my-0" >
                                                <thead>
                                                <tr>
                                                    <th>Current Seminars:</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                
                                                <tbody>
                                            <?php
                                            
                                            while ($rows = $resultsem->fetch_assoc()):?>
                                        
                                                <tr>
                                                    
                                                    <td><?php echo $rows['Seminar_Name'];?></td>
                                                    <td><form action="" method="post">
                                                    <button class="btn btn-circle btn-danger" name="semDelete" type="submit"  value="<?php echo $rows['Seminar_Name'];?>"><i class="far fa-trash-alt"></i></button>
                                                </form></td>
                                                </tr>
                                                </tbody>
                                            <?php endwhile ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold"><strong>Training</strong><br></p>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <section></section>
                                            <div class="form-row">
                                                <div class="col-lg-12 col-xl-6"><label for="trainingname">Training Name</label><input class="form-control" type="text" value = "<?php echo $row['Training_Name'] ?> "placeholder="<?php echo $row['Training_Name'];?>" name="trainingname"></div>
                                                <div class="col"><label for="traininghours">No. of Hours</label><input class="form-control" type="text" onfocus="(this.type='number')" onblur="(this.type='text')" value = "<?php echo $row['Tra_No_of_Hours'] ?> "placeholder="<?php echo $row['Tra_No_of_Hours'];?>"name="traininghours"></div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-6"><label for="trainingdate">Date Completed</label><input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value = "<?php echo $row['Tra_Date_Completed'] ?> "placeholder="<?php echo $row['Tra_Date_Completed'];?>" name="trainingdate"></div>
                                                   <div class="col-xl-6"><label for="trainingdays">No. of Days</label><input class="form-control" type="text" onfocus="(this.type='number')" onblur="(this.type='text')" value = "<?php echo $row['Tra_No_of_Days'] ?> "placeholder="<?php echo $row['Tra_No_of_Days'];?>" name="trainingdays"></div>  
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit" name="UpTra">Add&nbsp;</button></div>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <table id="seminars" class="table my-0" >
                                                <thead>
                                                <tr>
                                                    <th>Current Trainings:</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            <?php
                                            
                                            while ($rows = $resulttra->fetch_assoc()):?>
                                        
                                                <tr>
                                                    <td><?php echo $rows['Training_Name'];?></td>
                                                    <td><form action="" method="post">
                                                    <button class="btn btn-circle  btn-danger" name="traDelete" type="submit"  value="<?php echo $rows['Training_Name'];?>"><i class="far fa-trash-alt"></i></button>
                                                    </form></td>
                                                </tr>
                                                </tbody>
                                            <?php endwhile ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class = "col">
                            <div class = "card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold"><strong>Employment Information</strong><br></p>
                                </div>
                                <div class="card-body">
                                <form action="" method="POST">
                                        <input type="hidden" name="employeeNo" value="<?php echo $row['Employee_No'];?>">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-4"><label for="itemNo"><strong>Item No</strong></label><input class="form-control" type="text" value = "<?php echo $row['Item_No'] ?> "placeholder="<?php echo $row['Item_No'];?>" name="itemNo" ></div>
                                                <div class="col-xl-4"><label for="salarygrade"><strong>Salary Grade</strong></label><input class="form-control" type="text" value = "<?php echo $row['Salary_Grade'] ?> "placeholder="<?php echo $row['Salary_Grade'];?>" name="salarygrade" ></div>
                                                <div class="col-xl-4"><label for="stepID"><strong>Step ID</strong></label><input class="form-control" type="text" value = "<?php echo $row['Step_ID'] ?> "placeholder="<?php echo $row['Step_ID'];?>" name="stepID"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-6"><label for="startdate"><strong>Start Date</strong></label><input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value = "<?php echo $row['Start_Date'] ?> "placeholder="<?php echo $row['Start_Date'];?>" name="startdate"></div>
                                                <div class="col-xl-6"><label for="enddate"><strong>End Date</strong></label><input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value = "<?php echo $row['End_Date'] ?> "placeholder="<?php echo $row['End_Date'];?>" name="enddate"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">    
                                                <div class="col-xl-4"> <label for="placeassignment"><strong>Place of Assignment</strong></label><input class="form-control" type="text" value = "<?php echo $row['Place_of_Assignment'] ?> "placeholder="<?php echo $row['Place_of_Assignment'];?>" name="placeassignment" ></div>

                                                <div class="col-xl-4 offset-xl-0"><label for="gender"><strong>Status of Employment</strong></label><select class="form-control" value = "<?php echo $row['Status_of_Employ_Code'] ?> "placeholder="<?php echo $row['Status_of_Employ_Code'];?>" name="statusemployment">
                                                        <option value="<?php echo $row['Status_of_Employ_Code'];?>" selected><?php echo $row['ES_Description'];?></option>
                                                        <option value=""disabled>Select:</option>
                                                        <option value="RegEmp">Regular Employment</option>
                                                        <option value="ExtemEmp">Extended Temporary Employment</option>
                                                        <option value="PtimeEmp">Part Time Employment</option>
                                                        <option value="TempEmp">Temporary Employment</option>
                                                        <option value="OnCallEmp">On-Call Employment</option>
                                                </select></div>
                                                <div class="col-xl-4 offset-xl-0">
                                                    <div class="form-group"><label for="gender"><strong>Position</strong></label><select class="form-control" value = "<?php echo $row['Position_Code'] ?> "placeholder="<?php echo $row['Pos_Description'];?>" name="placeposition">
                                                        <option value="<?php echo $row['Position_Code'];?>"selected><?php echo $row['Pos_Description'];?></option>
                                                        <option value=""disabled>Select:</option>
                                                        <option value="AP">Administrative Position</option>
                                                        <option value="FP">Faculty Position</option>
                                                        <option value="EP">Executive Position</option>
                                                    </select></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" name="UpEmh" type="submit">Save&nbsp;</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © UDManagement 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        document.getElementById("fileToUpload").onchange = function() {
            document.getElementById("uploadPicture").submit();
        };
    </script>

</body>

</html>