 <?php
   //haal categorieen uit de database en zet ze in de selectiebox
   include 'connectdb.php';

   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   else {
     $sql = "SELECT catid, catnaam FROM categorieen";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
       //echo  "<div id = \"divcategorieen\">";

        while($row = $result->fetch_assoc()) {
          $catid   = $row["catid"];
          $catnaam = $row["catnaam"];
          //echo("<option value  = \"" . $catid . "\">" . $catnaam);
          echo "<div id = \"divcategory\">";
          echo "<input type=\"checkbox\" id = \"cbcatlijst\" name=\"categorie_lijst\" value=\"" . $catid . "\">" . $catnaam . "<br>";
          echo "</div>";
        }
        //echo "</div>";
     }
   }


?>
