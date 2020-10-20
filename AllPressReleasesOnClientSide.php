<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nepal Chamber of Commerce</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="#" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" type="text/css">
    <link rel="stylesheet" type="text/css" href="./assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/allPressReleaseOnClientSide.css">
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
                <li class="nav-item">
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
                    <a class="nav-link dropdown-toggle active" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<!-- all press Release code starts from here -->

<div class="all-press-container">
    <h2 class="page-heading">Press Release</h2>


    <div class="pr-card-parent">


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

        <div class="pr-card container my-4">
            <a href="FullPressRelease.php?id=<?php echo $PressId; ?>"><?php echo $PressTitle; ?></a>
            <div class="pr-date-part"><i class="fas fa-calendar-alt"></i>Posted on 
                <span class="pr-card-date"><?php  echo $DateTime; ?></span>
            </div>
            <div class="row">
                <div class="col-lg-4 pr-card-image-container">
                  <img class="pr-card-image" src="UPLOAD/PRESS/<?php echo($PressImage) ?>" alt="">
                </div>
                <div class="col-lg-8 pr-card-content-container">
            
                    <p class="pr-card-content"><?php if(strlen($PressContent)>900){$PressContent=substr($PressContent,0,897);}
                     echo $PressContent;?></p>
                     <button type="button" class="btn btn-outline-primary"><a href="FullPressRelease.php?id=<?php echo $PressId; ?>">Know More</a></button>
                </div>
            </div>
        </div>

      <?php } ?>

    </div>



</div>


<!-- all press Release code ends from here -->

<section id="lab_social_icon_footer" class="allButFooter">
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>