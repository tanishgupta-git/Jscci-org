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
	         <title>Dashboard</title>
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
            <p class="page-define"><i class="fas fa-cog"></i> Dashboard</p>
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
   
       <div class="sub-all-area">
       <!-- left side area start -->
         <div class="statistics-sum">
             
                <div class="total-count">
                    <p>Press Release</p>
                    <h4>
                        <i class="fab fa-readme"></i>
                         3
                    </h4>  
                 </div>
                 
                  <div class="total-count">
                    <p>Upcoming Events</p>
                    <h4>
                        <i class="fas fa-folder"></i>
                       4
                    </h4>  
                 </div>
                 
                 </div>

                 
                <div class="statistics-sum">
                  
                <div class="total-count">
                    <p>Admins</p>
                    <h4>
                        <i class="fas fa-users"></i>
                       5
                    </h4>  
                 </div>
                 
                <div class="total-count">
                    <p>Downloads</p>
                    <h4>
                        <i class="fas fa-comments"></i>
                       6
                    </h4>  
                 </div>
                 
             </div>
          <!-- left side area end -->

          <!-- right side area -->

          <!-- end right side area -->
        </div>
       </section>
<!-- end of main area -->
</div>
</div>

<script src="assets/js/adminpanel.js"></script>
</body>
</html>