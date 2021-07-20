<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Paylist - UDManagement</title>
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
                    <li class="nav-item"><a class="nav-link" href="employee.php"><i class="fas fa-table"></i><span>Employees</span></a><a class="nav-link active" href="payroll.php"><i class="fa fa-credit-card-alt"></i><span>Payroll</span></a><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Login</span></a></li>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small" style="color: rgb(255,255,255) !important;">Admin</span><img class="border rounded-circle img-profile" src="assets/img/dogs/image2.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Payroll</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="background: var(--gray);">
                            <p class="text-primary m-0 font-weight-bold" style="color: var(--white)!important;">Employee Paylist</p>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table id="payrollTable" class="table my-0" >
                                    <thead>
                                        <tr>
                                            <th>Employee No.</th>
                                            <th>Name</th>
                                            <th>Salary Grade</th>
                                            <th>Step ID</th>
                                            <th>Pay Rate</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $connect = mysqli_connect("localhost", "root", "");
                                    $db = mysqli_select_db($connect, 'human_resources2.0');
                                    
                                        if(isset($_POST['search']))
                                        {
                                            $lname = $_POST['lastname'];
                                            $fname = $_POST['firstname'];
                            
                                            $query = "SELECT * FROM payroll_vw WHERE LastName = '$lname' OR  FirstName = '$fname'";
                                            $result = mysqli_query($connect, $query);
                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($result))
                                                { 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['EmployeeNo.']; ?></td>
                                                        <td><?php echo $row['LastName'] .", ". $row['FirstName'] ." ". $row['MiddleName']; ?> </td>
                                                        <td><?php echo $row['SalaryGrade']; ?></td>
                                                        <td><?php echo $row['StepID']; ?></td>
                                                        <td><?php echo $row['PayRate']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }

                                        }
                                        else
                                        {
                                            $query = "SELECT * FROM payroll_vw";
                                            $result = mysqli_query($connect, $query);
                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0)
                                            {
                                                while($row = mysqli_fetch_assoc($result))
                                                { 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['EmployeeNo.']; ?></td>
                                                        <td><?php echo $row['LastName'] .", ". $row['FirstName'] ." ". $row['MiddleName']; ?> </td>
                                                        <td><?php echo $row['SalaryGrade']; ?></td>
                                                        <td><?php echo $row['StepID']; ?></td>
                                                        <td><?php echo "₱" . number_format((float)$row['PayRate'],2,'.',''); ?></td>
                                                    
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Employee No.</strong></td>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Salary Grade</strong></td>
                                            <td><strong>Step ID</strong></td>
                                            <td><strong>Pay Rate</strong></td>
                                           
                                        </tr>
                                    </tfoot>
                                </table>
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
    <div class="modal fade" role="dialog" tabindex="-1" id="editHistory">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #330879;">
                    <h4 class="modal-title" style="color: rgb(255,255,255);">Edit History</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="color: rgb(133, 135, 150);">
                    <form>
                        <section>
                            <h5 style="color: rgb(51,8,121);font-family: Nunito, sans-serif;"><strong>Personal Information</strong></h5>
                        </section>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="employeeNo"><strong>Employee No</strong></label><input class="form-control" type="text" id="username" name="employeeNo" placeholder="EMP001"></div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="itemNo"><strong>Item No</strong></label><input class="form-control" type="number" name="itemNo" placeholder="ITEM_001"></div>
                            </div>
                            <div class="col-xl-2"><label for="salarygrade"><strong>Salary Grade</strong></label><input class="form-control" type="number" name="salarygrade" placeholder="1"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-2"><label for="stepID"><strong>Step ID</strong></label><input class="form-control" type="text" placeholder="2" name="stepID"></div>
                            <div class="col-xl-4">
                                <div class="form-group"><label for="startdate"><strong>Start Date</strong></label><input class="form-control" type="date" name="startdate"></div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="enddate"><strong>End Date</strong></label><input class="form-control" type="date" name="enddate"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-4">
                                <div class="form-group"><label for="placeassignment"><strong>Place of Assignment</strong></label><select class="form-control" name="placeassignment">
                                        <option value="Administrative Position" selected="">Administrative Position</option>
                                        <option value="Faculty Position">Faculty Position</option>
                                        <option value="Executive Position'">Executive Position'</option>
                                    </select></div>
                            </div>
                            <div class="col-xl-4 offset-xl-0">
                                <div class="form-group"><label for="gender"><strong>Status of Employment</strong></label><select class="form-control" name="placeassignment">
                                        <option value="RegEmp" selected="">Regular Employment</option>
                                        <option value="ExtemEmp">Extended Temporary Employment</option>
                                        <option value="PtimeEmp">Part Time Employment</option>
                                        <option value="TempEmp">Temporary Employment</option>
                                        <option value="OnCallEmp">On-Call Employment</option>
                                    </select></div>
                            </div>
                            <div class="col-xl-4 offset-xl-0">
                                <div class="form-group"><label for="gender"><strong>Position</strong></label><select class="form-control" name="placeassignment">
                                        <option value="AP" selected="">Administrative Position</option>
                                        <option value="FP">Faculty Position</option>
                                        <option value="EP">Executive Position</option>
                                    </select></div>
                            </div>
                        </div>
                        <section></section>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save&nbsp;</button></div>
            </div>
        </div>
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
            $('#payrollTable').DataTable();
    } );
    </script>
</body>

</html>