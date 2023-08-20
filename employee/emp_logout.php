<?php
        session_name('employee_session');

        //session start
        session_start();

        // Unset all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header('location:../employee/emp_login.php');
        exit();



?>