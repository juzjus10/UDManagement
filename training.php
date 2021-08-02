<?php
require_once('index.php');
require_once('includes/NewDB.php');
require_once('templates/header.php');

session_start();
    if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }
    $result = $conn->query("SELECT * FROM training_vw") or die(mysqli_error($conn));
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
                   
                    
                    <h3 class="text-dark mb-4">Training List</h3>
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
                                            <th>Training Name</th>
                                            <th>Training Completed</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        while ($rows = $result->fetch_assoc()):?>
                                       
                                            <tr>
                                                
                                                <td><?php echo $rows['Employee_No'];?></td>
                                                <td><?php echo $rows['Last_Name'],' ',$rows['First_Name'],' ',$rows['Middle_Name'];?></td>
                                                <td><?php echo $rows['Training_Name'];?></td>
                                                <td><?php echo $rows['Training_Completed'];?></td>       
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td>Employee No.</td>
                                            <td>Name</td>
                                            <td>Training Name</td>
                                            <td>Training Completed</td>
                                            
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
                "order": [  0, 'asc'  ]
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