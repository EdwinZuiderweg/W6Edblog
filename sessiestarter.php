<?php
   $verb = $_SERVER['REQUEST_METHOD'];
   if  (isset($_GET["username"]) && isset($_GET["password"])) {
     session_start();
     $gebruikersnaam = $_GET['username'];
     $wachtwoord = $_GET['password'];
     $_SESSION["username"] = $gebruikersnaam;
     $_SESSION["password"] = $wachtwoord;
     echo true;
   }
   else {
     echo false; //
   }   
 ?>
