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
         echo "<table>";
         echo "<th>Nummer</th><th>Titel</th><th>Inhoud</th><th>Reageren toegestaan</th><th>verwijder</th>";
         while($row = $result->fetch_assoc()) {
            $blnReageren = $row["allowreacties"];
            $artid = $row["Artnr"];
            if ($blnReageren == 1) {
              $strreact = "ja";
            }
            else {
              $strreact = "nee";
            }
            echo "<tr>";
            echo "<td>" . $row["Artnr"] . "</td>";
            echo "<td>" . $row["Artikelnaam"] . "</td>";
            echo "<td>" . $row["Artikelinhoud"] . "</td>";
            //echo "<td><select>";
            echo "<td><select onchange=\"ReactiesAanUitzetten(" . $artid . ",this.value)\">";

            if ($strreact == "ja") {
              echo "<option selected value= \"ja\"> ja</option>";
              echo "<option value= \"nee\">nee</option>";
            }
            else {
              echo "<option  value= \"ja\"> ja</option>";
              echo "<option selected value= \"nee\">nee</option>";
            }
            echo "</select></td>";
            //echo "<td>" . $strreact . "</td>";

            $echostr = "<input type = \"submit\" name = \"Verwijder\" value = \"verwijder\"";
            $echostr.=  "onClick=\"JavaScript: Verwijderartikel(" . $artid . ");\">";
            echo "<td>" . $echostr . "</td>";

            $sql = "SELECT reactienr, artikelid, reactie FROM Reacties WHERE artikelid = $artid";
            $resultcom = $conn->query($sql);
            if ($resultcom->num_rows > 0) {
              while($rowcomments = $resultcom->fetch_assoc()) {
                echo "<tr>";
                echo "<td><b>reactie:</b></td>";
                echo "<td>";
                echo "<i>" . $rowcomments["reactie"]. "</i>";
                echo "</td>";
                $echostr = "<input type = \"submit\" name = \"Verwijder\" value = \"verwijder\"";
                $echostr.=  "onClick=\"JavaScript: Verwijderreactie(" . $rowcomments["reactienr"] . ");\">";
                echo "<td>". $echostr ."</td>";
                echo "</tr>";
              }
            }
            echo "</tr>";
         }
         echo "</table>";
       }
       else {
         echo "0 results";
       }
     }
?>
