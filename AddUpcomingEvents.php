<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php  
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); 
?> 

<?php
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
        Redirect_to("AddUpcomingEvents.php");
       
       }elseif (strlen($EventTitle)<5) {  
         $_SESSION["ErrorMessage"] = "Event title should be greater than 5 characters";
        Redirect_to("AddUpcomingEvents.php");
       }elseif (strlen($EventContent)>9999) {  
         $_SESSION["ErrorMessage"] = "Event description should be less than 10000 characters";
        Redirect_to("AddUpcomingEvents.php");
       }else{
       	// Query to insert post in db when everyting is fine
       	global $ConnectingDB;
$sql="INSERT INTO upcomingevents(title,eventImageone,eventImagetwo,eventImagethree,content)";
  $sql .="VALUES(:eventTitle,:eventImageone,:eventImagetwo,:eventImagethree,:eventContent)";
        $stmt= $ConnectingDB->prepare($sql);
        $stmt->bindValue(':eventTitle', $EventTitle);
        $stmt->bindValue(':eventImageone', $EventImageone);
        $stmt->bindValue(':eventImagetwo', $EventImagetwo);
        $stmt->bindValue(':eventImagethree', $EventImagethree);
        $stmt->bindValue(':eventContent', $EventContent);
        $Execute=$stmt->execute();
        move_uploaded_file($_FILES["EventImageone"]["tmp_name"],$EventTargetone);
        move_uploaded_file($_FILES["EventImagetwo"]["tmp_name"],$EventTargettwo);
        move_uploaded_file($_FILES["EventImagethree"]["tmp_name"],$EventTargetthree);

        if($Execute)
        {
        	$_SESSION["SuccessMessage"]="Upcoming Events with id: ".$ConnectingDB->lastInsertId()."Added Successfully";
        	Redirect_to("AddUpcomingEvents.php");
        }else{
        	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        	Redirect_to("AddUpcomingEvents.php");
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
        <link rel="stylesheet" type="text/css" href="assets/css/adminpanel.css">
	<title>Add Upcoming Events</title>
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
<p class="page-define"><i class="fa fa-edit"></i> Add Upcoming Events</p>
</header>
<!-- end of header -->
<!-- main area -->
<section>
   <?php 
       echo ErrorMessage();
       echo SuccessMessage();
        ?>
  <div class="sub-all-area">
    <!-- left side area start -->
    <div class="edit-form-container">
        <div class="form-container">

      <form action="AddUpcomingEvents.php" method="post" enctype="multipart/form-data">
               
               <div class="admin-input">
                 <label for="title">Upcoming Event Title:</label>
                  <input type="text" name="Title" id="title" placeholder="type title here">
                </div>

                
                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="EventImageone" id="imageSelect1">
                 <label for="imageSelect1" class="file-label">Select Image1</label>
                </div>

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="EventImagetwo" id="imageSelect2">
                 <label for="imageSelect2" class="file-label">Select Image2</label>
                </div>

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="EventImagethree" id="imageSelect3">
                 <label for="imageSelect3" class="file-label">Select Image3</label>
                </div>

                <div class="admin-input">
                <label for="content">Content:</label><br>
                <textarea name="Content" rows="8" cols="80" id="content"></textarea>
                </div>

                     <div class="admin-action-container">
                      <a href="Dashboard.php" class="btn-lg warning"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>  
                      <button type="submit" name="submit" class="btn-lg success"><i class="fas fa-check"></i> Publish</button>
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