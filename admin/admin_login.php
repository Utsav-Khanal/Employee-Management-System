<?php
include("../database/connection.php");
error_reporting(0);
session_name('admin_session');
session_start();

if(isset($_SESSION['admin_adminid']))
{
    echo '<script type="text/javascript">';
    echo "alert('You are already Logged In!... ');";
    echo 'window.location.href = "../admin/admin_panel.php"';
    echo '</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel = "stylesheet" href="../css/style.css">

         <!--FontAwsome-->
         <link rel="stylesheet" href="../css/all.min.css">
         <link rel="stylesheet" href="../css/fontawesome.min.css">

</head>
<body>
    <header>
        <img class="logo" src="../images/logo.png" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="../home.php">Home</a></li>
                <li><a href="../employee/emp_login.php">Employee Login</a></li>
                <li><a href="../register.php">Register</a></li>
                <li><a href="admin_login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>

       <!--Login Form-->

       <div class="login-container">
        <h2>Admin Login</h2>
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
            </div>

            
        </form>
     </div>
    </div>

<!--JavaScript-->
<!-- <script src="js/script.js"></script> -->

</body>
</html>


<?php

if(isset($_POST['login-btn']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $hashedPd = md5($pass);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM admin_login WHERE email = '$email' && password = '$hashedPd'";
    $result = mysqli_query($conn, $select);
    

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        
        if($row['user_type'] == 'admin')
        {
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_adminid'] = true;
            echo "
            <script>
            const success = document.getElementById('success');
            success.innerHTML='Successfull Login';
            </script>
            ";

            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0.3; URL=http://localhost/ems_proposal/admin/admin_panel.php">

            <?php

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