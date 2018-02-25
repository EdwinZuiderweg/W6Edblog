<!DOCTYPE = html>
<html>
<head>
<title>GorillaBlog</title>

<meta charset = utf-8>

<meta name = "description"  content="gorillablog">
<meta name = "keywords" content = "gorillablog">
<link rel="stylesheet" href="blogstyle.css">
<script src= "artikelinvoer.js"></script>
</head>

<body>
  <div id = "divheader" class = "clsheader">
    <center>GorillaBlog</center>
  </div>
  <br><br>

  <div id = "divartikelinvoer" class = "clsinhoud">
    <?php
      $blnSchrijfrechten = false;
      include "sessiecontrole.php";
      if (!$blnSchrijfrechten) {
        //geef melding dat de gebruiker niet mag schrijven
        echo "U heeft helaas geen schrijfrechten";
      }
      else {
        echo "<fieldset>";
        echo "Voeg categorie toe:";
        echo "<input type = \"text\" id = \"txtNewCategorie\" name = \"Newcategorie\">";
        echo "<button onClick=\"JavaScript: MaakCategorie();\">OK</button>";
        echo "<span id = \"spanBeheerartikelen\"><button onClick= window.location.href='Beheerartikelen.php'>Beheer Artikelen</button></span>";
        echo "</fieldset>";
        echo "<fieldset>";

        echo "<b>Categorieen:</b><br>";
        echo "<div id = \"divcategorieen\">";

        include 'haalcatogorieen.php';

        echo "</div>";
        echo "<div id = \"NewArticle\">";

        echo "<b><Font Size = \"5\">Schrijf artikel:</font></b><br><br>";
        echo "<b><Font Size = \"3\">Titel: </font></b><input type = \"text\" id = \"artikelNaam\" name = \"artikelNaam\" size= \"60%\" >";
        echo "<b>Reacties toegestaan:</b><input type=\"checkbox\" id= \"reactiestoestaan\" value=\"1\"><br><br>";
        echo "<b><Font Size = \"3\">Artikel:</font></b><br>";
        echo "<textarea id = \"artContent\" rows = \"10\" cols = \"140\"></textarea><br><br>";
        echo "<input type = \"submit\" name = \"Plaatsartikel\" value = \"plaats artikel\" onClick=\"JavaScript: PlaatsArtikel();\">";
        echo "</div>";
        echo "</fieldset>";
        //bouw de rest vd pagina op
      }
    ?>

  </div>

</body>
</html>
