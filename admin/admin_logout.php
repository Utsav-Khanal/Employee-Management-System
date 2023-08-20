<?php

//Unique name for admin session
session_name('admin_session');

//session start
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header('location:admin_login.php');


?>