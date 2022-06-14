<?php
session_start();

require_once('connectDatabase.php');
$localcon = OpenCon();

$SQL = $localcon->prepare("UPDATE inventorydata SET active=?, deletionComment=? WHERE isbn=?");
$uName = 0;
$comment=$_POST['comment1'];
$isbn=$_SESSION['deleteisbn'];
$SQL->bind_param('sss', $uName, $comment, $isbn);

$_SESSION['deleteisbn'] = NULL;
$SQL->execute();

header("Location: https://invlib.reemrama6197.repl.co/pages/gallery.php", true, 301);
?>
  