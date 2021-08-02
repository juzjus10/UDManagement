<?php
   require_once('index.php');
   require_once('includes/NewDB.php');
   require_once('templates/header.php');
    session_start();
    if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        $sql_count = "SELECT COUNT('Employee No.') AS num FROM vw_headcount";
        $result_count = mysqli_query($conn, $sql_count);
        $values_count = mysqli_fetch_assoc($result_count);
        $num_rows = $values_count['num'];
        $sql_sum = "SELECT SUM(PayRate) AS salary FROM payroll_vw";
        $result_sum = mysqli_query($conn, $sql_sum);
        $values_sum = mysqli_fetch_assoc($result_sum);
        $total_salary = $values_sum['salary'];
    
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="headcount.php"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-6 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Total Employees</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $num_rows;?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-id-badge fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Salary (monthly)</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo "₱" . number_format((float)$total_salary,2,'.',''); ;?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Headcount by Position</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="headcountChart" >

                                        </canvas>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Gender Diversity</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="height: 280px;"><canvas id="genderChart"></canvas></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Function Evaluation<span class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Recruitment<span class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Placement<span class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payroll<span class="float-right">Complete!</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-lg-6 mb-4"> 
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Todo List</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <h6 class="mb-0"><strong>Performance Reviews</strong></h6><span class="text-xs">10:30 AM</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="formCheck-1"><label class="custom-control-label" for="formCheck-1"></label></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <h6 class="mb-0"><strong>Organize Employee Files</strong></h6><span class="text-xs">11:30 AM</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="formCheck-2"><label class="custom-control-label" for="formCheck-2"></label></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <h6 class="mb-0"><strong>Check Compensation and Benefits</strong></h6><span class="text-xs">12:30 AM</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="formCheck-3"><label class="custom-control-label" for="formCheck-3"></label></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>

    <script>
       
       $(document).ready(function() {
       	$.ajax({
       		url: "charts.php",
       		method: "GET",
       		success: function(res) {
       			console.log(res);

       			var pos_label = [];
       			var pos_count = [];
                var gend_label = [];
                var gend_count = [];

       			for (var i in res) {
       				if (res[i].hasOwnProperty('Position')) {
       					pos_label.push(res[i].Position);
       					pos_count.push(res[i].position_count);
       				}
                       if (res[i].hasOwnProperty('Gender')) {
                           if (res[i].Gender === "F") {
                            gend_label.push("Female");
                           } 
                           else if (res[i].Gender === "M") {
                            gend_label.push("Male");
                           }
                        
                        gend_count.push(res[i].gender_count);
       				}


       			}
                
                // HEADCOUNT CHART 
       			const graph_data = {
       				labels: pos_label,
       				datasets: [{
       					label: 'Headcount',
       					backgroundColor: "#1cc88a",
       					borderColor: "rgba(78, 115, 223, 1)",
       					data: pos_count
       				}],

       			};


       			var headchart = $("#headcountChart");

       			var barGraph = new Chart(headchart, {
       				type: 'bar',
       				data: graph_data,
       				options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
       					responsive: true,
       					maintainAspectRatio: false
       				}
       			});
                
                //GENDER CHART 
                const pie_data = {
       				labels: gend_label,
       				datasets: [{
       					label: 'Headcount',
       					backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            ],
       					data: gend_count 
       				}],

       			};
                var genderchart = $("#genderChart");

                var barGraph = new Chart(genderchart, {
                    type: 'doughnut',
                    data: pie_data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

       		}
       	});

       });
  
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