<?php

$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "POST") {
  if ( isset($_GET['artnr']) and isset($_GET['catlijst'])) {
    // plaatsartcats.php?artnr=40&catlijst=6,4,9
    $catlijst = explode(",",$_GET['catlijst']);
    $artid = $_GET['artnr'];
    include 'connectdb.php';

    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    else {
      $aantal = count($catlijst);            
      for ($nr =  0; $nr < $aantal; $nr++) {
        $catid = $catlijst[$nr];
        $sql = "INSERT INTO ArtCats (artikelnr, catnr) VALUES ('$artid', '$catid')";
        $conn->query($sql);
      }
      echo "Artikel succesvol geplaatst.";
    }
  }
  else {
    http_response_code(400);
  }
}

 ?>
