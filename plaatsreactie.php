<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "POST") {
  if (isset($_GET['reactie']) and isset($_GET['artnr'])) {
    $reactie = $_GET['reactie'];
    $artid = $_GET['artnr'];
    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "INSERT INTO Reacties (artikelid, reactie) VALUES ('$artid', '$reactie')";
      if ($conn->query($sql)===TRUE){
        echo "reactie succesvol geplaatst";
      }
      else {
        echo $sql;
      }
    }
  }
  else {
    http_response_code(400);
  }
}

 ?>
