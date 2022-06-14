<?php
  session_start();
$_SESSION['newitemstate'] = NULL;
  if(isset($_POST['Title'], $_POST['isbn'],$_POST['author'],$_POST['price'],$_POST['nbofpages'],$_POST['publicationdate'])){
    require_once('connectDatabase.php');
    $localcon = OpenCon();
              
              // Check connection
              if ($localcon->connect_error) {
                die("Connection failed: " . $localcon->connect_error);
              }
              
              $sql = "SELECT isbn FROM inventorydata WHERE isbn='".$_POST['isbn']."'";
              $result = $localcon->query($sql);
              
              if ($result->num_rows > 0) {

                  echo'
                  <script>
                  window.alert("Book already exists in database");
                      </script>';
                                  
                  }
                    else {
                     if($stmt = $localcon->prepare('INSERT INTO inventorydata (active, title, isbn, author, price, nbOfPAges,                                    publicationDate) VALUES (?,?,?,?,?,?,?)')){
        //Parameter Binding
          $a='1';
        $stmt->bind_param('sssssss',"1",$a, $_POST['Title'],                       $_POST['isbn'],$_POST['author'],$_POST['price'],$_POST['nbofpages'],$_POST['publicationdate']);
          
        if(!$stmt->execute()) {
        echo "Query fehlgeschlagen: ".$stmt->error;
          $_SESSION['newitemstate'] = 'queryerror';
      }else{
          $_SESSION['newitemstate'] = 'success';
           
          
      
          
          echo'
      <script>
          window.alert("success");
          </script>
          <script type="text/javascript">
          window.location.href = \'https://invlib.reemrama6197.repl.co/pages/newitem.php\';
          </script>';
      }
        }
              }

              $localcon->close();
            
} 
  else{
    $_Session['newitemstate'] = 'missingpost';
    echo 'missing post';
      
  }