<?php
session_start();

function printmenu(){
  echo '<nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="https://invlib.reemrama6197.repl.co/index.php">Home</a></li>
          <li class="active"><a href="https://invlib.reemrama6197.repl.co/pages/gallery.php">Inventory List</a>
          </li>';
                if(!isset($_SESSION['loggedin']))
                {
                    echo '<li class ="active"><a href="https://invlib.reemrama6197.repl.co/pages/login.php">Login</a></li>';
                }
                else
                {
                  echo '<li class ="active"><a href="https://invlib.reemrama6197.repl.co/pages/profile.php">My Profile</a></li>';
                  echo '<li class ="active"><a href="https://invlib.reemrama6197.repl.co/pages/logout.php">Logout</a></li>'; 
                }
echo'   </ul>
        </nav>';
}
?>