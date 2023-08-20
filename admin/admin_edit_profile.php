<?php
include("../database/connection.php");
error_reporting(0);
session_name('admin_session');
session_start();
if(!isset($_SESSION['admin_email']))
{
  header('location:../admin/admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/panel.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!--FontAwsome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">

     <!-- Boxicons CSS -->
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>
<body>

<!-- navbar -->
<nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="../images/logo.png" id="main_logo"></i>EMS
      </div>

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>

        <img src="../images/user2.jpg" alt="" class="user-pic" onclick="toggleMenu()" />

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
              <div class="user-info">
                  <img src="../images/user2.jpg">

                  <!--PHP fetching User's FirstName and LastName-->
                  <?php
                  $email = $_SESSION['admin_email'];
                  $query = "SELECT * FROM admin_login WHERE email = '$email'";
                  $data = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($data);

                  if($total !=0)
                  {
                    while($result = mysqli_fetch_assoc($data)){
                      echo "
                      <h3>".$result['firstname'] . " ".$result['lastname'] ." </h3>
                      ";
                    }
                  }
                  ?>

              </div>
              
              <div class="email-fecth">
               <?php
                  $email = $_SESSION['admin_email'];
                  $query = "SELECT * FROM admin_login WHERE email = '$email'";
                  $data = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($data);

                  if($total !=0)
                  {
                    while($result = mysqli_fetch_assoc($data)){
                      echo "
                      <p style='text-align: center; font-size: 12px;'>".$result['email']." </p>
                      ";
                      
                    }
                  }

                  ?>
              </div>
              <hr>

              <a href="../admin/admin_edit_profile.php" class="sub-menu-link">
                  <img src="../images/profile.png">
                  <p>Edit Profile</p>
                  <span>></span>
              </a>
              
              <a href="admin_logout.php" class="sub-menu-link">
                  <img src="../images/Logout.png">
                  <p>Logout</p>
                  <span>></span>
              </a>

          </div>
      </div>

    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <a href="admin_panel.php"><div class="menu_title menu_dahsboard"></div></a>
        
          <ul class="menu_items">
          <li class="item">
            <a href="admin_panel.php" class="nav_link">
              <span class="navlink_icon">
              <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>
        </ul>


        <ul class="menu_items">
          <li class="item">
            <a href="admin_edit_profile.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-user'></i>
              </span>
              <span class="navlink">Manage Profile</span>
            </a>
          </li>
        </ul>

          <!-- end -->

                      <!-- start -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-grid-alt"></i>
              </span>
              <span class="navlink">Features</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
            <a href="userApproval.php" class="nav_link sublink">Verify User</a>
              <a href="manage_employee.php" class="nav_link sublink">Manage Employee</a>
              <a href="manage_leave.php" class="nav_link sublink">Manage Leave</a>

            </ul>
          </li>
          <!-- end -->
        </ul>

        <ul class="menu_items">
          <li class="item">
            <a href="admin_logout.php" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-log-out'></i>
              </span>
              <span class="navlink">Logout</span>
            </a>
          </li>
        </ul>

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
                          <!--Edit Profile Section-->

        <form action="" method="POST" enctype="multipart/form-data">

          <div class="edit-profile-container">
    
            <h2>Admin Profile</h2>
                  
            <div class="user-edit-info">
              <img src="../images/user2.jpg">
            </div> 

             <div class="login-form">
        
             <p id="success" style="color:green; font-size:15px; text-align:center;"></p>
             <p id="editErr" style="color:red; font-size:15px; text-align:center;"></p>

            <div class="input-name">
            <p id="emailErr" style="color: red; font-size:12px"></p>
            <i class="fa fa-envelope email"></i>
                <input type="text" placeholder="Email" class="text-name" id="email" name="email" value="<?= $email ?>" disabled>
                
              </div>

            <div class="input-name">
            <p id="fnameErr" style="color: red; font-size:12px"></p>
            <i class="fa fa-user lock"></i>
                <input type="text" placeholder="FirstName" class="text-name" id="fname" name="fname" value="<?php echo (isset($_POST['fname']))?$_POST['fname']:""?>">
            </div>

            <div class="input-name">
            <p id="lnameErr" style="color: red; font-size:12px"></p>
            <i class="fa fa-user lock"></i>
                <input type="text" placeholder="LastName" class="text-name" id="lname" name="lname" value="">
            </div>

            <div class="input-name">
            <p id="passwordErr" style="color: red; font-size:12px"></p>
            <i class="fa fa-lock lock"></i>
                <input type="password" placeholder="Password" class="text-name" id="password" name="pass" value="<?php echo (isset($_POST['pass']))?$_POST['pass']:""?>">
            </div>

            <div class="input-name">
            <p id="conpassErr" style="color: red; font-size:12px"></p>
            <i class="fa fa-lock lock"></i>
                <input type="password" placeholder="Confirm Password" class="text-name" id="conpass" name="conpass" value="<?php echo (isset($_POST['conpass']))?$_POST['conpass']:""?>">
            </div>

            <div class="input-name">
            <input type="submit" id="login-btn" name="update" value="Update">
            </div>

        </form>
     </div>
    </div>
    <!--JavaScript-->

    <script src="../js/edit_profile.js"></script>
    <script src="../js/panel.js"></script>
    
</body>
</html>



<?php

if(isset($_POST['update']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pass = $_POST['pass'];
$conpass = $_POST['conpass'];
$hashedPd = md5($pass);
$hashedConpass = md5($conpass);

if(empty($fname) || empty($lname) || empty($pass) || empty($conpass))
    {
      echo"
      <script>
        const editErr = document.getElementById('editErr');
        editErr.innerHTML='Please fill out all fields';
      </script>

      ";

    }
    else{
        if($pass !== $conpass){

          echo"
          <script>
            const editErr = document.getElementById('editErr');
            editErr.innerHTML='Please check password and confirm Password';
          </script>
    
          ";

        }
        else{
            if($_SESSION['admin_email'] == $email)
            {
                $query = "UPDATE admin_login SET firstname = '$fname', lastname = '$lname', password = '$hashedPd', confirmpassword = '$hashedConpass' WHERE email = '$email'";
                $data = mysqli_query($conn, $query);

                if($data)
                {
                  echo"
                  <script>
                    const success = document.getElementById('success');
                    success.innerHTML='Data Updated';
                  </script>
            
                  ";

                    ?>
                    <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/ems_proposal/admin/admin_edit_profile.php">

                    <?php
                }
            }
            else{
                      echo"
                      <script>
                        const editErr = document.getElementById('editErr');
                        editErr.innerHTML='You are not authorized to change this user data';
                      </script>
                
                      ";

                }
        }
    }

}

?>
