<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php  
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); 
?> 

<?php
  if(isset($_POST["submit"])){

     $PressTitle=$_POST["Title"];
     // for first(homepage) image
     $HomepageImage = $_FILES["HomepageImage"]["name"];
     $HomeTarget = "UPLOAD/PRESS/".basename($_FILES["HomepageImage"]["name"]);
     // for second image
     $PressImageone = $_FILES["PressImageone"]["name"];
     $PressTargetone = "UPLOAD/PRESS/".basename($_FILES["PressImageone"]["name"]);
     // for third image
     $PressImagetwo = $_FILES["PressImagetwo"]["name"];
     $PressTargettwo = "UPLOAD/PRESS/".basename($_FILES["PressImagetwo"]["name"]);

     $PressContent = $_POST["Content"];

     date_default_timezone_set("Asia/Kathmandu");
      $CurrentTime=time();
       $DateTime=strftime("%B-%d-%Y", $CurrentTime);


     if(empty($PressTitle)){
     	$_SESSION["ErrorMessage"] = "Title Can't be empty";
        Redirect_to("AddPressRelease.php");
       
       }elseif (strlen($PressTitle)<5) {  
         $_SESSION["ErrorMessage"] = "Press title should be greater than 5 characters";
        Redirect_to("AddPressRelease.php");
       }elseif (strlen($PressContent)>9999) {  
         $_SESSION["ErrorMessage"] = "Press description should be less than 10000 characters";
        Redirect_to("AddPressRelease.php");
       }else{
       	// Query to insert post in db when everyting is fine
       	global $ConnectingDB;
$sql="INSERT INTO pressrelease(title,datetime,content,homePageimage,pressImageone,pressImagetwo)";
  $sql .="VALUES(:pressTitle,:dateTime,:pressContent,:homepageImage,:pressImageone,:pressImagetwo)";
        $stmt= $ConnectingDB->prepare($sql);
        $stmt->bindValue(':pressTitle', $PressTitle);
        $stmt->bindValue(':dateTime', $DateTime);
        $stmt->bindValue(':pressContent', $PressContent);
        $stmt->bindValue(':homepageImage', $HomepageImage);
        $stmt->bindValue(':pressImageone', $PressImageone);
        $stmt->bindValue(':pressImagetwo', $PressImagetwo);
        $Execute=$stmt->execute();
        move_uploaded_file($_FILES["HomepageImage"]["tmp_name"],$HomeTarget);
        move_uploaded_file($_FILES["PressImageone"]["tmp_name"],$PressTargetone);
        move_uploaded_file($_FILES["PressImagetwo"]["tmp_name"],$PressTargettwo);

        if($Execute)
        {
        	$_SESSION["SuccessMessage"]="Press Release with id: ".$ConnectingDB->lastInsertId()."Added Successfully";
        	Redirect_to("AddPressRelease.php");
        }else{
        	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        	Redirect_to("AddPressRelease.php");
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
	<script src="https://kit.fontawesome.com/9dd2d32fa7.js" crossorigin="anonymous"></script>
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/basicadmindesign.css">
       <link rel="stylesheet" type="text/css" href="assets/css/adminpanel.css">
	<title>Add Press Release</title>
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
       <li>
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
<p class="page-define"><i class="fa fa-edit"></i> Add Press Release</p>
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

      <form action="AddPressRelease.php" method="post" enctype="multipart/form-data">
               
               <div class="admin-input">
                 <label for="title">PressRelease Title:</label>
                  <input type="text" name="Title" id="title" placeholder="type title here">
                </div>

                
                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="HomepageImage" id="imageSelect1">
                 <label for="imageSelect1" class="file-label">Select Image1</label>
                </div>

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="PressImageone" id="imageSelect2">
                 <label for="imageSelect2" class="file-label">Select Image2</label>
                </div>

                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="PressImagetwo" id="imageSelect3">
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