<?php require_once("INCLUDES/Functions.php");  ?>
<?php require_once("INCLUDES/Sessions.php");   ?>
<?php 
        $_SESSION["NccADMIN_Id"]=null;
  		$_SESSION["NccAdminname"] =null;

        session_destroy();
        Redirect_to("Login.php");
?>