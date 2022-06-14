<?php
session_start();
$stmt = NULL;
$_SESSION['loginstate'] = NULL;
$_SESSION['loginerror'] = NULL;
//Database Login
require_once('connectDatabase.php');


//Check for $_POST Variables
if(!isset($_POST['username'], $_POST['password'])){
  exit('Username or password was not received!');
}

$localcon = OpenCon();
//Send MySQLi Query
if($stmt = $localcon->prepare('SELECT id, password FROM users WHERE username = ?')){
  //Parameter Binding
  $stmt->bind_param('s', $_POST['username']);
 if(!$stmt->execute()) {
  echo "Query failed: ".$stmt->error;
}
  //Store result to compare to database
$stmt->store_result();

  if($stmt->num_rows > 0){
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    if(password_verify($_POST['password'], $password)){
      session_regenerate_id();

      $_SESSION["loggedin"] = TRUE;
      $_SESSION["username"] = $_POST["username"];
      $_SESSION["userid"] = $id;
      
      CloseCon($localcon);
  header("Location: ../index.php", TRUE, 301);
  die();
    }else{

      // Wrong Password
      $_SESSION["loginstate"] = "invalidinput";
      
      CloseCon($localcon);
      header("Location: ./login.php", TRUE, 301);
      die();
    }
    
  }else{
  
    // Wrong username
      $_SESSION["loginstate"] = "invalidinput";
      $_SESSION["loginerror"] = "username";
      CloseCon($localcon);
    
      header("Location: ./login.php", TRUE, 301);
      die(); 
  }
  $stmt->close();


  
  
  
}
?>
