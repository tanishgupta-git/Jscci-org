<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nepal Chamber of Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" type="text/css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="./assets/css/homepage.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/homepage.css">
</head>
<body>
 
<!-- navigation bar -->
<div class="nav-menu">
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="./index.php"><img src="./assets/images/chamber-logo-3.png"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link kam" href="./index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   About us 
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./AboutUs.php#aboutUsIntroToNCC">Introduction</a>
                    <a class="dropdown-item" href="./AboutUs.php#aboutUsVision">Vision</a>
                    <a class="dropdown-item" href="./AboutUs.php#aboutUsMission">Mision</a>
                    <a class="dropdown-item" href="./AboutUs.php#aboutUsHistory">History</a>
                    <a class="dropdown-item" href="./AboutUs.php#aboutUsObjectives">Objectives</a>
                  </div>
                </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="#">Committe</a>
                  </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Member 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Executive Members</a>
                      <a class="dropdown-item" href="#">Membership</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Media Room
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="./Gallary.php">Gallary</a>
                      <a class="dropdown-item" href="#">Videos</a>
                      <a class="dropdown-item" href="./AllPressReleasesOnClientSide.php">Press Release</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     News &Events
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Upcoming Events & news</a>
                    </div>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact Us</a>
                </li>
              </ul>
            </div>
          </nav>
  </div>
<!-- navigation bar ends here-->

<!-- image courosel starts from here -->
        <div id="carousel" class="carousel slide" data-ride="carousel" data-aos="zoom-in">
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
  
          <div class="carousel-inner" role="listbox">
  
            <div class="carousel-item active" style="background-image: url('./assets/images/image1.jpg');">
      
            </div>
  
            <div class="carousel-item" style="background-image: url('./assets/images/image2.jpg');">
            </div>
            <div class="carousel-item" style="background-image: url('./assets/images/image3.jpg');">
            <div class="carousel-item active" style="background-image: url('./assets/images/image1.jpg');">
      
            </div>
  
            <div class="carousel-item" style="background-image: url('./assets/images/image2.jpg');">
            </div>
            <div class="carousel-item" style="background-image: url('./assets/images/image3.jpg');">

            </div>
  
          </div>
          
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
  
        </div>
      
<!-- image courosel starts from here -->



<!-- ======= About Us Section ======= -->
          <section id="about-us" class="about-us">
            <div class="container-fluid" data-aos="fade-up">

              <div class="section-title">
                <h2>About Us</strong></h2>
              </div>

              <div class="row content">
                <div class="col-lg-5 build_photo" data-aos="fade-right">

                  <img src="./assets/images/build.jpg">

    
                </div>
                <div class=" aboutCon col-lg-7 pt-4 pt-lg-0" data-aos="fade-left">
                  <p>
                    Nepal Chamber of Commerce (NCC), established in the year 1952 (2009 BS) is the 
                    first Chamber of Commerce in Nepal. At present, it has more than 1,600 ordinary members and more than 8,000 registered firms.

                    Located in Kathmandu, the capital city of Nepal, the NCC has been playing remarkable 
                    role in the business promotion and formulation of commercial, industrial and fiscal policies of Nepal Government.
                  </p>
                  <button type="button" class="btn btn-outline-primary"><a href="#">Know More</a></button>
                </div>
              </div>

            </div>
          </section>
<!-- End About Us Section -->
<!-- Directors messaage -->
          <div class="director_msg">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 order-lg-8 image_part">

                  <img src="./assets/images/president.jpg">

            

                </div>
                <div class="col-lg-8 order-lg-4 content_prt">
                  <h3>View of President</h3>
                  <p>
                    I am delighted in introducing the website “www.nepalchamber.org” showcasing the activities from Nepal Chamber of Commerce. Nepal Chamber of Commerce is the pioneer business organization established after the democratic innovation in Nepal. Since its establishment from 1952 Nepal Chamber of Commerce is devoted in expanding chamber
                  </p>
                  <button type="button" class="btn btn-outline-primary"><a href="#">Know More</a></button>
                </div>
              </div>
            </div>
          </div>



<!-- press_rel container including all three container -->
            <div class="Dynamic_part">
              <div class="press_rel container">
                <div class="row">
                  <div class=" press_real_container col-lg-8" data-aos="fade-right">
                    <h3 class="press-head">Press Release</h3>           
                    <div class="myTicker">
                      <ul>

                        <?php 
                        global $ConnectingDB;
                        $sql = "SELECT  * FROM pressrelease ORDER BY pressId desc";
                        $stmt=$ConnectingDB->query($sql);
                        while ($DataRows=$stmt->fetch()) {
                              $PressId    = $DataRows["pressId"];
                              $PressTitle = $DataRows["title"];
                              $DateTime   = $DataRows["datetime"];
                              $PressImage = $DataRows["homePageimage"];
                              $PressContent = $DataRows["content"];

                      ?>      
                        <li>

                           <h6><a href="FullPressRelease.php?id=<?php echo $PressId; ?>"><?php echo $PressTitle; ?></a></h6>
                          <div class="press_content">
                            <div class="image-div"><img src="UPLOAD/PRESS/<?php echo($PressImage) ?>"></div>

                            <div class="date_with_cont">
                              <p class="date"><?php  echo $DateTime; ?></p>
                              <p class="brief"><?php if(strlen($PressContent)>900){$PressContent=substr($PressContent,0,897);}
                     echo $PressContent;?><span><a href="FullPressRelease.php?id=<?php echo $PressId; ?>">....Read More</a></span>
                              </p>
                            </div>
                          </div>
                        </li>
                 <?php } ?>
                        
                      </ul>
                    </div>
                  </div>
        
                  <div class="right_part col-lg-4" data-aos="fade-left">
                    <div class="upcoming_events" >
                      <h5 class="upcoming-head">Upcoming Events</h5>
                      <div class="list-group">
                        
                         <?php 
                        global $ConnectingDB;
                        $sql = "SELECT  * FROM upcomingevents ORDER BY eventId desc";
                        $stmt=$ConnectingDB->query($sql);
                        while ($DataRows=$stmt->fetch()) {
                              $EventId    = $DataRows["eventId"];
                              $EventTitle = $DataRows["title"];
                      ?>
                    <a href="FullUpcomingEvent.php?id=<?php echo $EventId; ?>" class="list-group-item"><i class="far fa-hand-point-right"></i> <?php echo $EventTitle; ?></a>
                      
                    <?php } ?>

                      </div>
                    </div>

                    <div class="downloads">
                      <h5 class="Downloads-head">Downloads</h5>
                      <div class="list-group">
                       <?php 
                        global $ConnectingDB;
                        $sql = "SELECT  * FROM downloads ORDER BY downloadId desc";
                        $stmt=$ConnectingDB->query($sql);
                        while ($DataRows=$stmt->fetch()) {
                              $DownloadId    = $DataRows["downloadId"];
                              $DownloadTitle = $DataRows["title"];
                      ?>
                        <a href="#" class="list-group-item"><i class="far fa-hand-point-right"></i> <?php echo $DownloadTitle; ?></a>

                       <?php } ?>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
              
            </div>
          
<!-- press_rel container ends here including all three container -->



<!-- 
footer code -->
            <section id="lab_social_icon_footer">
                <!-- Include Font Awesome Stylesheet in Header -->
                <div class="container">
                  <div class="row footer_part">
                    <div class="col-lg-4 col-md-4 footer-links">
                      <h5>Useful Links</h5>
                      <ul>
                        <li><i class="fas fa-chevron-right"></i><a href="#">Home</a></li>
                        <li><i class="fas fa-chevron-right"></i><a href="#">About us</a></li>
                        <li><i class="fas fa-chevron-right"></i><a href="#">Commitee</a></li>
                        <li><i class="fas fa-chevron-right"></i><a href="Dashboard.php">Admin Login</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 footer-contact">
                      <h5>Contact Us</h5>
                      <p>
                        Kantipath , Kathmandu <br>
                        Nepal<br>
                        <br>
                        <strong>Phone:</strong> 01-4230947<br>
                        <strong>Email:</strong> info@nepalchamber.org<br>
                      </p>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center center-block">
                      <h5>Connect with us</h5>
                      <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a>
                      <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fab fa-twitter-square fa-3x social"></i></a>
                      <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fab fa-google-plus-square fa-3x social"></i></a>
                      <a href="mailto:#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                   </div>
                  </div>

                    <p>
                        Copyright © 2017 Nepal Chamber. All Rights Reserved<br> Powered By : <strong>ORTED</strong> 
                    </p>
                </div>
              </section>
<!-- 
    footer code ends here-->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

                <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->

                <script type="text/javascript" src="./assets/js/jquery.easy-ticker.min.js"></script>
                <script src="./assets/js/homepage.js"></script>

                <script type="text/javascript" src="assets/js/jquery.easy-ticker.min.js"></script>
                <script src="./assets/js/homepage.js"></script>

</body>
</html>
