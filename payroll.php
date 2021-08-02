<?php 
require_once('index.php');
require_once('includes/NewDB.php');
require_once('templates/header.php');
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
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
                                    
                                    $db = mysqli_select_db($conn, 'human_resources2.0');
                                    
                                        if(isset($_POST['search']))
                                        {
                                            $lname = $_POST['lastname'];
                                            $fname = $_POST['firstname'];
                            
                                            $query = "SELECT * FROM payroll_vw WHERE LastName = '$lname' OR  FirstName = '$fname'";
                                            $result = mysqli_query($conn, $query);
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
                                            $result = mysqli_query($conn, $query);
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
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <script>
        $(document).ready(function() {
           $('#payrollTable').DataTable({
            dom: 'fBrtlip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ] 
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