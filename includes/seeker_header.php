    <!--header-start -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="index.php" class="font-weight-bold text-dark" style="font-size:20px;">Job Winning</a>
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
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <?php
if (isset($_SESSION['seeker_id'])) {
    echo $_SESSION['seeker_name']; ?>
                                    </a>
                                    <ul>
                                        <li><a href="seeker_edit.php?id=<?php echo $_SESSION['seeker_id']?>">Edit
                                                Profile</a></li>
                                        <li><a href="applied_jobs.php?sid=<?php  echo $_SESSION['seeker_id']?>">View Apply Jobs</a></li>
                                        <li><a href="resume_manage.php">Manage Resume</a></li>
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