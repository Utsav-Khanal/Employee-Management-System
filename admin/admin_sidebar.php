<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
     <!-- Boxicons CSS -->
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title></title>
    <link rel="stylesheet" href="../css/panel.css" />

</head>

<body>

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
                        <a href="manage_employee.php" class="nav_link sublink">Manage Employee</a>
                        <a href="#" class="nav_link sublink">Manage Leave</a>
                        <!-- <a href="#" class="nav_link sublink">Manage Payroll</a> -->

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



</body>

</html>