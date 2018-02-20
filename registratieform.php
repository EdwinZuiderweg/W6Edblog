 <?php
   echo "<form name = \"registratieform\" method = \"post\">";
   echo "<input type = \"hidden\" name= \"hiddenveld\" value = \"Registratie\" >";
   echo "Voornaam: <br>";
   echo "<input type = \"text\" name= \"voornaam\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
   echo "Achternaam: <br>";
   echo "<input type = \"text\" name= \"achternaam\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
   echo "Emailadres: <br>";
   echo "<input type = \"text\" name= \"email\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
   echo "Gebruikersnaam: <br>";
   echo "<input type = \"text\" name= \"username\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
   echo "Wachtwoord: <br>";
   echo "<input type = \"passwordini\" name = \"passwordini\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
   echo "Herhaal wachtwoord: <br>";
   echo "<input type = \"passwordrepeat\" name = \"passwordrepeat\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
   echo "<input type = \"submit\" name = \"btninloggen\" value =\"registreer\" >";
   echo "</form>";
?>
