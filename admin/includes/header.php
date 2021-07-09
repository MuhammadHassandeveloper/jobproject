
            <!-- header area -->
            <header class="header_area">
                <!-- logo -->
                <div class="sidebar_logo">
                    <a class="text-light mt-3 ml-4 font-weight-bold" href="index.php">
                    Jobs Portal
  <!-- <img src="panel/assets/images/logo.png" alt="" class="img-fluid logo1">
   <img src="panel/assets/images/logo_small.png" alt="" class="img-fluid logo2"> -->
                    </a>
                </div>
                <div class="sidebar_btn">
                    <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
                </div>
                <ul class="header_menu">
                    
                   
                    <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                            <div class="user_item dropdown-menu dropdown-menu-right">
                                <div class="admin">
                                <?php 
if(isset($_SESSION['admin_id']))
{      ?>
                                    <a href="#" class="user_link"> <?php   echo $_SESSION['admin_name'];?>
                                    <?php   }   ?></a>
                                </div>
                            <ul>
                                
                                <li><a href="edit_profile.php?id=<?php echo $_SESSION['admin_id']?>"><span><i class="fas fa-user"></i></span>Edit  Profile</a></li>
                                <li>

                                    <a href="logout.php"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>

                        <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
                </ul>
            </header><!-- / header area -->