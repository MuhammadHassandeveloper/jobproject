<?php
session_start();
    require_once("includes/db_connect.php");
    ?>

<!DOCTYPE html>
<html lang="en">

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


    <div class="header-banner pt-75 pb-75 clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Single Job Detail</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.php">Home</a></li>
                            <li class="list-inline-item">Job Post</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

$job_id=$_GET['jid'];
$sql="SELECT categories.cat_name,job_experiences.exp_name,job_types.jt_name,qualifications.q_name,employees.*,jobs.* FROM (((((jobs INNER JOIN categories ON jobs.job_category=categories.cat_id)INNER JOIN job_experiences ON jobs.job_experience=job_experiences.exp_id) INNER JOIN job_types ON jobs.job_type=job_types.jt_id)INNER JOIN qualifications ON jobs.job_qualification=qualifications.q_id)INNER JOIN employees ON jobs.e_id=employees.e_id) WHERE job_id='$job_id'";
$res=mysqli_query($connection, $sql);
foreach ($res as $row) {
    ?>

    <main class="main-content-area">
        <div class="job-post-details-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="job-post-wrapper">
                            <div class="single-job mb-4 d-md-flex">
                                <div class="logo">
                                    <a href="job-post.html"><img src="images/<?php  echo $row['Logo']    ?>"
                                            alt="image" /></a>
                                </div>
                                <div class="job-meta">
                                    <div class="title">
                                        <h3><a href="job-post.html">
                                                <?php
                                         echo $row['job_name']
                                        ?></a>
                                        </h3>
                                    </div>
                                    <div class="meta-info d-flex">
                                        <p><i class="fa fa-briefcase" aria-hidden="true"></i> <?php
                                         echo $row['Company_name']
                                        ?></p>
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#"> <?php
                                         echo $row['job_location']
                                        ?></a></p>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php
                                         echo $row['post_date']
                                        ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="entry-content">
                                <h4>Job Description</h4>
                                <?php
                                         echo $row['job_description']; ?>
                            </div>
                            <div class="job-apply-wrapper mb-5 mt-4">
      <a class="btn btn-success" href="applied_jobs_controller.php?action=add&&jid=<?php echo $row['job_id']?>&&sid=<?php if(isset($_SESSION['seeker_id'])){?><?php echo $_SESSION['seeker_id'] ?>
                         <?php } else
                         {
                         }?>
                          ">Apply Now</a>
                            </div>
                        </div>
                     
                    </div>
                    <div class="col-md-4">
                        <div class="right-sidebar">
                            <div class="sidebar-widget mb-4">
                                <div class="sidebar-title">
                                    <h3>Job Overview</h3>
                                </div>
                                <div class="sidebar-details">
                                    <div class="single-overview  d-flex">
                                        <div class="icon"><i class="fa fa-calendar"></i></div>
                                        <div class="meta-overview">
                                            <p>Date Posted: <span> <?php
                                         echo $row['post_date']
                                        ?></span></p>
                                        </div>
                                    </div>
                                    <div class="single-overview  d-flex">
                                        <div class="icon"><i class="fa fa-phone"></i></div>
                                        <div class="meta-overview">
                                            <p>Expiration date: <span> <?php
                                         echo $row['Expiration_date']
                                        ?></span></p>
                                        </div>
                                    </div>
                                    <div class="single-overview  d-flex">
                                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                                        <div class="meta-overview">
                                            <p>Location <span> <?php
                                         echo $row['job_location']
                                        ?></span></p>
                                        </div>
                                    </div>
                                    <div class="single-overview  d-flex">
                                        <div class="icon"><i class="fa fa-clock-o"></i></div>
                                        <div class="meta-overview">
                                            <p>Job title <span> <?php
                                         echo $row['job_name']
                                        ?></span></p>
                                        </div>
                                    </div>
                                    <div class="single-overview  d-flex">
                                        <div class="icon"><i class="fa fa-user"></i></div>
                                        <div class="meta-overview">
                                            <p>Salary: <span> <?php
                                         echo $row['job_salary']
                                        ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-4">
                                <div class="sidebar-title">
                                    <h3>Employeer Info</h3>
                                </div>
                                <div class="sidebar-details">
                                    <div class="contact-details  d-flex">
                                        <div class="icon"><i class="fa fa-calendar"></i></div>
                                        <div class="contact-info">
                                            <p>Email: <span> <?php
                                         echo $row['Email']
                                        ?></span></p>
                                        </div>
                                    </div>
                                    <div class="contact-details  d-flex">
                                        <div class="icon"><i class="fa fa-phone"></i></div>
                                        <div class="contact-info">
                                            <p>Phone: <span> <?php
                                         echo $row['Phone']
                                        ?></span></p>
                                        </div>
                                    </div>
                                    <div class="contact-details  d-flex">
                                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                                        <div class="contact-info">
                                            <p>Location: <span> <?php
                                         echo $row['job_location']
                                        ?></span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>



    <?php
} ?>
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

<!-- Mirrored from html-trabajo.netlify.app/job-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:55:29 GMT -->

</html>