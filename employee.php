<?php
require_once('index.php');
require_once('includes/NewDB.php');
require_once('templates/header.php');

session_start();
    if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
$mysqli = new mysqli($server,$user,$pass,$db);
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


$result = $mysqli->query("SELECT * FROM employee_info_vw") or die(mysqli_error($mysqli));

//CREATE 
if(isset($_POST['submit'])){

    //EMPLOYEE INFO
    $employeeNo = $_POST['employeeNo'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $degree = $_POST['degree'];
    $schoolgraduated = $_POST['schoolgraduated'];
    $yeargraduated = $_POST['yeargraduated'];
    //EDUC ATTAINMENT
    $degree = $_POST['degree'];
    $schoolgraduated = $_POST['schoolgraduated'];
    $yeargraduated = $_POST['yeargraduated']; 
    //SEMINARS
    $seminarname = $_POST['seminarname'];
    $seminarhour = $_POST['seminarhour'];
    $seminardate = $_POST['seminardate'];
    $seminardays = $_POST['seminardays'];
    //TRAINING
    $trainingname = $_POST['trainingname'];
    $trainingdate = $_POST['trainingdate'];
    $traininghours = $_POST['traininghours'];
    $trainingdays = $_POST['trainingdays'];
    //EMPLOYMENT HISTORY
    $statusemployment = $_POST['statusemployment'];
    $itemNo = $_POST['itemNo'];
    $placeassignment = $_POST['placeassignment'];
    $placeposition = $_POST['placeposition'];
    $salarygrade = $_POST['salarygrade'];
    $stepID = $_POST['stepID'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $sql = "INSERT INTO `employee`(`Employee_No`, `LastName`, `FirstName`, `MiddleName`, `Address`, `Email`, `Birthday`, `Gender`, `Image`) VALUES ('$employeeNo', '$lastname', '$firstname', '$middlename', '$address', '$email', '$birthdate', '$gender' , NULL);";
    $mysqli->query($sql) or die(mysqli_error($mysqli));
    $sql1 = "INSERT INTO educ_attainment(Employee_No,Degree_Code, Year_Graduated, School_Graduated) VALUES ('$employeeNo', '$degree',  '$yeargraduated', '$schoolgraduated');";
    $mysqli->query($sql1) or die(mysqli_error($mysqli));
    $sql2 = "INSERT INTO seminars(Employee_No,Seminar_Name, Sem_Date_Completed, Sem_No_of_Hours, Sem_No_of_Days) VALUES ('$employeeNo','$seminarname','$seminardate', '$seminarhour' , '$seminardays');";
    $mysqli->query($sql2) or die(mysqli_error($mysqli));
    $sql3 = "INSERT INTO training(Employee_No,Training_Name, Tra_Date_Completed, Tra_No_of_Hours, Tra_No_of_Days) VALUES ('$employeeNo','$trainingname', '$trainingdate', '$traininghours', '$trainingdays');";
    $mysqli->query($sql3) or die(mysqli_error($mysqli));
    $sql4 = "INSERT INTO employment_history(Employee_No, Item_No, Salary_Grade, Step_ID, Start_Date, End_Date, Place_of_Assignment, Status_of_Employ_Code, Position_Code) VALUES ('$employeeNo','$itemNo', '$salarygrade', '$stepID', '$startdate', '$enddate', '$placeassignment', '$statusemployment', '$placeposition');";
    $mysqli->query($sql4) or die(mysqli_error($mysqli));
    
    $result = $mysqli->query("SELECT * FROM employee_info_vw") or die(mysqli_error($mysqli));
}
//DELETE 
if(isset($_POST['empDelete'])){
    
    $empDelete =  $_POST['empDelete'];

    $query = "UPDATE `employee` SET Employee_State = 2  WHERE `employee`.`Employee_No` ='" . $empDelete . "'"  ;
    //echo $query;
     $mysqli->query($query)or die(mysqli_error($mysqli));
 }

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
                    <button class="btn btn-primary btn-sm float-right" type="button" data-toggle="modal" data-target="#addEmployee" style="background: rgb(111,66,193);">Add Employee</button>
                    
                    <h3 class="text-dark mb-4">Seminar List</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="background: var(--purple);">
                            <p class="text-primary m-0 font-weight-bold" style="color: rgb(247,247,247)!important;">Employee Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="employeeTable">
                                    <thead>
                                        <tr>
                                            <th>Employee No.</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Postion</th>
                                            <th>Employment Status</th>
                                            <th>Place of Assignment</th>
                                            <th>State</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        while ($rows = $result->fetch_assoc()):?>
                                       
                                            <tr>
                                                
                                                <td><?php echo $rows['Employee_No'];?></td>
                                                <td><?php echo $rows['Last Name'],' ',$rows['First Name'],' ',$rows['Middle Name'];?></td>
                                                <td><?php echo $rows['Address'];?></td>
                                                <td><?php echo $rows['Email'];?></td>
                                                <td><?php echo $rows['Age'];?></td>
                                                <td><?php echo $rows['Gender'];?></td>
                                                <td><?php echo $rows['Position'];?></td>
                                                <td><?php echo $rows['Employment Status'];?></td>
                                                <td><?php echo $rows['Place of Assignment'];?></td>
                                                <td><?php IF ($rows['State'] ==1)
                                                          {
                                                              echo "Active";
                                                          } 
                                                          ELSEIF ($rows['State'] == 2) {
                                                              echo "Dismissed";
                                                          }
                                                          
                                                    ?></td>
                                                <td class="d-xl-flex justify-content-xl-center">
                                                <form action="" method="post">
                                                    <button class="btn btn-circle btn-danger mr-1" name="empDelete" type="submit"  value="<?php echo $rows['Employee_No'];?>">
                                                    <i class="far fa-trash-alt fa-fw"></i></button>
                                                </form>
                                                <form action="updateEmployee.php">
                                                    <button class="btn btn-circle btn-success mr-1"  name="employeeNo" type="submit" value="<?php echo $rows['Employee_No'];?>">
                                                    <i class=" far fa-edit fa-fw"></i></button>
                                                </td>
                                                </form>          
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Employee No.</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Birthday</th>
                                            <th>Gender</th>
                                            <th>Postion</th>
                                            <th>Employment Status</th>
                                            <th>Place of Assignment</th>
                                            <th>State</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="addEmployee">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #382161;">
                            <h4 class="modal-title" style="color: rgb(255,255,255);">Add Employee</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body" style="color: rgb(133, 135, 150);">
                        
                            <form action="" method="POST">
                                <section>
                                    <h5 style="color: var(--purple);font-family: Nunito, sans-serif;"><strong>Personal Information</strong></h5>
                                </section>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="employeeNo"><strong>Employee No</strong></label><input class="form-control" type="text"  name="employeeNo" placeholder="EMP001"></div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="firstname"><strong>First Name</strong></label><input class="form-control" type="text"  placeholder="Juan" name="firstname"></div>
                                    </div>
                                    <div class="col"><label for="midlename"><strong>Middle Name</strong></label><input class="form-control" type="text" id="mname" placeholder="Arkon" name="middlename"></div>
                                </div>
                                <div class="form-row">
                                    <div class="col"><label for="lastname"><strong>Last Name</strong></label><input class="form-control" type="text" placeholder="Dela Cruz" name="lastname"></div>
                                    <div class="col">
                                        <div class="form-group"><label for="address"><strong>Address</strong></label><input class="form-control" type="text" id="first_name" placeholder="N. Zamora Street Tondo" name="address"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-5">
                                        <div class="form-group"><label for="email"><strong>Email</strong></label><input class="form-control" type="text" id="last_name" placeholder="johnnydogs@gmail.com" name="email"></div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group"><label for="birthdate"><strong>Birthdate</strong></label><input class="form-control" type="date" name="birthdate"></div>
                                    </div>
                                    <div class="col-xl-3 offset-xl-0">
                                        <div class="form-group"><label for="gender"><strong>Gender</strong></label><select class="form-control" name="gender">
                                                <option value="M" selected="">Male</option>
                                                <option value="F">Female</option>
                                            </select></div>
                                    </div>
                                </div>
                                <hr>
                                <section>
                                    <h5 style="color: var(--purple);font-family: Nunito, sans-serif;"><strong>Educational Attainment</strong></h5>
                                </section>
                                <div class="form-row">
                                    <div class="col-xl-6">
                                        <div class="form-group"><label for="degree"><strong>Degree</strong></label><select class="form-control" name="degree">
                                        <option value="" selected disabled>Select:</option>
                                        <?php
                                            $degreeSelect = $mysqli->query("SELECT * FROM degree ORDER BY Degree_Description ASC;") or die(mysqli_error($mysqli));
                                            while ($rows = $degreeSelect->fetch_assoc()):{?>
                                                <option value="<?php echo $rows['Degree_Code'];?>"><?php echo $rows['Degree_Description'];?></option>    
                                        <?php }endwhile?>
                                            </select></div>
                                    </div>
                                    <div class="col-xl-6 offset-xl-0"><label for="schoolgraduated"><strong>School Graduated</strong><br></label><input class="form-control" type="text" id="first_name-1" placeholder="Philippine Christian University" name="schoolgraduated"></div>
                                </div>
                                <div class="form-row" style="border-bottom-color: rgb(133, 135, 150);">
                                    <div class="col-xl-3">
                                        <div class="form-group"><label for="yeargraduated"><strong>Year Graduated</strong></label><input class="form-control" type="number" min="1900" name="yeargraduated" placeholder="2000"></div>
                                    </div>
                                </div>
                                <hr>
                                <section>
                                    <h5 style="color: var(--purple);font-family: Nunito, sans-serif;"><strong>Seminars</strong></h5>
                                </section>
                                <div class="form-row">
                                    <div class="col-xl-4"><label for="seminarname">Seminar Name</label><input class="form-control" type="text" name="seminarname"></div>
                                    <div class="col-xl-4"><label for="seminarhour">No. of Hours</label><input class="form-control" type="number" name="seminarhour"></div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-4"><label for="seminardate">Date Completed</label><input class="form-control" type="date" name="seminardate"></div>
                                    <div class="col-xl-4"><label for="seminardays">No. of Days</label><input class="form-control" type="number" name="seminardays"></div>
                                </div>
                                <hr>
                                <section>
                                    <h5 style="color: var(--purple);font-family: Nunito, sans-serif;"><strong>Training</strong></h5>
                                </section>
                                <div class="form-row">
                                    <div class="col-x1-4"><label for="trainingname">Training Name</label><input class="form-control" type="text" name="trainingname"></div>
                                    <div class="col-x1-4"><label for="traininghours">No. of Hours</label><input class="form-control" type="number" name="traininghours"></div>
                                </div>
                                <div class="form-row">
                                    <div class="col-x1-4"><label for="trainingdate">Date Completed</label><input class="form-control" type="date" name="trainingdate"></div>
                                    <div class="col-xl-4"><label for="trainingdays">No. of Days</label><input class="form-control" type="number" name="trainingdays"></div>
                                </div>
                                <hr>
                                <section>
                            <h5 style="color: rgb(51,8,121);font-family: Nunito, sans-serif;"><strong>Employment Information</strong></h5>
                            </section>
                            <div class="form-row">
                                <div class="col-x1-4">
                                    <div class="form-group"><label for="itemNo"><strong>Item No</strong></label><input class="form-control" type="text" name="itemNo" placeholder="ITEM_001"></div>
                                </div>
                                <div class="col-xl-4"><label for="salarygrade"><strong>Salary Grade</strong></label><input class="form-control" type="number" name="salarygrade" placeholder="1"></div>
                                <div class="col-xl-4"><label for="stepID"><strong>Step ID</strong></label><input class="form-control" type="text" placeholder="2" name="stepID"></div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-4">
                                    <div class="form-group"><label for="startdate"><strong>Start Date</strong></label><input class="form-control" type="date" name="startdate"></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label for="enddate"><strong>End Date</strong></label><input class="form-control" type="date" name="enddate"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-4">
                                    <div class="form-group"><label for="placeassignment"><strong>Place of Assignment</strong></label><input class="form-control" type="text" name="placeassignment"></div>
                                </div>
                                <div class="col-xl-4 offset-xl-0">
                                    <div class="form-group"><label for="gender"><strong>Status of Employment</strong></label><select class="form-control" name="statusemployment">
                                            <option value="" selected disabled>Select:</option>
                                            <option value="RegEmp">Regular Employment</option>
                                            <option value="ExtemEmp">Extended Temporary Employment</option>
                                            <option value="PtimeEmp">Part Time Employment</option>
                                            <option value="TempEmp">Temporary Employment</option>
                                            <option value="OnCallEmp">On-Call Employment</option>
                                        </select></div>
                                </div>
                                <div class="col-xl-4 offset-xl-0">
                                    <div class="form-group"><label for="gender"><strong>Position</strong></label><select class="form-control" value = "<?php echo $row['Position_Code'] ?> "placeholder="<?php echo $row['Pos_Description'];?>" name="placeposition">
                                                    <option value="" selected disabled>Select:</option>
                                                    <?php
                                                    $posSelect = $mysqli->query("SELECT * FROM position ORDER BY Pos_Description ASC;") or die(mysqli_error($mysqli));
                                                    
                                                    while ($rows = $posSelect->fetch_assoc()):{?>
                                                        <option value="<?php echo $rows['Position_Code'];?>"><?php echo $rows['Pos_Description'];?></option>
                                                    <?php }endwhile?>
                                                    </select></div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" name="submit" type="submit">Submit</button><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                            </form>
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
    <script src="assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"> </script>
    <script src="assets/js/dataTables.bootstrap4.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable({
                dom: 'fBrtlip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                "order": [[ 9, 'asc' ], [ 0, 'asc' ] ]
            });
    } );
    </script>

<?php
    }else
    {
        header("Location: login.php");
        exit();
    }
    ?>
</body>

</html>