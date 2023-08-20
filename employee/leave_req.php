<?php
include("../database/connection.php");
error_reporting(0);
session_name('employee_session');
session_start();
if (!isset($_SESSION['user_email'])) {
  header('location:../employee/emp_login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/panel.css">

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
                        <img src=" <?= "../emp_images/" . $result['images'] ?>" width="125px" height="125px" alt="" class="user-pic" onclick="toggleMenu()" />
                      
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

            if ($total != 0) {
              while ($result = mysqli_fetch_assoc($data)) {
                echo "
                      <h3>" . $result['firstname'] . " " . $result['lastname'] . " </h3>
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

            if ($total != 0) {
              while ($result = mysqli_fetch_assoc($data)) {
                echo "
                      <p style='text-align: center; font-size: 12px;'>" . $result['email'] . " </p>
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
        <a href="../employee/emp_panel.php">
          <div class="menu_title menu_dahsboard"></div>
        </a>

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
            <i class='bx bx-log-in'></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
    </div>
  </nav>
  <!--Leave Request Section-->

  <form action="" method="POST">

    <div class="leaveReq-container">

      <h2>Leave Request</h2>
      <p style="color: red; font-size:15px; text-align:center;">**DONOT SUBMIT MULTIPLE DATA**</p>

      <div class="login-form">


        <p id="success" style="color:green; font-weight:bold; font-size:20px; text-align:center;"></p>
        <p id="ErrMsg" style="color:red; font-size:20px; text-align:center;"></p>
        <div class="input-name">
          <p>Leave Type</p>
        
          <select name="leave_req">
            <option selected hidden value="">Choose Leave</option>
            <option value="maternity">Maternity</option>
            <option value="sick">Sick</option>
            <option value="vacation">Vacation</option>
          </select>

        </div>

        <div class="input-name">
          <p>Desribe</p>
          <textarea  name="content" class="text-name"></textarea>
        </div>

        <div class="input-name">
          <p>Start Date</p>
          <input type="date" name="start_dt" id="start_date">
        </div>

        <div class="input-name">
          <p>End Date</p>
          <input type="date" name="end_dt" id="end_date">
        </div>

        <div class="input-name">
          <button type="submit" name="leave_submit">Submit</button>
        </div>

      </div>
    </div>
  </form>

 
  <<!--LEAVE APPLICATIONS LIST-->

    <div class="leaveEmp-container">
      <h2>List of Leave</h2>
      <div class="input-name">
        <table border="0" cellspacing="13">
          <tr>
            <th>SUBMISSION DATE</th>
            <th>SUBJECT</th>
            <th>CONTENT</th>
            <th>START DATE</th>
            <th>END DATE</th>
            <th>STATUS</th>
          </tr>
          <?php
          $email = $_SESSION['user_email'];
          $leaveStatus = $row['status'];
          $query = "SELECT * FROM leave_request WHERE email = '$email'";
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($result)) { ?>

            <tbody>
              <tr>
                <td><?= $row['leave_submit_date']; ?></td>
                <td><?= $row['subject']; ?></td>
                <td><?= $row['content']; ?></td>
                <td><?= $row['start_date']; ?></td>
                <td><?= $row['end_date']; ?></td>
                <td>
                    <?php
                      if($row['status']=="pending")
                      {
                        echo "<p style='color:yellow; font-weight:bold;'>Pending</p>";
                      }
                      elseif($row['status']=="approved"){
                        echo "<p style='color:greenyellow; font-weight:bold;'>Approved</p>";
                      }
                      elseif($row['status']=="rejected"){
                        echo "<p style='color:red; font-weight:bold;'>Rejected</p>";
                      }
                      else{

                      }


                    ?>

                 </td>
                
              </tr>

            </tbody>

          <?php  }  ?>
        </table>
      </div>
    </div>
    <!--JavaScript-->

    <script src="../js/edit_profile.js"></script>
    <script src="../js/panel.js"></script>
    
    <script>
  // Get the current date as a string in the format "YYYY-MM-DD"
  const today = new Date().toISOString().split('T')[0];

  // Get the input elements using their IDs
  const startDatePicker = document.getElementById('start_date');
  const endDatePicker = document.getElementById('end_date');

  // Set the min attribute of the start date picker to the current date
  startDatePicker.setAttribute('min', today);

  // Function to update the min attribute of the end date picker based on the selected start date
  function updateEndDateMin() {
    const selectedStartDate = startDatePicker.value;
    endDatePicker.setAttribute('min', selectedStartDate);
  }

  // Add an event listener to the start date picker to call the updateEndDateMin function when the value changes
  startDatePicker.addEventListener('change', updateEndDateMin);
</script>




</body>

</html>

<?php
if (isset($_POST['leave_submit'])) {

  $email = $_SESSION['user_email'];
  $sql = "SELECT * FROM register where email = '$email'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) { ?>

    <p><?= $email; ?></p>

    <?php
  }


  $subject = $_POST['leave_req'];
  $content = $_POST['content'];
  $start_date = $_POST['start_dt'];
  $end_date = $_POST['end_dt'];


  if (empty($subject) || empty($content) || empty($start_date) || empty($end_date)) {

    echo "
      <script>
      const fieldErr = document.getElementById('ErrMsg');
      ErrMsg.innerHTML='Please fill out all the details';
      </script>
      
      ";
  } else {

    $leave_req = mysqli_query($conn, "INSERT INTO leave_request(email,subject,content,status,start_date,end_date) VALUE('$email','$subject','$content','pending','$start_date','$end_date')");

    if ($leave_req > 0) {
      echo "
        <script>
          const success = document.getElementById('success');
          success.innerHTML='Your request will be verified by admin';
        </script>
  
        ";
    ?>
      <META HTTP-EQUIV="Refresh" CONTENT="4; URL=http://localhost/ems_proposal/employee/leave_req.php">

<?php
    }
  }
}
?>