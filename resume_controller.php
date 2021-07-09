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
    if (isset($_POST['submit'])) {
        $qualification="";
        $experience="";
        $valid=true;
    
        if ($_POST['qualification']=="") {
            $_SESSION['qualification']= "qualification field is required";
            $valid=false;
            header("Location:resume_add.php");
        }else {
            $qualification=$_POST['qualification'];
        }
        if($_POST['experience']=="") {
            $_SESSION['experience']="experience field is required";
            $valid=false;
        } else {
           $experience=$_POST['experience'];
        }
    

        $file=$_FILES['file'];
        $filename=$file['name'];
        move_uploaded_file($file['tmp_name'], 'files/'.$filename);
        if ($valid) {
            $u_id=$_SESSION['seeker_id'];
            $query1="INSERT INTO `resume`(`s_id`,`qualification`,`file`,`experience`) VALUES('$u_id','$qualification','$filename','$experience')";
            global $connection;
            $result= mysqli_query($connection, $query1);
            if ($result) {
                $_SESSION['successmsg']="added successfully";
                header("locatiion:resume_manage.php");
            } else {
                $_SESSION['errormsg']="data not insert";
                header("Location:resume_add.php");
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
            $sql="SELECT e_id,qualification FROM employees WHERE Email='$EmailAddress' && Password='$Password'";
            $data=mysqli_query($connection, $sql);
            $row=mysqli_num_rows($data);
            if ($row>0) {
                $arr=mysqli_fetch_assoc($data);
                $_SESSION['emp_id']=$arr['e_id'];
                $_SESSION['emp_qualification']=$arr['qualification'];
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
        $qualification=$_POST['qualification'];
        $company_qualification=$_POST['company_qualification'];
        $website_link=$_POST['website_link'];
        $experience=$_POST['experience'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $image=$_FILES['logo'];
        $query="UPDATE employees SET qualification='$qualification',company_qualification='$company_qualification',website_link='$website_link',experience='$experience',email='$email',password='$password' WHERE e_id='$id'";
        if ($image['qualification']!="") {
            global $connection;
            //new upload img qualification
            $imagequalification=$image['qualification'];
            $sql2="SELECT `Logo` FROM employees WHERE e_id='$id'";
            $data2=mysqli_query($connection, $sql2);
            $arr=mysqli_fetch_assoc($data2);
            //old table img qualification
            $imagequalification2=$arr['Logo'];
            unlink('images/'.$imagequalification2);
            move_uploaded_file($image['tmp_qualification'], 'images/'.$imagequalification);
            $query="UPDATE employees SET qualification='$qualification',company_qualification='$company_qualification',website_link='$website_link',experience='$experience',email='$email',password='$password',Logo='$imagequalification' WHERE e_id='$id'";
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