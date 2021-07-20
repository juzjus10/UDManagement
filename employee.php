<?php
require_once('NewDB.php');
$mysqli = new mysqli($server,$user,$pass,$db);
$result = $mysqli->query("SELECT * FROM employee_info_vw") or die(mysqli_error($mysqli));
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

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


    $sql = "INSERT INTO `employee`(`Employee_No`, `LastName`, `FirstName`, `MiddleName`, `Address`, `Email`, `Birthday`, `Gender`, `Image`)
    VALUES ('$employeeNo', '$lastname', '$firstname', '$middlename', '$address', '$email', '$birthdate', '$gender' , NULL);
    INSERT INTO educ_attainment(Employee_No,Degree_Code, Year_Graduated, School_Graduated)
    VALUES ('$employeeNo', '$degree', '$schoolgraduated', '$yeargraduated');
    INSERT INTO seminars(Employee_No,Seminar_Name, Date_Completed, No_of_Hours, No_of_Days)
    VALUES ('$employeeNo','$seminarname', '$seminarhour', '$seminardate', '$seminardays');
    INSERT INTO training(Employee_No,Training_Name, Date_Completed, No_of_Hours, No_of_Days)
    VALUES ('$employeeNo','$trainingname', '$trainingdate', '$traininghours', '$trainingdays');";



        if (mysqli_multi_query($mysqli,$sql)) {
            echo '<div class="alert alert-success" role="alert">';
            echo 'New Employee Added';
            echo '</div>';
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - UDManagement</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
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
                    <li class="nav-item"><a class="nav-link active" href="employee.php"><i class="fas fa-table"></i><span>Employees</span></a><a class="nav-link" href="payroll.php"><i class="fa fa-credit-card-alt"></i><span>Payroll</span></a><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                   
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(255,255,255) !important;">Admin</span><img class="border rounded-circle img-profile" src="assets/img/dogs/image2.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid"><button class="btn btn-primary btn-sm float-right" type="button" data-toggle="modal" data-target="#addEmployee" style="background: rgb(111,66,193);">Add Employee</button>
                    <h3 class="text-dark mb-4">Employee List</h3>
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
                                            <th>Birthday</th>
                                            <th>Gender</th>
                                            <th>Postion</th>
                                            <th>Employment Status</th>
                                            <th>Place of Assignment</th>
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
                                                <td><?php echo $rows['Birthday'];?></td>
                                                <td><?php echo $rows['Gender'];?></td>
                                                <td><?php echo $rows['Position'];?></td>
                                                <td><?php echo $rows['Employment Status'];?></td>
                                                <td><?php echo $rows['Place of Assignment'];?></td>
                                                <td class="d-xl-flex justify-content-xl-center"><button class="btn btn-danger" type="delete" data-dismiss="modal">DELETE</button>
                                                <a class="btn btn-success btn-sm" role="button" href="profile.php"><i class="far fa-edit"></i></a></td>
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
                                                <option value="MAED" selected="">Master of Arts in Education</option>
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
                                    <div class="col-xl-6 offset-xl-0"><label for="birthdate"><strong>School Graduated</strong><br></label><input class="form-control" type="text" id="first_name-1" placeholder="Philippine Christian University" name="schoolgraduated"></div>
                                </div>
                                <div class="form-row" style="border-bottom-color: rgb(133, 135, 150);">
                                    <div class="col-xl-3">
                                        <div class="form-group"><label for="degree"><strong>Year Graduated</strong></label><input class="form-control" type="number" min="1900" name="yeargraduated" placeholder="2000"></div>
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
                                    <div class="col"><label for="trainingname">Training Name</label><input class="form-control" type="text" name="trainingname"></div>
                                    <div class="col"><label for="trainingdate">Date Completed</label><input class="form-control" type="date" name="trainingdate"></div>
                                    <div class="col"><label for="traininghours">No. of Hours</label><input class="form-control" type="number" name="traininghours"></div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-4"><label for="trainingdays">No. of Days</label><input class="form-control" type="number" name="trainingdays"></div>
                                </div>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" name="submit" type="submit">Submit</button><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"> </script>
    <script src="assets/js/dataTables.bootstrap4.min.js"> </script>
    <script src="assets/js/theme.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable();
    } );
    </script>
</body>

</html>