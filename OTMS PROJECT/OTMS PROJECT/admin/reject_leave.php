<?php
include('../includes/config.php');
$query = "update leaves set status = 'Rejected' where id = $_GET[id]";
$query_run = mysqli_query($connection,$query);
if($query_run){
    echo "<script type='text/javascript'>
    alert('leave status updated successfully...');
    window.location.href = 'admin_dashboard.php';
    </script>";
}
else {
    echo "<script type='text/javascript'>
    alert('Error Please Try Again...');
    window.location.href = 'admin_dashboard.php';
    </script>";
}
