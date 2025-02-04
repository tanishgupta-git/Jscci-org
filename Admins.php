<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php  
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
 Confirm_Login();
 ?> 

<?php

  if(isset($_POST["submit"])){
     $Username=$_POST["Username"];
     $Name = $_POST["Name"];
     $Password = $_POST["Password"];
     $ConfirmPassword=$_POST["ConfirmPassword"];
     date_default_timezone_set("Asia/Kathmandu");
      $CurrentTime=time();
       $DateTime=strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);


     if(empty($Username)||empty($Password)||empty($ConfirmPassword)){
     	$_SESSION["ErrorMessage"] = "All fields must be fiiled out";
        Redirect_to("Admins.php");
       
       }elseif (strlen($Password)<4) {  
         $_SESSION["ErrorMessage"] = "Password should be greater than 3 characters";
        Redirect_to("Admins.php");
       }elseif($Password !== $ConfirmPassword) {  
         $_SESSION["ErrorMessage"] = "Password and ConfirmPassword should be same";
        Redirect_to("Admins.php");
       }elseif(CheckUserExistsOrNot($Username)){  
         $_SESSION["ErrorMessage"] = "Username Exixts Try Another Name";
        Redirect_to("Admins.php");
       }else{
       	// Query to insert new admin in db when everyting is fine
       	global $ConnectingDB;
       	$sql="INSERT INTO admins(datetime,username,password)";
       	$sql .="VALUES(:dateTime,:userName,:password)";

       	$stmt= $ConnectingDB->prepare($sql);
         $stmt->bindValue(':dateTime',$DateTime);
        $stmt->bindValue(':userName',$Username);
        $stmt->bindValue(':password',$Password);
        $Execute=$stmt->execute();
        if($Execute)
        {
        	$_SESSION["SuccessMessage"]="New Admin with the name of ".$Name." Added Successfully";
        	Redirect_to("Admins.php");
        }else{
        	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
        	Redirect_to("Admins.php");
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
	<title>Admins Page</title>
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
          <li class="active">
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


 <div class="main-area">
<!-- header start -->
   <header>
		   <div>
        <p class="page-define"><i class="fa fa-user"></i> Manage Admins</p>
       </div>
    </header>
<!-- end of header -->
<!-- main area -->
<section>
    <div class="sub-all-area">
       <?php 
       echo ErrorMessage();
       echo SuccessMessage();
        ?>
        <!-- left side area start -->
        <div class="edit-form-container">
          <div class="form-container">

      <form action="Admins.php" method="post">	
          <div class="edit-type">
	         <p>Add New Admin</p>
           </div>

               <div class="admin-input">
                 <label for="Username"> Username :</label>
                  <input type="text" name="Username" id="Username">
                </div>

                <div class="admin-input">
                 <label for="Password"> Password :</label>
                  <input type="Password" name="Password" id="Password">
                </div>

                <div class="admin-input">
                 <label for="ConfirmPassword"> Confirm Password :</label>
                  <input class="form-control" type="Password" name="ConfirmPassword" id="ConfirmPassword">
                </div>

                  <div class="admin-action-container">
                      <a href="Dashboard.php" class="btn-lg warning"><i class="fas fa-arrow-left"></i>Back TO Dashboard</a>
	                    <button type="submit" name="submit" class="btn-lg success"><i class="fas fa-check"></i>Publish</button>	
                    </div>
      </form>
     </div>
    </div>
      <!-- left side area end -->
      <div class="table-container">
      <p>Existing Admins</p>
          <div class="responsive-table">
                <table>
                    <thead>
                      <tr>
                        <th>No. </th>
                          <th>Date&Time</th>
                           <th>Username</th>
                             <th>Action</th>
                      </tr>                     
                    </thead>
                <?php
                global $ConnectingDB;
                $sql = "SELECT * FROM admins ORDER BY id desc";
                $Execute = $ConnectingDB->query($sql);
                $SrNo = 0;
                while($DataRows=$Execute->fetch()){
                $AdminId = $DataRows["id"];
                $DateTime=$DataRows["datetime"];
                $AdminUsername= $DataRows["username"];
                $SrNo++;
           
              ?>
              <tbody>
                 <tr>
                  <td><?php echo htmlentities($SrNo); ?></td>
                  <td><?php echo htmlentities($DateTime); ?></td>
                  <td><?php echo htmlentities($AdminUsername); ?></td>
                   <td><a class="btn delete" href="DeleteAdmin.php?id=<?php echo $AdminId; ?>">Delete</a></td>
                 </tr>
              </tbody>
              <?php } ?>
          </table>

         </div>

 <!-- end right side area -->
     </div>	
   </div>
 </section>
  </div>
  </div>

<script src="assets/js/adminpanel.js"></script>
</body>
</html>   