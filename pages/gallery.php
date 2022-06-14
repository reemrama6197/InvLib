<?php
session_start();
ob_start();
?>

<!DOCTYPE html>

<html>
<head>

<title>Inventory List</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

  
<body id="top">

<div class="bgded" style="background-image:url('../images/demo/backgrounds/books.jpg');">
  <div class="overlay">


    <div class="wrapper row0">
      <div id="topbar" class="clear">

        <div class="fl_left">
          <ul class="nospace inline pushright">
            <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
            <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
          </ul>
        </div>
        <div class="fl_right">
          <ul class="faico clear">
            <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="faicon-pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
          </ul>
        </div>


      </div>
    </div>

    <div class="wrapper row1">
      <header id="header" class="clear">


        <div id="logo" class="fl_left">
          <h1><a href="../index.php">Inventory List</a></h1>
        </div>
<?php
require_once('menuitems.php');
printmenu();
?>

      </header>
    </div>


  </div>
</div>


<div class="wrapper row2">
  <div id="breadcrumb" class="clear">

    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="./gallery.php">Inventory List</a></li>
    </ul>

  </div>
</div>


<div class="wrapper row3">
  <main class="container clear">


    <div class="content">

      <a style= float:right href="https://invlib.reemrama6197.repl.co/pages/newitem.php"><b>Add Book</b></a>
      
      
      <div id="gallery">
        <figure>
          <header class="heading">Books available now: </header>
          <ul class="nospace clear">
            
            
            <?php

include 'connectDatabase.php';
$conn = OpenCon();

              
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              
              $sql = "SELECT title, isbn FROM inventorydata WHERE active=1";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {

                echo "<div id='div_top_hypers'>
                <ul id='ul_top_hypers'>";

                while($row = $result->fetch_assoc())                   {              
                  echo "<li first'><a href='https://invlib.reemrama6197.repl.co/pages/item.php?isbn=" . $row["isbn"] . "'>" . $row["title"]. "</a></li>";
                  
                 
                  }
                echo "</ul> </div>";
              } else {
                echo "0 results";
              }


              
                
              $conn->close();
              ?>


            
           
          </ul>

        </figure>
      </div>
    </div>


    <div class="clear"></div>
  </main>
</div>


<div class="wrapper row4">

<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
