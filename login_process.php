<?php 
    ob_start();
    session_start();
    include "NewDB.php";
    if (isset($_POST['username']) && isset($_POST['password']))
        {
            function validate($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $username = validate($_POST['username']);
            $password = validate($_POST['password']);

            if (empty($username))
            {
                header("Location: login.php?error=Username is required");
                exit();
            }
            else if (empty($password))
            {
                header("Location: login.php?error=Password is required");
                exit();

            }
            else
            {
                $sql = "SELECT * FROM login_sys WHERE username='$username' AND pass='$password';";
                $result = mysqli_query($conn, $sql); 

                if (mysqli_num_rows($result) === 1)
                {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['username'] === $username && $row['pass'] === $password)
                    {
                        $_SESSION['Name'] = $row['Name'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_id'] = $row['user_id'];
                        header("Location: dashboard.php");
                        exit();
                    }
                    else
                    {
                        header("Location: login.php?error=Incorrect username and password");
                        exit();

                    }
                }
                else
                {
                    header("Location: login.php?error=Incorrect username and password");
                    exit();
                }
            }

        }
    else
    {
        header("Location: login.php");
        exit();
    };

?>