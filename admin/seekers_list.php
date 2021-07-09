<?php
session_start();
require_once("includes/db_connect.php");
if(!isset($_SESSION['admin_id']))
{
    header("Location:login.php");
}

if(isset($_GET['sid']))
{
    $sid=$_GET['sid'];
    $sql="DELETE FROM job_seekers WHERE s_id='$sid'";
    $res=mysqli_query($connection,$sql);
    if($res)
    {
        echo "Delete";
    }
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
        <!-- table area -->
        <section class="table_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title"><span>All Employers List</span></div>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
<?php
$sql="SELECT * FROM job_seekers";
$res=mysqli_query($connection,$sql);
foreach($res as $row)
{
?>
                              <tr>
                                  <td><?php  echo $row['s_id']     ?></td>
                                  <td><?php  echo $row['name']     ?></td>
                                  <td><?php  echo $row['phone']     ?></td>
                                  <td><?php  echo $row['email']     ?></td>
                                  <td>
                                   <a class="btn btn-md btn-danger center" href="seekers_list.php?sid=<?php echo $row['s_id']      ?>">Delete</a>
                                  </td>
                              </tr>
                              <?php  } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- /table -->
            
        </section>                   
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