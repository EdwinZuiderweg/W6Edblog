<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "UPDATE") {
  if (isset($_GET['artnr'])) {
    $magreageren = $_GET['reactiestoestaan'];
    $artnr = $_GET['artnr'];

    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "UPDATE Artikelen SET allowreacties = " . $magreageren . " WHERE  artnr = " . $artnr;
      if ($conn->query($sql)===TRUE){
        echo "artikel " . $artnr . " aangepast";
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
