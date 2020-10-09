<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login(); 
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
	<title>Press Release</title>
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
              <p class="page-define"><i class="fas fa-blog"></i> Press Release</p>
            </div>
          <div class="edit-buttongroup">
             <div>
              <a href="AddPressRelease.php"><i class="fas fa-edit"></i> Add Press Release
              </a>
             </div>
              <div>
              <a href="AddUpcomingEvents.php"><i class="fas fa-folder-plus"></i> Add Upcoming Events
              </a>
             </div>
             <div>
              <a href="Admins.php"><i class="fas fa-user-plus"></i>  Add New Admin
              </a>
             </div>

             <div>
              <a href="AddDownloads.php"><i class="fas fa-check"></i> Add New Downloads
              </a>
             </div>
          </div>
       </header>
<!-- end of header -->
<!-- Main area -->
     <section>
          <?php 
            echo ErrorMessage();
       echo SuccessMessage();
       ?>
       <div class="sub-all-area">
         <div class="table-container">
            <div class="responsive-table">
         	<table>
                <thead>
         		 <tr>
         			<th>#</th>
         			<th>Title</th>
         			<th>Date&Time</th>
         			<th>HomeImage</th>
              <th>Imagetwo</th>
              <th>ImageThree</th>     
         			<th>Edit</th>
                    <th>Delete</th>
         			<th>Live Preview</th>
         		  </tr>
                 </thead>
         		<?php
                 global $ConnectingDB;
                 $Sr = 0;
                 $sql = "SELECT * FROM pressrelease";
                 $stmt = $ConnectingDB->query($sql);
                 while($DataRows =$stmt->fetch()){
                    $Id =      $DataRows["pressId"];
                    $DateTime =$DataRows["datetime"];
                    $PressTitle =$DataRows["title"];
                    $HomePageImage = $DataRows["homePageimage"];
                    $PressImageone = $DataRows["pressImageone"];
                    $PressImagetwo = $DataRows["pressImagetwo"];
                    $Sr++;
         		?>
                <tbody>
                <tr>
                    <td><?php echo $Sr; ?></td>
                     <td><?php if(strlen($PressTitle)>20){$PressTitle=substr($PressTitle,0,18)."..";}
                     echo $PressTitle;?></td>
                        <td><?php echo $DateTime ?></td>
                     <td><img src="UPLOAD/PRESS/<?php echo $HomePageImage; ?>" width="100x" height="100px" alt="No Image"></td>
                     <td><img src="UPLOAD/PRESS/<?php echo $PressImageone; ?>" width="100x" height="100px" alt="No Image"></td>
                     <td><img src="UPLOAD/PRESS/<?php echo $PressImagetwo; ?>" width="100x" height="100px" alt="No Image"></td>
                     <td><a href="EditPressRelease.php?id=<?php echo $Id; ?>"><span class="btn warning">Edit</span></a></td>
                    <td><a href="DeletePressRelease.php?id=<?php echo $Id; ?>"><span class="btn delete">Delete</span></a></td>
                    <td><a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn preview">Preview</span></a></td>
                </tr>
            </tbody>
            <?php } ?>
         	</table>
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