<?php
  if (!empty($_POST)) {

    $gebruikersnaam = $_POST['username'];
    $pw1 = $_POST['passwordini'];
    $pw2 = $_POST['passwordrepeat'];
    $pwversleuteld = password_hash($pw1, PASSWORD_DEFAULT);
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    include 'connectdb.php';
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else {
      //Update formsoort --> registratieform
      $sql = "UPDATE formsoort SET formnaam = 'registratieform'" ;
      $result = $conn->query($sql);
      //wachtwoordvalidatie
      $validatieok =  true;
      $uppercase = preg_match('@[A-Z]@', $pw1);
      $lowercase = preg_match('@[a-z]@', $pw1);
      $number    = preg_match('@[0-9]@', $pw1);
      if(!$uppercase || !$lowercase || !$number || strlen($pw1) < 8) {
        echo  "<div id = \"divfoutboodschap\">";
        if ((!$uppercase) && ($validatieok)) {
          echo "Wachtwoord moet een hoofdletter bevatten.";
          $validatieok =  false;
        }
        if ((!$lowercase) && ($validatieok)) {
          echo "Wachtwoord moet een kleine letter bevatten";
          $validatieok =  false;
        }
        if ((!$number) && ($validatieok)) {
          echo "Wachtwoord moet een cijfer bevatten.";
          $validatieok =  false;
        }
        if ((strlen($pw1) < 8) && ($validatieok)) {
          echo "Wachtwoord te kort: moet minstens 8 tekens bevatten";
          $validatieok =  false;
        }
        echo  "</div>";
      }
      //emailvalidatie
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo  "<div id = \"divfoutboodschap\">";
        echo  "Emailadres niet geldig.";
        echo  "</div>";
        $validatieok =  false;
      }
      //kijk of username al bestaat.
      if ($validatieok) {
        $sql = "SELECT username FROM Gebruikers where username = '$gebruikersnaam'";
        $result = $conn->query($sql);
        if ($result->num_rows >0) {
           echo  "<div id = \"divfoutboodschap\">";
           echo  "Gebruikersnaam al geregistreerd.";
           echo  "</div>";
           $validatieok =  false;
        }
      }

      if ($validatieok) {
        $sql = "INSERT INTO Gebruikers (username, wachtwoord, Voornaam, Achternaam, Email, Rechten, Goedkeuring) VALUES";
        $sql .= "('$gebruikersnaam', '$pwversleuteld','$voornaam','$achternaam', '$email','auteur', 1)";
        $result = $conn->query($sql);
        if ($result){
          echo  "<div id = \"divmelding\">";
          echo  "U bent geregistreerd";
          echo  "</div>";
        }
        else {
          echo $sql;
        }
      }
    }
  }
 ?>
