<?php
session_start();
require_once("includes/db_connect.php");
if (isset($_GET['action'])&& $_GET['action']!='') {
$action=$_GET['action'];
} else {
'';
}

switch ($action) {
case"add":
 add_job();
 break;
 case"edit":
 edit_data();
 break;
 case"delete":
 delete_data();
 break;
}
function add_job()
{
    global $connection;
    if(isset($_SESSION['seeker_id']))
    {
        $jid=$_GET['jid'];
        $sid=$_GET['sid'];
        $sql="SELECT file FROM resume WHERE s_id='$sid'";
        $res=mysqli_query($connection,$sql);
        $row=mysqli_num_rows($res);
        {
            if(!$row>0)
            {
                $_SESSION['errormsg']="First u Provide Resume Details";
               header("Location:index.php");
            }   
        }
        $sql="SELECT * FROM applied_jobs WHERE job_id='$jid'AND s_id='$sid'";
        $res=mysqli_query($connection,$sql);
        $row=mysqli_num_rows($res);
        if($row>0)
        {
            $_SESSION['errormsg']="Alraedy Applied for This Job";
           header("Location:index.php");
        }
        else{
         $sql="INSERT INTO `applied_jobs`(`job_id`, `s_id`) VALUES('$jid','$sid')";
            $res=mysqli_query($connection,$sql);
            if($res)
            {
                $_SESSION['successmsg']="Successfully Applied";
                header("Location:index.php");
            }
        }
    }
    else
    {
        $_SESSION['errormsg']="First Login Please?";
                header("Location:seeker_login.php");
    }
}
