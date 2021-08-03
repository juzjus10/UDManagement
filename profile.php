<?php
require_once('index.php');
require_once('includes/NewDB.php');
require_once('templates/header.php');

$mysqli = new mysqli($server,$user,$pass,$db);
//Employee No. from dashboard.php
    session_start();  

    if (empty($_SESSION["employeeNo"])){
        $employeeNo = 'EMP001';
    } else {
        $employeeNo = $_SESSION["employeeNo"];
    }
    
    include("includes/profile_process.php");
?>
<!DOCTYPE html>
<html>

<head>
<?php include("templates/header.php");?>
</head>

<body id="page-top">
    <div id="wrapper">
    <?php include("templates/sidebar.php");?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include("templates/navbar.php");?>
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
                                                <div class="col d-xl-flex align-items-center justify-content-xl-end"><button class="btn btn-info btn-circle ml-1" role="button" type="submit" name="UpEmp"><i class="fas fa-save fa-lg"></i></i></button></div>
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
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <div class="form-group"><label for="degree"><strong>Degree</strong></label><select class="form-control" value = "<?php echo $row['Degree_Code'] ?> "placeholder="<?php echo $row['Degree_Code'];?>" name="degree">
                                                                    <option value="Select:" selected disabled>Select:</option>                                                               
                                                                    <option value="UG" >Undergrad</option>
                                                                    <option value="BS">Bachelor of Science</option>
                                                                    <option value="BA">Bachelor of Arts</option>
                                                                    <option value="M">Masters</option>
                                                                    <option value="D">Doctorate</option>
                                                                    <option value="A">Associate</optio>
                                                                </select></div>
                                                              
                                                        </div>
                                                        <div class="col d-xl-flex justify-content-xl"><button class="btn btn-circle btn-primary btn-m" type="submit" name="UpDeg"><i class="fas fa-angle-right fa-lg"></i></button>
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="form-row" style="border-bottom-color: rgb(133, 135, 150);">
                                                    <div class="col-xl-6">
                                                        <div class="form-group"><label for="course"><strong>Course</strong></label><select class="form-control" name="course">
                                                            <?php
                                                                while ($rows = $resultdeg->fetch_assoc()):{?>
                                                                
                                                                    <option value="<?php echo $rows['Degree_Description'];?>"><?php echo $rows['Degree_Description'];?></option>
                                                                
                                                             <?php }endwhile?>
                                                             </select></div>
                                                        </div>
                                                        <div class="col-xl-6 offset-xl-0"><label for="schoolgraduated"><strong>School Graduated</strong><br></label><input class="form-control" type="text" id="first_name-1" value = "<?php echo $row['School_Graduated']; ?> "placeholder="<?php echo $row['School_Graduated'];?>" name="schoolgraduated"></div>
                                                   
                                                        <div class="col-xl-3">
                                                            <div class="form-group"><label for="yeargraduated"><strong>Year Graduated</strong></label><input class="form-control" type="number" min="1900" value = "<?php echo $row['Year_Graduated'];?>" placeholder="<?php echo $row['Year_Graduated'];?>" name="yeargraduated"></div>
                                                                    
                                                        </div>
                                                        <div class="col d-xl-flex align-items-center justify-content-xl-end"><button class="btn btn-success btn-circle ml-1" role="button" type="submit" name="UpEdu"><i class="fas fa-plus text-white"></i></button></div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                            <div class="card-body">
                                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                                    <table id="educ_attainment" class="table my-0" >
                                                        <thead>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <th>School Graduated</th>
                                                            <th>Year Graduated</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                    <?php
                                                    
                                                    while ($rows = $resulteduc->fetch_assoc()):?>
                                                
                                                        <tr>
                                                            
                                                            <td><?php echo $rows['Degree_Description'];?></td>
                                                            <td><?php echo $rows['Year_Graduated'];?></td>
                                                            <td><?php echo $rows['School_Graduated'];?></td>
                                                            <td><form action="" method="post">
                                                            <input type="hidden" name="yrDelete" value="<?php echo $rows['Year_Graduated'];?>">    
                                                            <button class="btn btn-circle btn-danger" name="educDelete" type="submit"  value="<?php echo $rows['Degree_Code'];?>"><i class="far fa-trash-alt"></i></button>
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
                                      
                                        <div class="col d-xl-flex align-items-center justify-content-xl-end"><button class="btn btn-success btn-circle ml-1" role="button" type="submit" name="UpSem"><i class="fas fa-plus text-white"></i></button></div>
                                        
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
                                        <div class="col d-xl-flex align-items-center justify-content-xl-end"><button class="btn btn-success btn-circle ml-1" role="button" type="submit" name="UpTra"><i class="fas fa-plus text-white"></i></button></div>
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
                                                    <option value=""disabled>Select:</option>
                                                    <option value="<?php echo $row['Position_Code'] ?> "" selected><?php echo $row['Pos_Description'] ?> </option>
                                                    <?php
                                                    $posSelect = $mysqli->query("SELECT * FROM position ORDER BY Pos_Description ASC;") or die(mysqli_error($mysqli));
                                                    
                                                    while ($rows = $posSelect->fetch_assoc()):{?>
                                                        <option value="<?php echo $rows['Position_Code'];?>"><?php echo $rows['Pos_Description'];?></option>
                                                    <?php }endwhile?>
                                                    </select></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-xl-flex align-items-center justify-content-xl-end"><button class="btn btn-success btn-circle ml-1" role="button" type="submit" name="UpEmh"><i class="fas fa-plus text-white"></i></button></div>
                                    </form>
                                    <div class="card-body">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <table id="employment_history" class="table my-0" >
                                                <thead>
                                                <tr>
                                                    <th>Item No.</th>
                                                    <th>Salary Grade</th>
                                                    <th>Step ID</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Place Assignment</th>
                                                    <th>Status Employment</th>
                                                    <th>Position</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                
                                                <tbody>
                                            <?php
                                            
                                            while ($rows = $resultemh->fetch_assoc()):?>
                                        
                                                <tr>
                                                    
                                                    <td><?php echo $rows['Item_No'];?></td>
                                                    <td><?php echo $rows['Salary_Grade'];?></td>
                                                    <td><?php echo $rows['Step_ID'];?></td>
                                                    <td><?php echo $rows['Start_Date'];?></td>
                                                    <td><?php echo $rows['End_Date'];?></td>
                                                    <td><?php echo $rows['Place_of_Assignment'];?></td>
                                                    <td><?php echo $rows['ES_Description'];?></td>
                                                    <td><?php echo $rows['Pos_Description'];?></td>
                                                    <td><form action="" method="post">
                                                    <input type="hidden" name="startDateDelete" value="<?php echo $rows['Start_Date'];?>">    
                                                    <input type="hidden" name="endDateDelete" value="<?php echo $rows['End_Date'];?>">    
                                                    <button class="btn btn-circle btn-danger" name="emhDelete" type="submit"  value="<?php echo $rows['Item_No'];?>"><i class="far fa-trash-alt"></i></button>
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