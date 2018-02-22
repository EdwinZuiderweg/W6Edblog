<?php
  include 'connectdb.php';
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else {
    $sql = "SELECT formnaam FROM formsoort";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $formnaam = $row["formnaam"];
    }
    //$row = $result->fetch_assoc();
    
    if ($formnaam == "inlogform") {

      include "inlogform.php";
    }
    if ($formnaam == "registratieform") {
      include "registratieform.php";
    }
  }
?>
