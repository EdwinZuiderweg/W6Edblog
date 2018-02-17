 <?php
     //haal eventuele reacties op het artikel
    $artid =  $row["Artnr"];
    $sql = "SELECT reactienr, artikelid, reactie FROM Reacties WHERE artikelid = $artid";
    $resultcom = $conn->query($sql);

    if ($resultcom->num_rows > 0) {
      $divcomment = "divcomment" . $rijnr;
      echo "<div id = \"" . $divcomment . "\" class = \"clscomment\">";
      echo "<br><hr><b>Reacties:</b>";
      echo "<br><ul>";

      while($rowcomments = $resultcom->fetch_assoc()) {
        echo "<li>";
        echo "<i>Anoniem: ". $rowcomments["reactie"]  . "</i>";
        echo "</li>";
      }
      echo "</ul>";
      echo "<hr></div>";
    }
?>
