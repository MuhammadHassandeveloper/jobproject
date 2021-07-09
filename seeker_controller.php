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
     add_data();
     break;
     case"login":
        seeker_login();
        break;
     case"edit":
     edit_data();
     break;
     case"delete":
     delete_data();
     break;
}



function add_data()
{
    global $connection;
    if (isset($_POST['signup'])) {
        $name="";
        $Phone="";
        $email="";
        $password="";
        $valid=true;
    
        if ($_POST['name']=="") {
            $_SESSION['name']= "fname field is required";
            $valid=false;
            header("Location:seeker_signup.php");
        } elseif (preg_match("/^[a-zA-Z-']*$/", $_POST['name'])) {
            $name=$_POST['name'];
        //  echo $name;
        } else {
            $_SESSION['name']="fname must  contains only letters";
            $valid=false;
            header("Location:seeker_signup.php");
        }
    

    
        if ($_POST['phone']=="") {
            $_SESSION['phone']="phone field is required";
            $valid=false;
            header("Location:seeker_signup.php");
        } elseif (strlen($_POST['phone'])==11) {
            $phone=$_POST['phone'];
            $sql="SELECT phone FROM job_seekers WHERE phone='$phone'";
            $res=mysqli_query($connection, $sql);
            $row1=mysqli_num_rows($res);
            if ($row1>0) {
                $_SESSION['phone']= "This $phone is already exists";
                $valid=false;
            }
        } else {
            $_SESSION['phone']="phone must  contains 11 integers";
            $valid=false;
            header("Location:seeker_signup.php");
        }
    
    
        if ($_POST['email']=="") {
            $_SESSION['email']= "email field is required";
            $valid=false;
        } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email=$_POST['email'];
            $sql="SELECT email FROM job_seekers WHERE email='$email'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $_SESSION['email']= "This $email is already exists";
            }
            $email=$_POST['email'];
            $sql="SELECT Email FROM employees WHERE Email='$email'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $_SESSION['email']= "you already signup as employeer with this Email $email choose different";
                $valid=false;
                header("Location:seeker_signup.php");
            }
        } else {
            $_SESSION['email']="Enter Valid Email";
            $valid=false;
        }
    
        if ($_POST['password']=="") {
            $_SESSION['password']="password field is required";
            $valid=false;
        } elseif (strlen($_POST['password'])>4) {
            $password=$_POST['password'];
        // echo $password;
        } else {
            $_SESSION['password']= "password must be 5 digits";
            $valid=false;
        }
       
        if ($valid) {
            $query1="INSERT INTO `job_seekers`( `name`,`phone`,`email`,`password`) VALUES('$name','$phone','$email','$password')";
            global $connection;
          
            $result= mysqli_query($connection, $query1);
            if ($result) {
                $_SESSION['successmsg']="signup successfully";
                header("location:seeker_login.php");
            } else {
                $_SESSION['errormsg']="data not insert";
                header("Location:seeker_signup.php");
            }
        }
    }
}

function seeker_login()
{
    global $connection;
    if (isset($_POST['login'])) {
        $email="";
        $password="";
        $valid=true;
        if ($_POST['email']=="") {
            $_SESSION['emaill']= "email field is required";
            $valid=false;
        } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email=$_POST['email'];
        } else {
            $_SESSION['emaill']="Enter Valid Email";
            $valid=false;
        }
        if ($_POST['password']=="") {
            $_SESSION['password']="password field is required";
            $valid=false;
        } elseif (strlen($_POST['password'])>4) {
            $password=$_POST['password'];
        // echo $password;
        } else {
            $_SESSION['password']= "password must be 5 digits";
            $valid=false;
        }
        if ($valid) {
            $sql="SELECT s_id,name FROM job_seekers WHERE email='$email'&& password='$password'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $arr=mysqli_fetch_assoc($data);
                $_SESSION['seeker_id']=$arr['s_id'];
                $_SESSION['seeker_name']=$arr['name'];
                header("Location:index.php");
            } else {
                $_SESSION['errormsg']="password or email wrong";
                header("Location:seeker_login.php");
            }
        }
    }
}
function edit_data()
{
    echo "edit data function";
}function delete_data()
{
    echo "delete data function";
}