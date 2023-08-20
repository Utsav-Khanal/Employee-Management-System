<?php
include ("../database/connection.php");
session_name('admin_session');
session_start();
error_reporting(0);

$id = $_GET['id'];
$query = "DELETE FROM register WHERE id = '$id'";
$data = mysqli_query($conn, $query);

if($data){

    echo "<script>alert('Record Deleted')</script>"

    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0.1; URL=http://localhost/ems_proposal/admin/userApproval.php">

<?php
}
else{
    echo "<font color='red'>Failed to Delete Records from database";
}
?>
