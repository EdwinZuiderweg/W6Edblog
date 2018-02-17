<?php
     include 'connectdb.php';
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
     else {
       //echo ("hij doet het!");
       $sql = "SELECT Artnr, Artikelnaam, Artikelinhoud, allowreacties ,Datum  FROM Artikelen ORDER BY Datum DESC";
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
         echo "0 results";
       }
     }
?>
