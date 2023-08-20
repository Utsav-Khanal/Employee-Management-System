<?php
include("../database/connection.php");
// include("admin_sidebar.php");
error_reporting(0);
session_name('admin_session');
session_start();

if(!isset($_SESSION['admin_email']))
{
  header('location:../admin/admin_login.php');
  exit();
}

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/panel.css" />
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
                <a href="../admin/admin_panel.php">
                    <div class="menu_title menu_dahsboard"></div>
                </a>

                <!-- start -->

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
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Collapse</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>


    
                                  <!--Main Part-->

                 <div class="right_content">

                   <!--PHP fetching User's FirstName and LastName-->
                  <?php
                  $email = $_SESSION['email'];
                  $query = "SELECT * FROM admin_login WHERE email = '$email'";
                  $data = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($data);

                  if($total !=0)
                  {
                    while($result = mysqli_fetch_assoc($data)){
                      echo "
                      <p>Welcome Admin (".$result['firstname'] .") </p>
                      ";
                    }
                  }
                  ?>
            
            </div>
            
     <!--JavaScript Link-->
     <script src="../js/panel.js"></script>
                          
  </body>
</html>
