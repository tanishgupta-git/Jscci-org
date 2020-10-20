<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>
<?php  
Confirm_Login(); ?> 
<?php

  $SearchQueryParameter = $_GET["id"];

  if(isset($_POST["submit"])){

 
     $DownloadTitle= $_POST["Title"];
     // for first(homepage) image
     $DownloadFile = $_FILES["DownloadFile"]["name"];
     $Target = "UPLOAD/DOWNLOADS/".basename($_FILES["DownloadFile"]["name"]);

      if(empty($DownloadTitle)){
      $_SESSION["ErrorMessage"] = "Title Can't be empty";
        Redirect_to("EditDownloads.php");
       
       }elseif (strlen($DownloadTitle)<5) {  
         $_SESSION["ErrorMessage"] = "Download title should be greater than 5 characters";
        Redirect_to("EditDownloads.php");
       }else{
       	
        // Query to Update post in db when everyting is fine
        global $ConnectingDB;  
        $sql = "UPDATE downloads SET title='$DownloadTitle',downloadFile='$DownloadFile'WHERE downloadId='$SearchQueryParameter'";
        
        $Execute = $ConnectingDB->query($sql);
        move_uploaded_file($_FILES["DownloadFile"]["tmp_name"],$Target);

        if($Execute)
        {
        	$_SESSION["SuccessMessage"]="Download Updated Successfully";
        	Redirect_to("Downloads.php");
        }else{
        	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        	Redirect_to("Downloads.php");
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
  <title>Edit Downloads</title>
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
     <p class="page-define"><i class="fa fa-edit"></i> Edit Downloads
     </p>
     <div class="alert-parent">
     <div class="alert alert-info" role="alert">You have to upload the file again,otherwise it will remove the existing file
      </div>
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
       $sql = "SELECT * FROM downloads WHERE downloadId='$SearchQueryParameter'";
       $stmt=$ConnectingDB->query($sql);
      while($DataRows = $stmt->fetch())
      { 
        $TitleToBeUpdated = $DataRows['title'];

      }
        ?>
         <!-- left side area start -->
            <div class="edit-form-container">
          <div class="form-container">
      <form action="EditDownloads.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">

               <div class="admin-input">
                 <label for="title">Download Title:</label>
                  <input type="text" name="Title" id="title" placeholder="type title here" value="<?php echo $TitleToBeUpdated; ?>">
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
 <!-- end of main area -->

<script src="assets/js/adminpanel.js"></script>
</body>
</html> 