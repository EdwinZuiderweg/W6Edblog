<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "DELETE") {
  if (isset($_GET['reactienr'])) {
    $reactienr = $_GET['reactienr'];
    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "DELETE FROM Reacties WHERE (reactienr = '$reactienr')";
      if ($conn->query($sql)===TRUE){
        echo "reactie succesvol verwijderd";
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
