<?php

function OpenCon()
 {
              $servername = "remotemysql.com";
              $username = "PiqrRdLJCn";
              $password = "9J95xkbgQa";
              $db = "PiqrRdLJCn";

      $conn = mysqli_connect($servername, $username, $password,$db) or die("Connect failed: %s\n". $conn -> error);

   

 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>