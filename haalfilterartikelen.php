<?php
$verb = $_SERVER['REQUEST_METHOD'];

if  ($verb == "GET") {
  if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];

    include 'connectdb.php';
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "SELECT Artnr, Artikelnaam, Artikelinhoud, allowreacties, Datum, INSTR(Artikelinhoud, '$filter') FROM Artikelen WHERE INSTR(Artikelinhoud, '$filter')>0 ORDER BY Datum DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $rijnr = 1;
        while($row = $result->fetch_assoc()) {
          $divartikel = "divartikel" . $rijnr ;
          $divtitel = "divtitel" . $rijnr ;
          $divcontent = "divcontent" . $rijnr;

          echo "<div id = \"" . $divartikel . "\" class = \"clsartikel\">";
              //<div id = "divtitel1" class = "clstitel">
            echo "<div id = \"" . $divtitel . "\" class = \"clstitel\">";
            $artdatum = date("d-m-Y", strtotime($row["Datum"])); //date_format($row["Datum"],"m");
            echo "<center><font size=\"6\"><b>" . $row["Artikelnaam"] ."</font></b> (" . $artdatum . ")</center>";
            include 'haalartcats.php';
            //echo "<h1>" . $row["Artikelnaam"] . "</h1>";
            echo "<hr></div>";
            echo "<div id = \"" . $divcontent . "\" class = \"clscontent\">";
            echo $row["Artikelinhoud"];
            echo "</div>";
            $magreageren = $row["allowreacties"];
            if ($magreageren == true) {
              include 'haalartreacties.php'; //haal de reacties bij een artikel
              include 'reactieform.php'; //maakt een invoerformulier om reacties te kunnen plaatsen
            }
          echo "</div>";
          $rijnr++;
        }
      }
      else {
        echo 0;
      }

    }
  }
  else {
    http_response_code(400);
  }
}
?>
