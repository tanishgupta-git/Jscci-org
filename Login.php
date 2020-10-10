<?php require_once("INCLUDES/DB.php");?>
<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>

<?php 
  if(isset($_SESSION["NccADMIN_Id"])){
    Redirect_to("Dashboard.php");
      }
   if(isset($_POST["Submit"])){
      $Username = $_POST["Username"];
       $Password = $_POST["Password"];
      if(empty($Username)||empty($Password))
      {
       $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("Login.php");
      }
  else
    {
      $Found_Account =Login_Attempt($Username,$Password);
       if($Found_Account){
        $_SESSION["NccADMIN_Id"] = $Found_Account["id"];
         $_SESSION["NccAdminname"] = $Found_Account["username"];
         $_SESSION["SuccessMessage"] = "Wellcome ".$_SESSION["FitAdminName"];
           if (isset($_SESSION["TrackingURL"])) {
         Redirect_to($_SESSION["TrackingURL"]);
        }else{
        Redirect_to("Dashboard.php");
      }
     }else
       {
        $_SESSION["ErrorMessage"] = "Incorrect Username/Password";
            Redirect_to("Login.php");
      }
 
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
     <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

           <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Poppins:wght@700&display=swap" rel="stylesheet">
             <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
         <!--responsive login page design-->
           <link rel="stylesheet" type="text/css" href="assets/css/adminpanel.css">
            <title>Login</title>
</head>
<body style="background:#3b3b3b;">

<!-- Main Area Start -->
   <section class='login'>
       <div class="container d-flex justify-content-center">
        <div class="col-md-6">
           <?php 
            echo ErrorMessage();
               echo SuccessMessage();
          ?>
         <!-- from container start -->
          <div class="">
                  <div class="">
                     <h3>Admin Login</h3>

               <div class="">
                  <form class="" action="Login.php" method="post">
                      <div class="user-input"> 
                           <input type="text" class="form-control" name="Username" id="username" placeholder="username" value="" autocomplete="off">
                        </div>
                  <div class="user-input">              
                      <input type="password" class="form-control" name="Password" id="password" placeholder="password" value="">
                 </div>
            <input type="submit" name="Submit" value="Login">
            </form>
           </div>
      </div>
      <div class="public-message">Only admins are allowed to logged in</div>
      </div>
     </div>
    </div>
    </section>
<!-- main area end -->

</body>
</html>