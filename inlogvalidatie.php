<?php
  if (!empty($_POST)) {
    $gebruikersnaam = $_POST['username'];
    $wachtwoord = $_POST['password'];
    include 'connectdb.php';
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else {
      //update stuurtabel formsoort, zodat deze wordt ingeladen bij herladen pagina
      $sql = "UPDATE formsoort SET formnaam = 'inlogform'" ;
      $result = $conn->query($sql);

      $sql = "SELECT wachtwoord, Rechten FROM Gebruikers where username = '$gebruikersnaam'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $PWdbhash =  $row["wachtwoord"];
        echo $PWdbhash . "<br>" . $wachtwoord . "<br>";
        $Rechten = $row["Rechten"];

        if (!password_verify($wachtwoord,$PWdbhash)) {
          echo  "<div id = \"divfoutboodschap\">";
          echo "Wachtwoord fout.";
          echo  "</div>";
        }
        else {
          if ($Rechten ==  "auteur") {
            //nu loggen we in
            session_start();
            $_SESSION["username"] = $gebruikersnaam;
            $_SESSION["password"] = $wachtwoord;
            //$_SESSION["password"] = $PWdbhash;
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
