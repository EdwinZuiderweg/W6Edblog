<?php
  if (!empty($_POST)) {
    $gebruikersnaam = $_POST['username'];
    $pw1 = $_POST['passwordini'];
    $pw2 = $_POST['passwordrepeat'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    include 'connectdb.php';
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "INSERT INTO Gebruikers (username, wachtwoord, Voornaam, Achternaam, Email, Rechten, Goedkeuring) VALUES";
      $sql .= "('$gebruikersnaam', '$pw1','$voornaam','$achternaam', '$email','auteur', 1)";
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
 ?>
