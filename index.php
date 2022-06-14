<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Inventory Manager</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">


<div class="bgded" style="background-image:url('images/demo/backgrounds/books.jpg');">
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
          <h1><a href="index.php">Inventory Manager</a></h1>
        </div>
        <?php
        require_once('./pages/menuitems.php');
        printmenu();
        ?>


      </header>
    </div>



    <div class="wrapper row1">
      <section id="pageintro" class="clear">


        <p class="font-x2 capitalise">Local Library Inventory</p>
        <i class="fa fa-5x fa-pagelines"></i>
        <h2 class="font-x3 uppercase">Eat Read Sleep<br>
          </h2>
        <a class="btn" href="./pages/gallery.php">View book list</a>


      </section>
    </div>



  </div>
</div>




<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>