<?php
include("database/connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">

    <!--FontAwsome-->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

</head>

<body>
    <header>
        <img class="logo" src="images/logo.png" alt="logo">
        <nav class="nav">
            <ul class="nav_links">
                <li><a href="home.php">Home</a></li>
                <li><a href="employee/emp_login.php">Employee Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="admin/admin_login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>

    <!--Registration-->
    <div class="container">
        <h2>Registration Form</h2>
        <p id="fieldErr" style="text-align:center; color:red; font-size:15px; font-weight:bold;"></p>
        <p id="success" style="text-align:center; color:green; font-size:15px; font-weight:bold;"></p>
        <div class="form-container">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="input-name">
                    <p id="fnameErr" style="text-align: left; font-size:12px"></p>
                    <i class="fa fa-user lock"></i>
                    <input type="text" placeholder="First Name" class="name" id="fname" name="fname" value="<?php echo (isset($_POST['fname'])) ? $_POST['fname'] : "" ?>">

                    <span>
                        <p id="lnameErr" style="text-align: left; font-size:12px"></p>
                        <i class="fa fa-user lock"></i>
                        <input type="text" placeholder="Last Name" class="name" id="lname" name="lname" value="<?php echo (isset($_POST['lname'])) ? $_POST['lname'] : "" ?>">
                    </span>
                </div>

                <div class="input-name">
                    <p id="emailErr" style="text-align: left; font-size:12px"></p>
                    <i class="fa fa-envelope email"></i>
                    <input type="email" placeholder="Email" class="text-name" id="email" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : "" ?>">
                </div>

                <div class="input-name">
                    <p id="passwordErr" style="text-align: left; font-size:12px"></p>
                    <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Password" class="text-name" id="password" name="pass" value="<?php echo (isset($_POST['pass'])) ? $_POST['pass'] : "" ?>">
                </div>

                <div class="input-name">
                    <p id="conpassErr" style="text-align: left; font-size:12px"></p>
                    <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Confirm Password" class="text-name" id="conpass" name="conpass" value="<?php echo (isset($_POST['conpass'])) ? $_POST['conpass'] : "" ?>">
                </div>

                <div class="input-name">
                    <select name="department">
                        <option selected hidden value=""> Select Department</option>
                        <option value="account">Account</option>
                        <option value="customer_service">Customer Service</option>
                        <option value="it_depart">IT Department</option>
                    </select>

                </div>

                <div class="input-name">
                    <input type="radio" class="radio-button" name="gender" value="male">
                    <label class="radio-button">Male</label>

                    <input type="radio" class="radio-button" name="gender" value="female">
                    <label>Female</label>
                </div>

                <select name ="user_type" hidden>
                    <option value="user">User</option>
                </select>

                <select name ="status_reg" hidden>
                    <option value="pending">Pending</option>
                </select>  

               
                <div class="input-name">
                    <label for="">Upload Profile Picture</label>
                <input type="file" name="user_Image_Upload">
                </div>
                 
                <div class="input-name">
                    <input type="submit" class="reg-button" id="reg-button" value="Register" name="submit">
                    <p>Already have an account? <a class="login-link" href="employee/emp_login.php">Login</p></a>
                </div>

                

            </form>
        </div>
    </div>

    <script src="js/script.js"></script>

</body>

</html>

<?php
//Fetching Form Data
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];
    $hashedPd = md5($pass);
    $hashedConpass = md5($conpass);
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $user_type = $_POST['user_type'];
    $status_reg = $_POST['status_reg'];
    date_default_timezone_set('Asia/Kathmandu');
    $timestamp = date("Y-m-d H:i:s");

    $filename = $_FILES["user_Image_Upload"] ["name"];
    $tempname = $_FILES["user_Image_Upload"] ["tmp_name"];
    $folder = "emp_images/".$filename;
    move_uploaded_file($tempname,$folder);


    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($conpass) || empty($gender) || empty($department) || empty($filename)) {

        echo "
            <script>
            const fieldErr = document.getElementById('fieldErr');
            fieldErr.innerHTML='Please fill out all the fields';
            </script>
            
            ";

    } else {
        //Check if password and confirm password match
        if ($pass !== $conpass) {
            echo "
                    <script>
                    const fieldErr = document.getElementById('fieldErr');
                    fieldErr.innerHTML='Check password and Confirm Password';
                    </script>
                    
                    ";
        } 
        
        else {

            $sql = "SELECT * FROM register WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

           if($row['status'] == 'rejected')
            {
                
                 echo "
                    <script>
                    const fieldErr = document.getElementById('fieldErr');
                    fieldErr.innerHTML='Your Account is rejected!..Contact to Administrator';
                    </script>
                    
                    ";   
            }
            elseif($row['status'] == 'pending')
            {
                
                 echo "
                    <script>
                    const fieldErr = document.getElementById('fieldErr');
                    fieldErr.innerHTML='Your Account is pending for approval!';
                    </script>
                    
                    ";   
            }

            elseif (mysqli_num_rows($result) > 0) {
                //Email already exists in database
                echo "
                    <script>
                    alert('Email Already Exist!..Login to Proceed..')
                    </script>
                    
                    ";    
                ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/ems_proposal/employee/emp_login.php">

                <?php  

            }
            
            else {

                $query = "INSERT INTO register VALUES ('', '$fname','$lname','$email','$hashedPd','$hashedConpass','$department','$gender','$user_type','$status_reg','$timestamp','$filename')";

                $data = mysqli_query($conn, $query);

                if ($data) {
                    echo "
                    <script>
                    const success = document.getElementById('success');
                    success.innerHTML='Registration Successfull!..Wait For Account Approval';
                    </script>
                    
                    ";
                ?>
                    <META HTTP-EQUIV="Refresh" CONTENT="5; URL=http://localhost/ems_proposal/register.php">

                <?php
                  
                }
            }
            
        }
        
    }

}


?>