<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "POST") {
  if (isset($_GET['name']) and isset($_GET['artikel'])) {
    $artnaam = $_GET['name'];
    $artinhoud = $_GET['artikel'];
    $magreageren = $_GET['allowreacties'];

    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "INSERT INTO Artikelen (Artikelnaam, Artikelinhoud, allowreacties) VALUES ('$artnaam', '$artinhoud', $magreageren)";
      if ($conn->query($sql)===TRUE){
        $last_id = mysqli_insert_id($conn);
        echo $last_id;
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
