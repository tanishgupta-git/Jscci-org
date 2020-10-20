<?php
session_start();
function ErrorMessage(){

	if(isset($_SESSION["ErrorMessage"])){
		$Output = "<div class=\"alert-parent\"><div class=\"alert alert-danger\">";
        $Output .= htmlentities($_SESSION["ErrorMessage"]);
        $Output .= "</div></div>";
        $_SESSION["ErrorMessage"]= null;
        return $Output;
	}
}

function SuccessMessage(){
if(isset($_SESSION["SuccessMessage"])){
	$Output = "<div class=\"alert-parent\"><div class=\"alert alert-success\">";
	$Output .= htmlentities($_SESSION["SuccessMessage"]);
	$Output .= "</div></div>";
	$_SESSION["SuccessMessage"]= null;
	return $Output;
     }	
   }
?>