<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "DELETE") {
  if (isset($_GET['artnr'])) {
    $artid = $_GET['artnr'];
    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "DELETE FROM Artikelen WHERE (Artnr = '$artid')";
      if ($conn->query($sql)===TRUE){
        echo "artikel succesvol verwijderd";
        //heel goed maar uiteraard moet de bijbehorende reacties dan ook wrden verwijderd.
        $sqlreacties = "DELETE FROM Reacties WHERE (artikelid = '$artid')";
        if ($conn->query($sqlreacties)===TRUE) {
          echo " en tevens de reacties er op";
        }
        $sqlcats = "DELETE FROM ArtCats WHERE (artikelnr = '$artid')";
        $conn->query($sqlcats);
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
