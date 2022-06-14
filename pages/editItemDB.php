<?php
session_start();

require_once('connectDatabase.php');
$localcon = OpenCon();

$SQL = $localcon->prepare("UPDATE inventorydata SET title=?, author=?, isbn=?, price=?, copiesAvailable=?, nbOfPages=?, publicationDate=?  WHERE isbn=?");

$title=$_POST['booktitle'];
$author=$_POST['author'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];
$noc=$_POST['copiesAv'];
$nop=$_POST['nbofpages'];
$dop=$_POST['dateofpub'];


$isbn=$_SESSION['deleteisbn'];
$SQL->bind_param('ssssssss', $title, $author, $isbn, $price, $noc, $nop, $dop, $isbn);

$_SESSION['deleteisbn'] = NULL;
$SQL->execute();

header("Location: https://invlib.reemrama6197.repl.co/pages/gallery.php", true, 301);
?>