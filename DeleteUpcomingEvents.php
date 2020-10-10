<?php require_once("INCLUDES/DB.php"); ?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php  Confirm_Login(); ?> 
<?php
       $SearchQueryParameter = $_GET["id"];
       global $ConnectingDB;
       $sql = "SELECT * FROM upcomingevents WHERE eventId='$SearchQueryParameter'";
       $stmt=$ConnectingDB->query($sql);
      while($DataRows = $stmt->fetch())
      { 
                    $EventImageone = $DataRows["eventImageone"];
                    $EventImagetwo = $DataRows["eventImagetwo"];
                    $EventImagethree = $DataRows["eventImagethree"];
      }

  if(isset($_POST["submit"])){

       	// Query to Delete post in db when everyting is fine
       	global $ConnectingDB;
       $sql = "DELETE FROM upcomingevents WHERE eventId='$SearchQueryParameter'";
       $Execute = $ConnectingDB->query($sql);
        if($Execute)
        {
          $Target_Path_TO_DELETE_EventImageone = "UPLOAD/EVENTS/$EventImageone";
          unlink($Target_Path_TO_DELETE_EventImageone);

          $Target_Path_TO_DELETE_EventImagetwo = "UPLOAD/EVENTS/$EventImagetwo";
          unlink($Target_Path_TO_DELETE_EventImagetwo);

          $Target_Path_TO_DELETE_EventImagethree = "UPLOAD/EVENTS/$EventImagethree";
          unlink($Target_Path_TO_DELETE_EventImagethree);

        	$_SESSION["SuccessMessage"]="Upcoming Event Deleted Successfully";
        	Redirect_to("UpcomingEvents.php");
        }else{

        	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        	Redirect_to("UpcomingEvents.php");

        }

} //Ending of Submit Button if-condition

 ?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="assets/css/adminpanel.css">
	    <title>Delete Upcoming Events</title>
</head>
<body>
    <!-- navbar for small screen only -->
    <div class="mobile-screen-only">
          <button class="click-show"><i class="fas fa-bars fa-2x"></i></button>
    </div>
    <!-- end of navbar for small screen only -->
    <div class="wrapper">
      <!-- NAVBAR -->
      <div class="nav-parent">
        <nav>
         <a href="#" class="logo">Hello &nbsp;<?php echo  $_SESSION["NccAdminname"] ?></a>
          <button class="click-hide"><i class="fas fa-times fa-2x"></i></button><br>
       <ul>  
            <li class="active">
            <a href="Dashboard.php"><i class="fas fa-cog"></i> Dashboard</a>
          </li>
          <li>
            <a href="PressRelease.php"><i class="fas fa-newspaper"></i> Press Release</a>
          </li>
          <li>
            <a href="UpcomingEvents.php"><i class="fas fa-calendar-week"></i> Upcoming Events</a>
          </li>
          <li>
            <a href="Admins.php"><i class="fas fa-users"></i> Manage Admins</a>
          </li>
          <li>
            <a href="Downloads.php"><i class="fas fa-file-download"></i> Downloads</a>
          </li>
          <li>
            <a href="Index.php"><i class="fas fa-blog"></i> Live Website</a>
          </li>
            <li>
               <a href="Logout.php" ><i class="fas fa-user-times"></i> Logout</a>
           </li>
       </ul>    
     </nav>
  </div>
<!----- end of navbar -->
<!-- header start -->
  <div class="main-area">
  <header>
   <div>
     <p class="page-define"><i class="fa fa-edit"></i> Delete Upcoming Events</p>
     </div>
  </header>
<!-- end of header -->
<!-- main area -->
<section class="container py-2 mb-4">
  <div class="sub-all-area">
       <?php 
       echo ErrorMessage();
       echo SuccessMessage();
        ?>
       <div class="edit-form-container">
         <div class="form-container">
          
     <form class="" action="DeleteUpcomingEvents.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
                 <div>Are You Sure You Want To Delete This Upcoming Event</div>
                     <div class="admin-action-container">
                      <a href="Dashboard.php" class="btn-lg warning"><i class="fas fa-arrow-left"></i>Back TO Dashboard</a> 
                       <button type="submit" name="submit" class="btn-lg delete"><i class="fas fa-check"></i> Delete</button>
                    </div>
     </form>
   </div>
   </div>
</div>	
</section>
       </div>
    </div>


<script src="assets/js/adminpanel.js"></script>
</body>
</html>