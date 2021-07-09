<?php
session_start();
require_once("includes/db_connect.php");
if(!isset($_SESSION['admin_id']))
{
    header("Location:login.php");
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="panel/assets/images/favicon.png" >
        <!--Page title-->
        <title>Admin easy Learning</title>
        <!--bootstrap-->
        <link rel="stylesheet" href="panel/assets/css/bootstrap.min.css">
        <!--font awesome-->
        <link rel="stylesheet" href="panel/assets/css/all.min.css">
        <!-- metis menu -->
        <link rel="stylesheet" href="panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css">
        <link rel="stylesheet" href="panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css">
        <!-- chart -->
   
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="panel/assets/css/style.css">
    </head>
    <body id="page-top">
        <div class="wrapper">
         <?php   

  require_once("includes/header.php");
?>
          
        
          <?php   

require_once("includes/sidebar.php");
?>
      
<div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                             <span><i class="fa fa-code"></i></span>
                             <?php 
                             $sql="SELECT job_id FROM jobs";
                             $res=mysqli_query($connection,$sql);
                              $rows=mysqli_num_rows($res);
                             ?>

                              <h2 class="timer count-number" data-to="<?php echo $rows   ?>" data-speed="1500"></h2>
                              <?php  ?>
                        </div>
                     
                       <p class="count-text ">Total Jobs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fa fa-coffee"></i></span>
                            <?php 
                             $sql="SELECT aj_id FROM applied_jobs";
                             $res=mysqli_query($connection,$sql);
                              $rows=mysqli_num_rows($res);
                             ?>
                             <h2 class="timer count-number" data-to="<?php echo $rows  ?>" data-speed="1500"></h2>
                             <?php ?>
                        </div>
                        <p class="count-text ">Total Applied Jobs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fas fa-user"></i></span>
                            <?php 
                             $sql="SELECT e_id FROM  employees";
                             $res=mysqli_query($connection,$sql);
                              $rows=mysqli_num_rows($res);
                             ?>
                             <h2 class="timer count-number" data-to="<?php  echo $rows     ?>" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">Total Employers</p>
                          
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fa fa-bug"></i></span>
                            <?php 
                             $sql="SELECT s_id FROM job_seekers";
                             $res=mysqli_query($connection,$sql);
                              $rows=mysqli_num_rows($res);
                             ?>
                             <h2 class="timer count-number" data-to="<?php   echo $rows  ?>" data-speed="1500"></h2>
                        </div>
                         <p class="count-text ">Total Job Seekers</p>
                    </div>
                </div>
            </div>
        </section>
        <!--/ counter_area -->
   
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->










        </div><!--/ wrapper -->


        
        <!-- jquery -->
        <script src="panel/assets/js/jquery.min.js"></script>
        <!-- popper Min Js -->
        <script src="panel/assets/js/popper.min.js"></script>
        <!-- Bootstrap Min Js -->
        <script src="panel/assets/js/bootstrap.min.js"></script>
        <!-- Fontawesome-->
        <script src="panel/assets/js/all.min.js"></script>
        <!-- metis menu -->
        <script src="panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js"></script>
        <script src="panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js"></script>
        <!-- nice scroll bar -->
        <script src="panel/assets/plugins/scrollbar/jquery.nicescroll.min.js"></script>
        <script src="panel/assets/plugins/scrollbar/scroll.active.js"></script>
        <!-- counter -->
        <script src="panel/assets/plugins/counter/js/counter.js"></script>
        <!-- chart -->
   <script src="panel/assets/plugins/chartjs-bar-chart/Chart.min.js"></script>
        <script src="panel/assets/plugins/chartjs-bar-chart/chart.js"></script>
        <!-- pie chart -->
        <script src="panel/assets/plugins/pie_chart/chart.loader.js"></script>
        <script src="panel/assets/plugins/pie_chart/pie.active.js"></script>
 
 
        <!-- Main js -->
        <script src="panel/assets/js/main.js"></script>

    
     


    </body>
</html>