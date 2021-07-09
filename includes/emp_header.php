    <!--header-start -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="index.php" class="font-weight-bold text-dark" style="font-size:20px;"> Job Winning</a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header-container d-flex justify-content-between highlight">
                        <nav class="highlight">
                            <ul id="responsive-menu" class="slimmenu">
                                <li><a class="nav-link" href="index.php">Home</a>
                                </li>
                               
                                <li class="nav-item">
                                <a href="job-listing.php">Job listing</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="all_candidates.php">All Candidates</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li> -->
                                <?php
if (isset($_SESSION['emp_id'])) {
    ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog-page.html">
                                        <?php    echo $_SESSION['emp_name']; ?>
                                    </a>
                                    <ul>
                                        <li><a href="emp_edit.php?id=<?php echo $_SESSION['emp_id']?>">Edit Profile</a>
                                        </li>
                                        <li><a href="manage_jobs.php">Manage jobs</a></li>
                                        <li><a href="emp_candidates.php">Candidates</a></li>
                                        <li><a href="logout.php">Logout</a></li>

                                    </ul>
                                </li>
                                <?php
} ?>

                                <li class="nav-item"><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header-end -->