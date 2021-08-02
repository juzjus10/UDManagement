<?php 
    require_once('includes/NewDB.php');
    include("includes/login_process.php");
    require_once('index.php');
    require_once('templates/header.php');
?>
<!DOCTYPE html>
<html>

<head>
<?php include("templates/header.php");?>
</head>

<body class="bg-gradient-primary" style="background: rgb(41,45,59);">
    <div class="container justify-content-xl-center">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-12 offset-xl-0">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;assets/img/dogs/sad-summer-rain-wallpaper.jpg&quot;) center / cover no-repeat;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome to UDManagement</h4>
                                    </div>
                                   
                                    <form class="user" action = "" method = "POST">
                                        <?php
                                            if(isset($_GET['error'])){?>
                                                <p class = "text-center"> <?php echo $_GET['error'];?></p>
                                            <?php
                                            }?>
                                            
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background: var(--green);border-style: none;">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>