<?php
  if (!empty($_POST)) {
    $validatiesoort = $_POST['hiddenveld'];
    if ($validatiesoort == "Registratie") {
      include "registratievalidatie.php";
    }
    if ($validatiesoort == "Inloggen") {
      include "inlogvalidatie.php";
    }
  }
 ?>
