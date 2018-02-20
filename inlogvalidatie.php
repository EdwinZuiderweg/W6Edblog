<?php
  if (!empty($_POST)) {
    $gebruikersnaam = $_POST['username'];
    $wachtwoord = $_POST['password'];
    include 'connectdb.php';
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "SELECT wachtwoord, Rechten FROM Gebruikers where username = '$gebruikersnaam'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $PWdb =  $row["wachtwoord"];
        $Rechten = $row["Rechten"];
        //$PWdb = mysql_result($result, 0);
        if ($PWdb !=  $wachtwoord) {
          echo  "<div id = \"divfoutboodschap\">";
          echo "Wachtwoord fout.";
          echo  "</div>";
        }
        else {
          if ($Rechten ==  "auteur") {
            header("Location: artikelinvoer.php");
          }
          else {
            echo  "<div id = \"divfoutboodschap\">";
            echo "Je hebt helaas onvoldoende rechten om te mogen schrijven.";
            echo  "</div>";
          }
        }
      }
     else {
        echo  "<div id = \"divfoutboodschap\">";
        echo "Gebruikersnaam incorrect.";
        echo  "</div>";
      }
    }
   }

 ?>
