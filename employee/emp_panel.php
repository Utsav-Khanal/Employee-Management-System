<?php
include("../database/connection.php");
error_reporting(0);
session_name('employee_session');
session_start();


if(!isset($_SESSION['user_email']))
{
  header('location:../employee/emp_login.php');
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>

    


    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="../css/panel.css" />
    
    <link rel="stylesheet" href="../css/boxicons.min.css">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="../images/logo.png" id="main_logo"></i>EMS
      </div>

      <!-- <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div> -->

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>

        <!-- <i class='bx bx-bell'></i> -->

        <!--Fetching User Profile-->
        <?php
                  $email = $_SESSION['user_email'];
                  $query = "SELECT * FROM register WHERE email = '$email'";
                  $data = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($data);

                  if($total!=0){
                    while($result=mysqli_fetch_assoc($data))
                    {
                        ?>
                        <img src=" <?= "../emp_images/" . $result['images'] ?>" width="125px" height="125px" alt="" class="user-pic" onclick="toggleMenu()" />
                      
                        <?php
                    }
                }
                else{
                    echo "No Records Found";
                }


                  ?>

                  <!--Another Section Starts--->

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
              <div class="user-info">

              <!--Fetching User Profile-->
              <?php
                  $email = $_SESSION['user_email'];
                  $query = "SELECT * FROM register WHERE email = '$email'";
                  $data = mysqli_query($conn, $query);
                  $total = mysqli_num_rows($data);

                  if($total!=0){
                    while($result=mysqli_fetch_assoc($data))
                    {
                        ?>
                        <img src=" <?= "../emp_images/" . $result['images'] ?>" width="125px" height="125px" alt="Image">
                      
                        <?php
                    }
                }
                else{
                    echo "No Records Found";
                }


                  ?>
                  


                  <!--PHP fetching User's FirstName and LastName-->
                  <?php
                  $email = $_SESSION['user_email'];
                  $query = "SELECT * FROM register WHERE email = '$email'";
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
                  $email = $_SESSION['user_email'];
                  $query = "SELECT * FROM register WHERE email = '$email'";
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

              <a href="../employee/edit_profile.php" class="sub-menu-link">
                  <img src="../images/profile.png">
                  <p>Edit Profile</p>
                  <span>></span>
              </a>

              <a href="emp_logout.php" class="sub-menu-link">
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
          <a href="../employee/emp_panel.php"><div class="menu_title menu_dahsboard"></div></a>
        
          <!-- start -->

          <ul class="menu_items">
          <li class="item">
            <a href="emp_panel.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>
        </ul>

        <ul class="menu_items">
          <li class="item">
            <a href="leave_req.php" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-horizontal-right'></i>
              </span>
              <span class="navlink">Leave Section</span>
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

    <!--JavaScript Link-->
    <script src="../js/panel.js"></script>

  </body>
</html>
