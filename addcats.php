<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "POST") {
  if (isset($_GET['catnaam'])) {
    $catnaam = $_GET['catnaam'];
    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "INSERT INTO categorieen (catnaam) VALUES ('$catnaam')";
      if ($conn->query($sql)===TRUE){
        echo "insertOK";
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
