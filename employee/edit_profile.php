<?php
include("../database/connection.php");
error_reporting(0);
session_name('employee_session');
session_start();
if(!isset($_SESSION['user_email']))
{
  header('location:../employee/emp_login.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- Boxicons CSS -->
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="../css/profileimage.css">

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

                <!--Section Changed-->

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
              <div class="user-info">
                  <!-- <img src="../images/noprofil.jpg"> -->
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
                          <!--Edit Profile Section-->
        
              

        <form action="" method="POST" enctype="multipart/form-data" id="form">

          <div class="edit-profile-container">
    
            <h2>Edit Profile</h2>
                  
            <!--Image Update Code-->

   <div class="upload">

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
               

                  ?>

      </div>
  
    
    

            <!--Personal Data-->
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
                <input type="text" placeholder="LastName" class="text-name" id="lname" name="lname" value="<?php echo (isset($_POST['lname']))?$_POST['lname']:""?>">
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

          </div>
         </div>
        </form>

    <!--JavaScript-->

    <script src="../js/edit_profile.js"></script>
    <script src="../js/panel.js"></script>

    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    
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

  if( empty($fname) || empty($lname) || empty($pass) || empty($conpass))
  {
    echo "
      <script>
        const editErr = document.getElementById('editErr');
        editErr.innerHTML='Please fill out all fields';
      </script>
    ";
  }
  else
  {
    if($pass !== $conpass)
    {
      echo "
        <script>
          const editErr = document.getElementById('editErr');
          editErr.innerHTML='Please check password and confirm Password';
        </script>
      ";
    }
    else
    {
      if($_SESSION['user_email'] == $email)
      {
        $query = "UPDATE register SET firstname = '$fname', lastname = '$lname', password = '$hashedPd', confirmpassword = '$hashedConpass' WHERE email = '$email'";
        $data = mysqli_query($conn, $query);

        if($data)
        {
          echo "
            <script>
              const success = document.getElementById('success');
              success.innerHTML='Data Updated';
              setTimeout(function(){
                window.location.href = 'http://localhost/ems_proposal/employee/edit_profile.php';
              }, 4000);
            </script>
          ";
        }
      }
      else
      {
        echo "
          <script>
            const editErr = document.getElementById('editErr');
            editErr.innerHTML='You are not authorized to change this user data';
          </script>
        ";
      }
    }
  }
}

// Handle profile picture update
if (isset($_FILES['image']) && $_FILES['image']['size'] > 0)
{
  // Image file is selected, proceed with the upload
  $image = $_FILES['image'];
  $allowedExtensions = ['jpg', 'jpeg', 'png'];
  $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

  if (in_array($fileExtension, $allowedExtensions))
  {
    $targetDirectory = "../emp_images/";
    $targetFilename = $targetDirectory . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $targetFilename))
    {
      // Get the old image filename from the database
      $email = $_SESSION['user_email'];
      $query = "SELECT images FROM register WHERE email = '$email'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $oldImage = $row['images'];

      // Update the image filename in the database
      $query = "UPDATE register SET images = '" . basename($image['name']) . "' WHERE email = '$email'";
      mysqli_query($conn, $query);

      // Delete the old image if it exists and it's not the default image
      if ($oldImage && $oldImage !== "default.jpg" && file_exists($targetDirectory . $oldImage))
      {
        unlink($targetDirectory . $oldImage);
      }
    }
    else
    {
      echo "Error uploading the image.";
    }
  }
  else
  {
    echo "Invalid file format. Allowed formats: jpg, jpeg, png.";
  }
}
?>


