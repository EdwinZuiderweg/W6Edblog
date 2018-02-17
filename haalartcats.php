 <?php
    $artid =  $row["Artnr"];
    $sql = "SELECT categorieen.catnaam FROM categorieen INNER JOIN ArtCats ON categorieen.catid = ArtCats.catnr WHERE ArtCats.artikelnr = $artid";
    $resultcats = $conn->query($sql);

    if ($resultcats->num_rows > 0) {
      echo "<font size=\"2\"><center><i>Categorie:";

      while($rowcats = $resultcats->fetch_assoc()) {
        echo " ". $rowcats["catnaam"];
      }
      echo "</font></i></center><br>";
    }
?>
