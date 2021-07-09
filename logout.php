<?php
session_start();
if(isset($_SESSION['seeker_id']))
{
    session_destroy();
    header("Location:seeker_login.php");
    session_start();
}

?>
<?php
if(isset($_SESSION['emp_id']))
{
    session_destroy();
    header("Location:emp_login.php");
    session_start();
}

?>