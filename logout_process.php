<?php
    session_start();
    session_unset();
    
    session_Destroy();
    header("Location: login.php");
?>