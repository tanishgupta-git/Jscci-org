<?php 
function Redirect_to($New_Location){
header("Location:".$New_Location);
exit;
}
// checking the Existence of user 
function CheckUserExistsOrNot($Username){
global $ConnectingDB ;
$sql = "SELECT username FROM admins WHERE username=:userName";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':userName',$Username);
$stmt->execute();
$Result = $stmt->rowcount();
if($Result==1)
  {
    return true;
  }
else
  {
  return false;
   }
}
// end fo checking the existence of user

// Login attempt of user 
function Login_Attempt($Username,$Password){
global $ConnectingDB;
    $sql = "SELECT * FROM admins WHERE username=:userName AND password=:passWord LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName',$Username);
    $stmt->bindValue(':passWord', $Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if($Result==1){
      return $Found_Account=$stmt->fetch();
    }
    else
    {
      return null;
    }
}
// end of login attempt of user 

// Confirm Login Function

function Confirm_Login(){
  if(isset($_SESSION["NccADMIN_Id"])){
    return true;
  }
  else{
    $_SESSION["ErrorMessage"] = "Login Required";
    Redirect_to("Login.php");
  }
}
// end of confirm login function


//  function for counting the query

function CountQuery($Query){
                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM $Query";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalFound = array_shift($TotalRows);
                        echo $TotalFound;
}
// end of function for counting 

?>
