<?php
require_once('NewDB.php');
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
                    <h3 class="text-dark mb-4">Profile (WIP)</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
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
                                            <form>
                                                <section></section>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="employeeNo"><strong>Employee No</strong></label><input class="form-control" type="text" id="username" name="employeeNo" placeholder="EMP001"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="firstname"><strong>First Name</strong></label><input class="form-control" type="email" id="email" placeholder="Juan" name="firstname"></div>
                                                    </div>
                                                    <div class="col"><label for="firstname"><strong>Middle Name</strong></label><input class="form-control" type="email" id="email-1" placeholder="Arkon" name="middlename"></div>
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
                                                        <div class="form-group"><label for="gender"><strong>Gender</strong></label><select class="form-control">
                                                                <option value="M" selected="">Male</option>
                                                                <option value="F">Female</option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row">
                                                <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit">Save</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold"><strong>Educational Attainment</strong><br></p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group">
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
                                                    <div class="form-row">
                                                        <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;</button></div>
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
                                    <form>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-xl-6"><label for="seminarname">Seminar Name</label><input class="form-control" type="text" name="seminarname"></div>
                                                <div class="col-xl-6"><label for="seminarhour">No. of Hours</label><input class="form-control" type="number" name="seminarhour"></div>
                                            </div>
                                            <div class="form-row" style="border-bottom-color: rgb(133, 135, 150);">
                                                <div class="col-xl-6"><label for="seminardate">Date Completed</label><input class="form-control" type="date" name="seminardate"></div>
                                                <div class="col-xl-6"><label for="seminardays">No. of Days</label><input class="form-control" type="number" name="seminardays"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold"><strong>Training</strong><br></p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <section></section>
                                            <div class="form-row">
                                                <div class="col-lg-12 col-xl-6"><label for="trainingname">Training Name</label><input class="form-control" type="text" name="trainingname"></div>
                                                <div class="col-xl-6"><label for="trainingdate">Date Completed</label><input class="form-control" type="date" name="trainingdate"></div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-6"><label for="trainingdays">No. of Days</label><input class="form-control" type="number" name="trainingdays"></div>
                                                <div class="col"><label for="traininghours">No. of Hours</label><input class="form-control" type="number" name="traininghours"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col d-xl-flex justify-content-xl-end"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;</button></div>
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
</body>

</html>