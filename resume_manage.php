<?php
session_start();
    require_once("includes/db_connect.php");

    ?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.app/job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:55:13 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajo HTML5 Responsive Template</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png" sizes="32x32">
    <!-- All CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/magnific.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/slimmenu.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</head>

<body>
    <!--header-start -->
    <?php
  if (isset($_SESSION['emp_id'])) {
      require_once("includes/emp_header.php");
  } elseif (isset($_SESSION['seeker_id'])) {
      require_once("includes/seeker_header.php");
  } else {
      require_once("includes/header.php");
  }
  ?>
    <div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Showing all jobs</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.php">Home</a></li>
                            <li class="list-inline-item">Manage Resume</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="main-content-area pt-100 pb-100 job-bar-static">
        <div class="job-list-area ">
        <div class="container">
<table class="table table-bordered">
<?php
      $s_id = $_SESSION['seeker_id'];
      $my="SELECT file FROM resume WHERE s_id='$s_id'";
      $results =mysqli_query($connection,$my);
      $res =mysqli_num_rows($results);
      if ($res > 0) {
        $id = $_SESSION['seeker_id'];
        echo '<h4 class="mb-10">Manage Detail</h4>';
        echo '<a title="Edit" href="resume_edit.php?&id=' . $s_id . '" class="btn btn-sm bg-info p-3 mb-2 text-light ml-2">' . 'edit Resume' . '</a>';
      } else {
        echo '<h2 class="mb-10">Manage Detail';
        echo '<a href="resume_add.php" class="btn btn-sm bg-info p-3 mb-2 text-light ml-2">Add Resume Detail</a></h2>';
      }
      ?>

  <thead>
    <tr>
    <th scope="col">Name</th>
    <th scope="col">Phone</th>
      <th scope="col">Qualification</th>
      <th scope="col">experience</th>
    </tr>
  </thead>
  <tbody>
  <?php
                                $s_id=$_SESSION['seeker_id'];
                            $sql="SELECT job_seekers.*,resume.* FROM job_seekers INNER JOIN resume ON job_seekers.s_id=resume.s_id WHERE job_seekers.s_id='$s_id'";

                            $res=mysqli_query($connection, $sql);
                            foreach ($res as $row) {
                                ?>
    <tr>
    <th scope="row"><?php    echo $row['name']  ?></th>
    <th scope="row"><?php    echo $row['phone']  ?></th>
      <th scope="row"><?php    echo $row['qualification']  ?></th>
      <td colspan="2"><?php    echo $row['experience']  ?></td>
    </tr>
    <?php   }   ?>
  </tbody>
</table>

</div>

   </div>
    </main>
    <!--footer-area-start -->
    <footer>
        <div class="footer-area pt-100 pb-100 clearfix minus-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <a href="index.php"><img src="assets/images/footer-logo.png" alt="image" /></a>
                            </div>
                            <p>Cras semper auctor neque vitae tempus quam pellentesque nec nam aliquam sem et tortor
                                consequat id porta nibh venenatis cras sed felis eget </p>
                            <div class="social-link mt-4">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>

                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h3>Candidates</h3>
                            </div>
                            <div class="widget-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Browse Jobs</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Submit
                                            Resume</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>My Bookmarks</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Job Alerts</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h3>Employers</h3>
                            </div>
                            <div class="widget-link">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Employers</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Add Job</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Jobs Listing</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Employers
                                            Grid</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Employer
                                            Listing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h3>Subscribe Us</h3>
                            </div>
                            <div class="widget-text">
                                <form action="#">
                                    <input type="email" placeholder="Your Email" />
                                    <button type="submit" class="buttonfx curtainup">Subscribe</button>
                                </form>
                                <p>Nceptos, nulla dictumst neque nam aliquam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bottom text-center">
                            <p>&copy; Copyright - 2019 trabajo - Designed By <a href="#">Themeix</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-area-end -->
    <!-- ==================== START PRELOADER HERE ===================================== -->

    <!-- ==================== END PRELOADER HERE ===================================== -->
    <!-- ====================ALL JS FILE HERE===================================== -->
    <!-- jQuery -->
    <script src="assets/js/modules/jquery-3.4.1.min.js"></script>
    <script src="assets/js/modules/bootstrap.min.js"></script>
    <script src="assets/js/modules/proper.js"></script>
    <script src="assets/js/modules/jquery.waypoints.min.js"></script>
    <script src="assets/js/modules/owl.carousel.min.js"></script>
    <script src="assets/js/modules/magnific.min.js"></script>
    <script src="assets/js/modules/typing.min.js"></script>
    <script src="assets/js/modules/select2.min.js"></script>
    <script src="assets/js/modules/aos.min.js"></script>
    <script src="assets/js/modules/slimmenu.min.js"></script>
    <!-- vendor 
      <script src="assets/js/vendor.min.js"></script>
	   -->
    <script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from html-trabajo.netlify.app/job-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:55:29 GMT -->

</html>