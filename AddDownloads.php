<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php  
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); 
?> 

<?php
  if(isset($_POST["submit"])){

     $DownloadTitle= $_POST["Title"];
     // for first(homepage) image
     $DownloadFile = $_FILES["DownloadFile"]["name"];
     $Target = "UPLOAD/DOWNLOADS/".basename($_FILES["DownloadFile"]["name"]);

 
     if(empty($DownloadTitle)){
      $_SESSION["ErrorMessage"] = "Title Can't be empty";
        Redirect_to("AddDownloads.php");
       
       }elseif (strlen($DownloadTitle)<5) {  
         $_SESSION["ErrorMessage"] = "Download title should be greater than 5 characters";
        Redirect_to("AddDownloads.php");
       }else{

        // Query to insert post in db when everyting is fine
        global $ConnectingDB;
        $sql="INSERT INTO downloads(title,downloadFile)";
        $sql .="VALUES(:downloadTitle,:downloadFile)";
        $stmt= $ConnectingDB->prepare($sql);
        $stmt->bindValue(':downloadTitle', $DownloadTitle);
        $stmt->bindValue(':downloadFile', $DownloadFile);

        $Execute=$stmt->execute();
        move_uploaded_file($_FILES["DownloadFile"]["tmp_name"],$Target);


        if($Execute)
        {
          $_SESSION["SuccessMessage"]="Downloads with id: ".$ConnectingDB->lastInsertId()."Added Successfully";
          Redirect_to("AddDownloads.php");
        }else{
          $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
          Redirect_to("AddDownloads.php");
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
  <title>Add Downloads</title>
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
<p class="page-define"><i class="fa fa-edit"></i> Add Downloads</p>
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

      <form action="AddDownloads.php" method="post" enctype="multipart/form-data">
               
               <div class="admin-input">
                 <label for="title">Downloads Title:</label>
                  <input type="text" name="Title" id="title" placeholder="type title here">
                </div>

                
                <div class="admin-img-file">
                 <input class="admin-img-input" type="File" name="DownloadFile" id="file">
                 <label for="file" class="file-label">Select File</label>
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