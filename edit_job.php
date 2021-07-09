<?php
session_start();
    require_once("includes/db_connect.php");
    ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.app/post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:55:29 GMT -->
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
    <!--header-end -->
    <div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Post a job</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.php">Home</a></li>
                            <li class="list-inline-item">Post Job</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="main-content-area clearfix">
        <div class="post-job-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" post-form form-bg">
                            <div class="info-title mb-3">
                                <h3>Job Post Form</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                global $connection;
                                $j_id=$_GET['jid'];
                            $sql="SELECT categories.cat_name,job_experiences.exp_name,job_types.jt_name,qualifications.q_name,jobs.* FROM ((((jobs INNER JOIN categories ON jobs.job_category=categories.cat_id)INNER JOIN job_experiences ON jobs.job_experience=job_experiences.exp_id) INNER JOIN job_types ON jobs.job_type=job_types.jt_id)INNER JOIN qualifications ON jobs.job_qualification=qualifications.q_id) WHERE jobs.job_id='$j_id'";
                            $res=mysqli_query($connection, $sql);
                            foreach ($res as $row) {
                                ?>




                                    <form action="jobs_controller.php?action=edit" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" class="form-control" id="jobname"
                                                    placeholder="Enter the name of  job"
                                                    value="<?php echo $row['job_id']    ?>" name="job_id">


                                                <input type="text" class="form-control" id="jobname"
                                                    placeholder="Enter the name of  job"
                                                    value="<?php echo $row['job_name']    ?>" name="name">
                                                <?php
             if (isset($_SESSION['name'])) {
                 ?>
                                                <span class="msg" style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['name']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="jobname"
                                                    placeholder="Enter the location of job "
                                                    value="<?php echo $row['job_location']   ?>" name="location">
                                                <?php
             if (isset($_SESSION['location'])) {
                 ?>
                                                <span class="msg" style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['location']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jobcat">Job Category</label>
                                                <select id="jobcat" class="form-control custom-select"
                                                    name="job_category">
                                                    <?php
                                                    global $connection;
                                $sql="SELECT * FROM categories";
                                $data=mysqli_query($connection, $sql);
                                foreach ($data as $row1) {
                                    ?>
                                                    <option value="<?php  echo $row1['cat_id']  ?>">
                                                        <?php  echo $row1['cat_name']  ?></option>
                                                    <?php
                                } ?>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jobcat">Job Type</label>
                                                <select id="jobcat" class="form-control custom-select" name="job_type">
                                                    <?php
                                                    global $connection;
                                $sql="SELECT * FROM job_types";
                                $data=mysqli_query($connection, $sql);
                                foreach ($data as $row2) {
                                    ?>
                                                    <option value=" <?php  echo $row2['jt_id']  ?>">
                                                        <?php  echo $row2['jt_name']  ?></option>
                                                    <?php
                                } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="jobDescription">Job Description</label>
                                                <textarea class="form-control" id="jobDescription" rows="13"
                                                    name="description">
                                                    <?php echo $row['job_description']?>
                                                    </textarea>
                                                <?php
             if (isset($_SESSION['description'])) {
                 ?>
                                                <span style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['description']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jobexp">What level of experience?</label>
                                                <select id="jobexp" class="form-control custom-select"
                                                    name="job_experience">
                                                    <?php echo $row['job_experience']  ?>
                                                    <?php
                                                    global $connection;
                                $sql="SELECT * FROM job_experiences";
                                $data=mysqli_query($connection, $sql);
                                foreach ($data as $row3) {
                                    ?>
                                                    <option value=" <?php  echo $row3['exp_id']  ?>">
                                                        <?php  echo $row3['exp_name']  ?></option>
                                                    <?php
                                } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="jobexp">What level of qualification?</label>
                                                <select id="jobexp" class="form-control custom-select"
                                                    name="job_qualification">
                                                    <?php
                                                    global $connection;
                                $sql="SELECT * FROM qualifications";
                                $data=mysqli_query($connection, $sql);
                                foreach ($data as $row4) {
                                    ?>
                                                    <option value=" <?php  echo $row4['q_id']  ?>">
                                                        <?php  echo $row4['q_name']  ?></option>
                                                    <?php
                                } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sallary">Sallary </label>
                                                <input type="text" name="sallary" class="form-control" id="sallary"
                                                    name="sallary" value="<?php echo $row['job_salary']   ?>">
                                                <?php
             if (isset($_SESSION['sallary'])) {
                 ?>
                                                <span class="msg" style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['sallary']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="sallary">Vaccancies </label>
                                                <input type="number" name="vaccancies" class="form-control" id="sallary"
                                                    value="<?php echo $row['vaccancies']?>">

                                                <?php
             if (isset($_SESSION['vaccancies'])) {
                 ?>
                                                <span class="msg" style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['vaccancies']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sallary">Post date </label>
                                                <input type="date" name="p_date" class="form-control" id="sallary"
                                                    value="<?php echo $row['post_date'] ?>">
                                                <?php
             if (isset($_SESSION['p_date'])) {
                 ?>
                                                <span class="msg" style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['p_date']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="joblocation">Expiration date</label>
                                                <input type="date" class="form-control" id="joblocation" name="exp_date"
                                                    value="<?php echo $row['Expiration_date']   ?>">
                                                <?php
             if (isset($_SESSION['exp_date'])) {
                 ?>
                                                <span class="msg" style="color:red; font-size:15px;">
                                                    <?php     echo $_SESSION['exp_date']; ?>

                                                </span>
                                                <?php
             } ?>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary job-post-btn btn-lg btn-block "
                                            name="editjob">Edit your
                                            job</button>
                                    </form>
                                    <?php
                            } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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

    <script>
    var msg = document.querySelectorAll(".msg");
    setTimeout(function() {
        for (let m of msg) {
            m.remove();
        }
    }, 6000);
    </script>

</body>


<!-- Mirrored from html-trabajo.netlify.app/post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:55:29 GMT -->

</html>