<?php
include("../database/connection.php");
error_reporting(0);
session_name('employee_session');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="../css/style.css">


                    <!--FontAwsome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    
</head>
<body>

<!--Login-->
<header>
        <img class="logo" src="../images/logo.png" alt="logo">
        <nav class="nav">
            <ul class="nav_links">
                <li><a href="../home.php">Home</a></li>
                <li><a href="../employee/emp_login.php">Employee Login</a></li>
                <li><a href="../register.php">Register</a></li>
                <li><a href="../admin/admin_login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    
    <!--Login Form-->

    <div class="login-container">
        <h2>Employee Login</h2>
        <p id="loginErr" style="font-size: 17px; font-weight:bold; color:red; text-align:center;"></p>
        <p id="success" style="font-size: 17px; font-weight:bold; color:green; text-align:center;"></p>
    <div class="login-form">
        
        <form action="" method="POST">
            <div class="input-name">
                <i class="fa fa-envelope email"></i>
                <input type="text" placeholder="Email" class="text-name" id="login-email" name="email" required>
            </div>

            <div class="input-name">
                <i class="fa fa-lock lock"></i>
                <input type="password" placeholder="Password" class="text-name" id="login-pass" name="pass" required>
            </div>

            <div class="input-name">
            <input type="submit" id="login-btn" name="login-btn" value="Login">
            <p>Don't have an account? <a class="login-link" href="../register.php">Register</p></a>
            </div>

            
        </form>
     </div>
    </div>
<!--JavaScript-->
<script src="js/script.js"></script>
</body>
</html>

<?php

if(isset($_POST['login-btn']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $hashedPd = md5($pass);
    $user_type = $_POST['user_type'];
    $status_login = $_SESSION['status'];
   

    $select = mysqli_query($conn,"SELECT * FROM register WHERE email = '$email' && password = '$hashedPd'");
    $row = mysqli_fetch_array($select);
    $status = $row['status'];

    $select2 = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' && password = '$hashedPd'");
    $check_user = mysqli_num_rows($select2);

    if($row['user_type'] == 'user')
    {
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['gender'] = $row['gender'];

        if($status == "approved")
        {
            echo "
            <script>
            const success = document.getElementById('success');
            success.innerHTML='Successfull Login';
            </script>
            ";

            ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0.3; URL=http://localhost/ems_proposal/employee/emp_panel.php">

            <?php

        }
        
        elseif($status == "pending")
        {
                echo '<script type="text/javascript">';
                echo 'alert("Your account is pending for approval! Please try again later");';
                echo 'window.location.href = "../employee/emp_login.php"';
                echo '</script>';

                session_destroy();
        }
        elseif($status == "rejected")
        {
                echo '<script type="text/javascript">';
                echo 'alert("Your account is rejected!..! Try to register later..!");';
                echo 'window.location.href = "../employee/emp_login.php"';
                echo '</script>';
                
                session_destroy();
        }
    }
    else{
             echo "
            <script>
            const loginErr = document.getElementById('loginErr');
            loginErr.innerHTML='Invalid Credential';
            </script>
            
            ";
    }
}

?>