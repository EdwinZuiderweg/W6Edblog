<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "POST") {
  if (isset($_GET['catnaam'])) {
    $catnaam = $_GET['catnaam'];
    $catid = $_GET['catid'];
    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "INSERT INTO categorieen (catid,catnaam) VALUES ($catid,'$catnaam')";
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
