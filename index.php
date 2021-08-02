<?php  
	$title = "";
    switch($_SERVER['PHP_SELF'])  {
        case '/UDManagement/login.php': 
            $title = 'Login'; 
            break;
        case '/UDManagement/dashboard.php': 
            $title = 'Dashboard'; 
            break;
        case '/UDManagement/employee.php': 
            $title = 'Employees'; 
            break;
        case '/UDManagement/profile.php': 
            $title = 'Profile'; 
            break;
        case '/UDManagement/payroll.php': 
            $title = 'Payroll'; 
            break;
        case '/UDManagement/educational_attainment.php': 
            $title = 'Educational Attainment'; 
            break;
		case '/UDManagement/seminar.php': 
			$title = 'Seminars'; 
			break;
        case '/UDManagement/training.php': 
            $title = 'Training'; 
            break;
        case '/UDManagement/employeehistory.php': 
            $title = 'Employee History'; 
            break;
		default:
			$title = 'Index';
} ?>  <title><?php echo $title . ' | UDManagement' ?></title>
