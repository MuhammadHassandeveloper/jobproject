
<?php
session_start();
require_once("includes/db_connect.php");

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:48:17 GMT -->
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
    <?php
  if (isset($_SESSION['emp_id'])) {
      require_once("includes/emp_header.php");
  } elseif (isset($_SESSION['seeker_id'])) {
      require_once("includes/seeker_header.php");
  } else {
      require_once("includes/header.php");
  }
  ?>
    <main class="main-content-area">
        <!--slider-start -->
        <div class="slider-area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <div class="row">
                                <div class="col-md-68 mx-auto">
                                    <div class="slider-text text-center">
                                        <div class="slide-title">
                                            <h1>
                                                <div class="mobile-show">5,000+ Jobs Available</div>
                                                <div class="mobile-hide">5,000+ Jobs <span class="typed"></span> </div>
                                            </h1>
                                            <div class="typed-strings">
                                                <p>Available</p>
                                            </div>
                                            <p>Fusitae risusvol ptatem vitae iaculis gravida, luctus dui fermentum
                                                mauris.</p>
                                        </div>
                                        <div class="slider-btn">
                                            <div class="buttonfx btn-green"><a
                                                    class="shutter-in-horizontal green-border-2" href="#">Apply Now</a>
                                            </div>
                                            <div class="btn-trasparent-green buttonfx curtainup"><a
                                                    class="shutter-in-horizontal green-border-2" href="#">Join with
                                                    Us</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-search-bar">
                                <div class="search-bar text-center">
                                    <form action="#" class="">
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <input type="search" placeholder="Enter Keywords..." />
                                            </div>
                                            <div class="col-md-3">
                                                <select class="custom-multi-select" name="state">
                                                    <option value="" disabled selected>Job Category</option>
                                                    <option value="AL">General</option>
                                                    <option value="AL">Finance</option>
                                                    <option value="AL">Banking</option>
                                                    <option value="AL">Programming</option>
                                                    <option value="AL">NGO</option>
                                                    <option value="WY">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="custom-multi-select" name="state">
                                                    <option value="" disabled selected>Job Type</option>
                                                    <option value="part">Part Time</option>
                                                    <option value="full">Full Time</option>
                                                    <option value="remote">Remote Job</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="buttonfx curtainup">Search Jobs</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--slider-end -->

        <!--work-area-start -->
        
        <!--work-area-end -->
        <!--job-post-area-start -->
        <div class="job-post-area pt-100 bg-color2 pb-100 minus-15 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left">
                            <span>This week's top jobs</span>
                            <h2>Categories Jobs</h2>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-md-12 mx-auto">
                        <div class="job-post-list">

                            <?php
                            $catid=$_GET['catid'];
                            $sql="SELECT categories.cat_name,job_experiences.exp_name,job_types.jt_name,qualifications.q_name,employees.*,jobs.* FROM (((((jobs INNER JOIN categories ON jobs.job_category=categories.cat_id)INNER JOIN job_experiences ON jobs.job_experience=job_experiences.exp_id) INNER JOIN job_types ON jobs.job_type=job_types.jt_id)INNER JOIN qualifications ON jobs.job_qualification=qualifications.q_id)INNER JOIN employees ON jobs.e_id=employees.e_id) WHERE categories.cat_id='$catid'";
$res=mysqli_query($connection, $sql);
                            foreach ($res as $row) {
                                ?>


                            <div class="single-job d-md-flex" data-aos="fade-left">
                                <div class="logo">
                                    <a href="single_job_details.php?jid=<?php echo $row['job_id']   ?>"><img
                                            src="images/<?php  echo $row['Logo']    ?>" alt="image" /></a>
                                </div>
                                <div class="job-meta">
                                    <div class="title">
                                        <h4><a href="job-post.html">
                                                <?php
echo $row['job_name']

?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="meta-info d-flex">
                                        <p><i class="fa fa-briefcase" aria-hidden="true"></i>
                                            <?php
                                         echo $row['Company_name']
                                        ?>
                                        </p>
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#">

                                            </a></p>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php
                                       echo   $row['post_date']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="timing ml-auto">
                                    <a class="time-btn1 time-btn text-uppercase"
                                        href="single_job_details.php?jid=<?php echo $row['job_id']   ?>">

                                        <?php
                                       echo   $row['jt_name']; ?>
                                    </a>
                                </div>
                            </div>

                            <?php
                            }
 ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--job-post-area-end -->

        <!--job-browse-area-start -->
        <div class="job-browse-area pt-100 pb-100 clearfix"
            style="background-image:url(https://html-trabajo.netlify.app/assets/images/bg-2.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="details-text text-center" data-aos="flip-up">
                            <div class="title pb-3">
                                <div class="heading-two mb-2">
                                    <h2>Browse Our <span>6,000+ </span>Latest Jobs</h2>
                                </div>
                                <p>Get your best job in here</p>
                            </div>
                            <div class="btn-trasparent-white buttonfx curtainup"><a href="#">Get started now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--job-browse-area-end -->
    
                </div>
            </div>
        </div>
      
    </main>
    <?php

require_once("includes/footer.php");
?>
    <!-- ==================== START PRELOADER HERE ===================================== -->
    <!-- ==================== END PRELOADER HERE ===================================== -->
    <!-- ====================ALL JS FILE HERE===================================== -->
    <!-- jQuery -->
    <script src="https://html-trabajo.netlify.app/assets/js/modules/jquery-3.4.1.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/bootstrap.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/proper.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/jquery.waypoints.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/owl.carousel.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/magnific.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/typing.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/select2.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/aos.min.js"></script>
    <script src="https://html-trabajo.netlify.app/assets/js/modules/slimmenu.min.js"></script>
    <!-- vendor 
      <script src="assets/js/vendor.min.js"></script>
	   -->
    <script src="https://html-trabajo.netlify.app/assets/js/app.js"></script>
    <script>
    /*  Type js  */
    if ((".typed").length > 0) {
        var options = {
            stringsElement: '.typed-strings',
            typeSpeed: 100,
            backDelay: 700,
            loop: !0,
            startDelay: 500,
            cursorChar: '|',
        }
        var typed = new Typed(".typed", options);
    }
    </script>

</body>

<!-- Mirrored from html-trabajo.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:52:31 GMT -->

</html>