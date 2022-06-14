<?php
session_start();
ob_start();
extract($_GET, EXTR_PREFIX_ALL, "g");
require_once('connectDatabase.php');
$localcon = OpenCon();
$g_isbn=$_SESSION['deleteisbn'];
if($stmt = $localcon->prepare('SELECT * FROM inventorydata WHERE isbn = ?')){
  //Parameter Binding
  $stmt->bind_param('s', $g_isbn);
 if(!$stmt->execute()) {
  echo "Query failed: ".$stmt->error;
}
  //Store result to compare to database
$stmt->store_result();

  if($stmt->num_rows == 1){
    $stmt->bind_result($id, $active, $title, $coverimage, $author, $isbn, $price, $copiesAvailable, $lastPurchased, $nbOfPages, $publicationDate, $deletionComment);
    $stmt->fetch();
    // CloseCon($localcon);
  }else if($stmt->num_rows == 0){
    echo "No Item Found!";
    // CloseCon($localcon);
  }else{
    echo "Database Error!";

    var_dump($stmt->error);
    // CloseCon($localcon);
  }
}
    
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
    <form action="editItem.php" method="post" id="editBtn" style= float:right>
        <input type="submit" name="button1"
                value="Edit Book"/>
    </form>  

    <h2>Only change fields of attributes you want to alter!</h2>
    <?php
echo"<ul style='list-style-type:none;'>
  <form action='editItemDB.php' method='post'  id='editing'>
  <li> <b> Book Title: </b> </li>
  <input type='text' name='booktitle' value='" . $title . "'/>

  <li> <b> Author:  </b></li> 
  <input type='text' name='author' value='" . $author . "'/>

  <li> <b> ISBN: </b></li>
  <input type='text' name='isbn' value='" . $isbn . "'/>

  <li> <b> Price: </b></li> 
  <input type='text' name='price' value='" . $price . "'/>

  <li> <b> # of Available Copies: </b> </li> 
  <input type='text' name='copiesAv' value='" . $copiesAvailable . "'/>

  <li> <b> # of Pages: </b></li>
  <input type='text' name='nbofpages' value='" . $nbOfPages . "'/>

  <li> <b> Date of Publication: </b> </li>
    <input type='text' name='dateofpub' value='" . $publicationDate . "'/>

<input type='submit' action='editItemDB.php' name='buttonEdit'
                value='Edit Book'/>

</form>
</ul>
"
?>
    
    <div class="content">

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
