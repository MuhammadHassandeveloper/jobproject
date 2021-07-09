<?php
session_start();
require_once("includes/db_connect.php");
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html-trabajo.netlify.app/reg.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:57:48 GMT -->
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
    <!--header-end -->
    <!---start header-banner -->
    <div class="header-banner clearfix" style="background-image:url(assets/images/header-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-text text-center">
                        <h1>Signup</h1>
                        <ul class="breadcumb list-inline">
                            <li class="list-inline-item"><a href="index.php">Home</a></li>
                            <li class="list-inline-item">Signup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---end header-banner -->
    <main class="main-content-area clearfix">
        <!---start login-form-area -->
        <div class="login-form-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6  mx-auto">

                        <h3>JobSeeker Signup</h3>
                        <form action="seeker_controller.php?action=add" method="POST">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 form-group">

                                    <div class="form-group p-2">

                                        <input class="form-control p-2" name="name" type="text"
                                            placeholder="Your Name" />
                                        <?php
             if (isset($_SESSION['name'])) {
                 ?>
                                        <span class="msg" style="color:red; font-size:15px; margin-left:50px;">
                                            <?php     echo $_SESSION['name']; ?>

                                        </span>
                                        <?php
             }
            ?>
                                    </div>
                                    <br>
                                    <div class="form-group p-2">

                                        <input class="form-control p-2" type="number" name="phone"
                                            placeholder="Your Phone" />
                                        <?php
             if (isset($_SESSION['phone'])) {
                 ?>
                                        <span class="msg" style="color:red; font-size:15px; margin-left:50px;">
                                            <?php     echo $_SESSION['phone']; ?>

                                        </span>
                                        <?php
             }
            ?>
                                    </div>
                                    <br>
                                    <div class="form-group  p-2">

                                        <input class="form-control p-2" type="Email" name="email"
                                            placeholder="Email Address" />
                                        <?php
             if (isset($_SESSION['email'])) {
                 ?>
                                        <span class="msg" style="color:red; font-size:15px; margin-left:50px;">
                                            <?php     echo $_SESSION['email']; ?>

                                        </span>
                                        <?php
             }
            ?>
                                    </div>
                                    <br>
                                    <div class="form-group p-2">

                                        <input class="form-control p-2" type="Password" name="password"
                                            placeholder="Password" />
                                        <?php
             if (isset($_SESSION['password'])) {
                 ?>
                                        <span class="msg" style="color:red; font-size:15px; margin-left:50px;">
                                            <?php     echo $_SESSION['password']; ?>

                                        </span>
                                        <?php
             }
            ?>
                                    </div>
                                    <br>
                                </div>
                            </div>



                            <div class="form-bottom">
                                <button name="signup" class="btn btn-md btn-green ml-2">Signup
                                </button>
                                <span class="ml-3"> <a href="emp_signup.php">Signup as a Employeer?</a>

                                </span>



                            </div>
                        </form>


                    </div>

                </div>
            </div>
            <!---end login-form-area -->
    </main>
    <!--footer-area-start -->
    <?php
require_once("includes/footer.php");
  ?>
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

<script>
var msg = document.querySelectorAll(".msg");
setTimeout(function() {
    for (let m of msg) {
        m.remove();
    }
}, 6000);
</script>


<!-- Mirrored from html-trabajo.netlify.app/reg.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 May 2021 06:57:48 GMT -->

</html>