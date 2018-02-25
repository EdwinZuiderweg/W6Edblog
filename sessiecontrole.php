<?php
      session_start();
      if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $gebruikersnaam = $_SESSION['username'];

        $wachtwoord = $_SESSION['password'];
        include 'connectdb.php';
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        else {
          $sql = "SELECT wachtwoord, Rechten FROM Gebruikers where username = '$gebruikersnaam'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $PWdbhash =  $row["wachtwoord"];
            $Rechten = $row["Rechten"];
            if ((password_verify($wachtwoord,$PWdbhash)) && ($Rechten == "auteur")) {
               $blnSchrijfrechten = true;
            }
          }
        }
      }      
 ?>
