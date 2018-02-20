<?php
    echo "<form name = \"inlogform\" method = \"post\">";
    echo "<input type = \"hidden\" name= \"hiddenveld\" value = \"Inloggen\" >";
    echo "Gebruikersnaam: <br>";
    echo "<input type = \"text\" name= \"username\" onfocus=\"Verwijderfoutboodschap()\"><br>";
    echo "Wachtwoord: <br>";
    echo "<input type = \"password\" name = \"password\" onfocus=\"Verwijderfoutboodschap()\"><br><br>";
    echo "<input type = \"submit\" name = \"btninloggen\" value =\"inloggen\" >";
    echo "</form>";
?>
