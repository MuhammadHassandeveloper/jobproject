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
    if (isset($_POST['addjob'])) {
        $name="";
        $location="";
        $job_category="";
        $job_type="";
        $description="";
        $job_experience="";
        $job_qualification="";
        $sallary="";
        $p_date="";
        $exp_date="";
        $vaccancies="";
        $valid=true;
        
        if ($_POST['name']=="") {
            $_SESSION['name']= "fname field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $name=$_POST['name'];
        }
        if ($_POST['location']=="") {
            $_SESSION['location']= "location field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $location=$_POST['location'];
        }



        if ($_POST['job_category']=="") {
            $_SESSION['job_category']= "job_category field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_category=$_POST['job_category'];
        }
        if ($_POST['job_type']=="") {
            $_SESSION['job_type']= "job_type field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_type=$_POST['job_type'];
        }

        if ($_POST['description']=="") {
            $_SESSION['description']= "description field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $description=$_POST['description'];
            $description=str_replace("'", "''", $description);
        }

        if ($_POST['job_experience']=="") {
            $_SESSION['job_experience']= "job_experience field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_experience=$_POST['job_experience'];
        }


        if ($_POST['job_qualification']=="") {
            $_SESSION['job_qualification']= "job_qualification field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_qualification=$_POST['job_qualification'];
        }

        if ($_POST['sallary']=="") {
            $_SESSION['sallary']= "sallary field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $sallary=$_POST['sallary'];
        }

        if ($_POST['p_date']=="") {
            $_SESSION['p_date']= "p_date field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $p_date=$_POST['p_date'];
        }

        if ($_POST['exp_date']=="") {
            $_SESSION['exp_date']= "exp_date field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $exp_date=$_POST['exp_date'];
        }
        if ($_POST['vaccancies']=="") {
            $_SESSION['vaccancies']= "Vaccancies field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $vaccancies=$_POST['vaccancies'];
        }
        if ($valid) {
            $eid=$_SESSION['emp_id'];
            $query1="INSERT INTO `jobs`(`e_id`, `job_name`, `job_description`, `job_location`, `job_category`, `post_date`, `Expiration_date`, `job_type`, `job_experience`, `job_qualification`, `job_salary`, `vaccancies`) VALUES('$eid','$name','$description','$location','$job_category','$p_date','$exp_date','$job_type','$job_experience','$job_qualification','$sallary','$vaccancies')";            global $connection;
          
            $result= mysqli_query($connection, $query1);
            if ($result) {
                $_SESSION['successmsg']="Job Add successfully";
                header("location:manage_jobs.php");
            } else {
                $_SESSION['errormsg']="data not insert";
                header("Location:post_job.php");
            }
        }
    }
}

function edit_data()
{
    global $connection;
    if (isset($_POST['editjob'])) {
        $name="";
        $location="";
        $job_category="";
        $job_type="";
        $description="";
        $job_experience="";
        $job_qualification="";
        $sallary="";
        $p_date="";
        $exp_date="";
        $vaccancies="";
        $valid=true;
        
        if ($_POST['name']=="") {
            $_SESSION['name']= "fname field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $name=$_POST['name'];
        }
        if ($_POST['location']=="") {
            $_SESSION['location']= "location field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $location=$_POST['location'];
    
        }



        if ($_POST['job_category']=="") {
            $_SESSION['job_category']= "job_category field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_category=$_POST['job_category'];
        
        }
        if ($_POST['job_type']=="") {
            $_SESSION['job_type']= "job_type field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_type=$_POST['job_type'];
        
        }

        if ($_POST['description']=="") {
            $_SESSION['description']= "description field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $description=$_POST['description'];
            $description=str_replace("'", "''", $description);
        
        }

        if ($_POST['job_experience']=="") {
            $_SESSION['job_experience']= "job_experience field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_experience=$_POST['job_experience'];
    
        }


        if ($_POST['job_qualification']=="") {
            $_SESSION['job_qualification']= "job_qualification field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $job_qualification=$_POST['job_qualification'];
        
        }

        if ($_POST['sallary']=="") {
            $_SESSION['sallary']= "sallary field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $sallary=$_POST['sallary'];
            
        }

        if ($_POST['p_date']=="") {
            $_SESSION['p_date']= "p_date field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $p_date=$_POST['p_date'];
            
        }

        if ($_POST['exp_date']=="") {
            $_SESSION['exp_date']= "exp_date field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $exp_date=$_POST['exp_date'];
            
        }
        if ($_POST['vaccancies']=="") {
            $_SESSION['vaccancies']= "Vaccancies field is required";
            $valid=false;
            header("Location:post_job.php");
        } else {
            $vaccancies=$_POST['vaccancies'];
            
        }
        if ($valid) {
            $jid=$_POST['job_id'];
            $query1="UPDATE `jobs` SET `job_name`='$name',`job_description`='$description',`job_location`='$location',`job_category`='$job_category',`post_date`='$p_date',`Expiration_date`='$exp_date',`job_type`='$job_type',`job_experience`='$job_experience',`job_qualification`='$job_qualification',`job_salary`='$sallary',`vaccancies`='$vaccancies' WHERE job_id='$jid'";
            global $connection;
            $result= mysqli_query($connection, $query1);
            if ($result) {
                $_SESSION['successmsg']="Job updated successfully";
               // header("location:manage_jobs.php");
            } else {
                $_SESSION['errormsg']="data not update";
                //header("Location:edit_job.php");
            }
        }
    }
}function delete_data()
{
    echo "delete data function";
}