<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>
<?php  
Confirm_Login(); ?> 
<?php

  $SearchQueryParameter = $_GET["id"];

  if(isset($_POST["submit"])){

     $EventTitle= $_POST["Title"];
     // for first(homepage) image
     $EventImageone = $_FILES["EventImageone"]["name"];
     $EventTargetone = "UPLOAD/EVENTS/".basename($_FILES["EventImageone"]["name"]);
     // for second image
     $EventImagetwo = $_FILES["EventImagetwo"]["name"];
     $EventTargettwo = "UPLOAD/EVENTS/".basename($_FILES["EventImagetwo"]["name"]);
     // for third image
     $EventImagethree = $_FILES["EventImagethree"]["name"];
     $EventTargetthree = "UPLOAD/EVENTS/".basename($_FILES["EventImagethree"]["name"]);

     $EventContent = $_POST["Content"];



     if(empty($EventTitle)){
      $_SESSION["ErrorMessage"] = "Title Can't be empty";
        Redirect_to("EditUpcomingEvents.php");
       
       }elseif (strlen($EventTitle)<5) {  
         $_SESSION["ErrorMessage"] = "Event title should be greater than 5 characters";
        Redirect_to("EditUpcomingEvents.php");
       }elseif (strlen($EventContent)>9999) {  
         $_SESSION["ErrorMessage"] = "Event description should be less than 10000 characters";
        Redirect_to("EditUpcomingEvents.php");
       }else{
       	
        // Query to Update post in db when everyting is fine
        global $ConnectingDB;  
        $sql = "UPDATE upcomingevents SET title='$EventTitle', eventImageone='$EventImageone',eventImagetwo='$EventImagetwo',eventImagethree='$EventImagethree',content='$EventContent' WHERE eventId='$SearchQueryParameter'";

        $Execute = $ConnectingDB->query($sql);
        move_uploaded_file($_FILES["EventImageone"]["tmp_name"],$EventTargetone);
        move_uploaded_file($_FILES["EventImagetwo"]["tmp_name"],$EventTargettwo);
        move_uploaded_file($_FILES["EventImagethree"]["tmp_name"],$EventTargetthree);

        if($Execute)
        {
        	$_SESSION["SuccessMessage"]="Post Updated Successfully";
        	Redirect_to("UpcomingEvents.php");
        }else{
        	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        	Redirect_to("UpcomingEvents.php");
        }

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
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/adminpanel.css">
  <title>Edit Upcoming Events</title>
</head>
<body>
<!-- navbar for small screen only -->
    <div class="mobile-screen-only">
          <button class="click-show"><i class="fas fa-bars fa-2x"></i></button>
    </div>
    <!-- end of navbar for small screen only -->
    <div class="wrapper">
        <div class="nav-parent">
        <nav>
         <a href="#" class="logo">Hello &nbsp;<?php echo  $_SESSION["NccAdminname"] ?></a>
          <button class="click-hide"><i class="fas fa-times fa-2x"></i></button><br>
       <ul>  
            <li>
            <a href="Dashboard.php"><i class="fas fa-cog"></i> Dashboard</a>
          </li>
          <li class="active">
            <a href="Posts.php"><i class="fas fa-newspaper"></i> Press Release</a>
          </li>
          <li>
            <a href="Categories.php"><i class="fas fa-calendar-week"></i> Upcoming Events</a>
          </li>
          <li>
            <a href="Admins.php"><i class="fas fa-users"></i> Manage Admins</a>
          </li>
          <li>
            <a href="Comments.php"><i class="fas fa-file-download"></i> Downloads</a>
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
     <p class="page-define"><i class="fa fa-edit"></i> Edit Upcoming Events
     </p>
     <div class="alert alert-warning" role="alert">You have to upload the images again ,otherwise it will remove the existing images
      </div>
     </div>
  </header>
<!-- end of header -->
<!-- main area -->
<section>
  <div class="sub-all-area">
       <?php 
       echo ErrorMessage();
       echo SuccessMessage();

       global $ConnectingDB;
       $sql = "SELECT * FROM upcomingevents WHERE eventId='$SearchQueryParameter'";
       $stmt=$ConnectingDB->query($sql);
      while($DataRows = $stmt->fetch())
      { 
                    $Id =  $DataRows["eventId"];
                    $EventTitle =$DataRows["title"];
                    $EventImageone = $DataRows["eventImageone"];
                    $EventImagetwo = $DataRows["eventImagetwo"];
                    $EventImagethree = $DataRows["eventImagethree"];
                    $ContentToBeUpdated = $DataRows['content'];
      }
        ?>
         <!-- left side area start -->
            <div class="edit-form-container">
          <div class="form-container">
      <form action="EditUpcomingEvents.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">

               <div class="admin-input">
                 <label for="title">Event Title:</label>
                  <input class="form-control" type="text" name="Title" id="title" placeholder="type title here" value="<?php echo $EventTitle; ?>">
                </div>
                
                <div>
                  <div class="center-label">
                  <label>Existing Event Image One: </label>
                  <img src="UPLOAD/EVENTS/<?php echo $EventImageone;?>" width="150px"; height="100px";>
                  </div> 

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="EventImageone" id="imageSelect1">
                 <label for="imageSelect1" class="file-label">Select Image</label>
                </div>
                </div>

                <div>
                  <div class="center-label">
                  <label>Existing Event Image Two: </label>
                  <img src="UPLOAD/EVENTS/<?php echo $EventImagetwo;?>" width="150px"; height="100px";>
                  </div> 

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="EventImagetwo" id="imageSelect2">
                 <label for="imageSelect2" class="file-label">Select Image</label>
                </div>
                </div>

                <div>
                  <div class="center-label">
                  <label>Existing Event Image Three: </label>
                  <img src="UPLOAD/EVENTS/<?php echo $EventImagethree;?>" width="150px"; height="100px";>
                  </div> 

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="EventImagethree" id="imageSelect3">
                 <label for="imageSelect3" class="file-label">Select Image</label>
                </div>
                </div>

                <div class="admin-input">
                   <label for="Post">Content:</label><br>
                   <textarea name="Content" rows="8" cols="80" id="Post"><?php echo $ContentToBeUpdated; ?></textarea>
                </div>

                    <div class="admin-action-container">
                        <a href="Dashboard.php" class="btn-lg warning"><i class="fas fa-arrow-left"></i>Back TO Dashboard</a>	

  	                     <button type="submit" name="submit" class="btn-lg success"><i class="fas fa-check"></i> Publish</button>
                    </div>

             </form>
            </div>
        </div>	
        </div>	
</section>
      </div>
      </div>
 <!-- end of main area -->


<script src="assets/js/adminpanel.js"></script>
</body>
</html>