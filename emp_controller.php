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
        emp_login();
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
        $company_name="";
        $wesite_link="";
        $phone="";
        $email="";
        $password="";
        $valid=true;
    
        if ($_POST['Name']=="") {
            $_SESSION['Name']= "fname field is required";
            $valid=false;
            header("Location:emp_signup.php");
        } elseif (preg_match("/^[a-zA-Z-']*$/", $_POST['Name'])) {
            $name=$_POST['Name'];
        } else {
            $_SESSION['Name']="fname must  contains only letters";
            $valid=false;
            header("Location:emp_signup.php");
        }
    
        if ($_POST['Company_name']=="") {
            $_SESSION['Company Name']= "fname field is required";
            $valid=false;
            header("Location:emp_signup.php");
        } else {
            $company_name=$_POST['Company_name'];
        }
    
        if ($_POST['website_link']=="") {
            $_SESSION['Share website Link']= "fname field is required";
            $valid=false;
            header("Location:emp_signup.php");
        } else {
            $website_link=$_POST['website_link'];
        }
             
               
    
        if ($_POST['Phone']=="") {
            $_SESSION['Phone']="phone field is required";
            $valid=false;
        } elseif (strlen($_POST['Phone'])==11) {
            $phone=$_POST['Phone'];
            $sql="SELECT Phone FROM employees WHERE Phone='$phone'";
            $res=mysqli_query($connection, $sql);
            $row1=mysqli_num_rows($res);
            if ($row1>0) {
                $_SESSION['Phone']= "This $phone is already exists";
            }
        } else {
            $_SESSION['Phone']="phone must  contains 11 integers";
            $valid=false;
        }
    
    
        if ($_POST['Email']=="") {
            $_SESSION['Email Address']= "email field is required";
            $valid=false;
        } elseif (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            $email=$_POST['Email'];
            $sql="SELECT Email FROM employees WHERE Email='$email'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $_SESSION['Email  Address']= "This $email is already exists";
                $valid=false;
            }
            $email=$_POST['Email'];
            $sql="SELECT email FROM job_seekers WHERE email='$email'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $_SESSION['Email Address']= "you already signup as jobseeker with this Email $email choose different";
                $valid=false;
                header("Location:emp_signup.php");
            }
        } else {
            $_SESSION['Email  Address']="Enter Valid Email";
            $valid=false;
        }
    
        if ($_POST['Password']=="") {
            $_SESSION['Password']="password field is required";
            $valid=false;
        } elseif (strlen($_POST['Password'])>4) {
            $password=$_POST['Password'];
        // echo $password;
        } else {
            $_SESSION['Password']= "password at least 5 digits";
            $valid=false;
        }
        $logo=$_FILES['logo'];
        $logoname=$logo['name'];
        move_uploaded_file($logo['tmp_name'], 'images/'.$logoname);
        if ($valid) {
            $query1="INSERT INTO `employees`( `Name`, `Company_name`,`website_link`,`Phone`,`Email`,`Password`,`Logo`) VALUES('$name','$company_name','$website_link','$phone','$email','$password','$logoname')";
            global $connection;
            $result= mysqli_query($connection, $query1);
            if ($result) {
                $_SESSION['successmsg']="signup successfully";
                header("location:emp_login.php");
            } else {
                $_SESSION['errormsg']="data not insert";
                header("Location:emp_signup.php");
            }
        }
    }
}

function emp_login()
{
    global $connection;
    if (isset($_POST['login'])) {
        $EmailAddress="";
        $Password="";
        $valid=true;
        if ($_POST['Email']=="") {
            $_SESSION['EmailAddress']= "email field is required";
            $valid=false;
        } elseif (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            $EmailAddress=$_POST['Email'];
        } else {
            $_SESSION['EmailAddressl']="Enter Valid Email";
            $valid=false;
        }
        if ($_POST['Password']=="") {
            $_SESSION['Password']="password field is required";
            $valid=false;
        } elseif (strlen($_POST['Password'])>4) {
            $Password=$_POST['Password'];
        // echo $password;
        } else {
            $_SESSION['Password']= "password at least 5 digits";
            $valid=false;
        }
        if ($valid) {
            $sql="SELECT e_id,Name FROM employees WHERE Email='$EmailAddress' && Password='$Password'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $arr=mysqli_fetch_assoc($data);
                $_SESSION['emp_id']=$arr['e_id'];
                $_SESSION['emp_name']=$arr['Name'];
                header("Location:index.php");
            } else {
                $_SESSION['errormsg']="password or email wrong";
                header("Location:emp_login.php");
            }
        }
    }
}
function edit_data()
{
    if (isset($_POST['edit'])) {
        $id=$_POST['e_id'];
        $name=$_POST['name'];
        $company_name=$_POST['company_name'];
        $website_link=$_POST['website_link'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $image=$_FILES['logo'];
        $query="UPDATE employees SET name='$name',company_name='$company_name',website_link='$website_link',phone='$phone',email='$email',password='$password' WHERE e_id='$id'";
        if ($image['name']!="") {
            global $connection;
            //new upload img name
            $imagename=$image['name'];
            $sql2="SELECT `Logo` FROM employees WHERE e_id='$id'";
            $data2=mysqli_query($connection, $sql2);
            $arr=mysqli_fetch_assoc($data2);
            //old table img name
            $imagename2=$arr['Logo'];
            unlink('images/'.$imagename2);
            move_uploaded_file($image['tmp_name'], 'images/'.$imagename);
            $query="UPDATE employees SET name='$name',company_name='$company_name',website_link='$website_link',phone='$phone',email='$email',password='$password',Logo='$imagename' WHERE e_id='$id'";
        }
        global $connection;
        $result= mysqli_query($connection, $query);
        if ($result) {
            header("Location:index.php");
            $_SESSION['successmsg']="successfully updated";
        } else {
            header("Location:emp_edit.php");
            $_SESSION['errormsg']="not updated";
        }
    }
}
function delete_data()
{
    echo "delete data function";
}