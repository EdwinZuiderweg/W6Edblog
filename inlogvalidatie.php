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
<<<<<<< HEAD
          echo  "<div id = \"divfoutboodschap\">";
          echo "Wachtwoord fout.";
          echo  "</div>";
=======
           echo "<script>";
           echo "alert(\"Wachtwoord fout\")";
           echo "</script>";
>>>>>>> aea703f2777a1c587c988851f5d5a5bed7a7ecc1
        }
        else {
          if ($Rechten ==  "auteur") {
            header("Location: artikelinvoer.php");
          }
          else {
<<<<<<< HEAD
            //echo "<script>";
            //echo "fout = document.getElementById(\"divfoutboodschap\")";
            echo  "<div id = \"divfoutboodschap\">";
            echo "Je hebt helaas onvoldoende rechten om te mogen schrijven.";
            echo  "</div>";
            //echo "fout.innerHTML = \"Je hebt helaas onvoldoende rechten om te mogen schrijven.\")";
            //echo "alert(\"Gebruikersnaam incorrect\")";
            //echo "</script>";
=======
            echo "<script>";
            echo "alert(\"Je hebt helaas onvoldoende rechten om te mogen schrijven.\")";
            echo "</script>";
>>>>>>> aea703f2777a1c587c988851f5d5a5bed7a7ecc1
          }
        }
      }
      else {
<<<<<<< HEAD
        echo  "<div id = \"divfoutboodschap\">";            
        echo "Gebruikersnaam incorrect.";
        echo  "</div>";
=======
        echo "<script>";
        echo "alert(\"Gebruikersnaam incorrect\")";
        echo "</script>";
>>>>>>> aea703f2777a1c587c988851f5d5a5bed7a7ecc1
      }
    }
   }

 ?>
