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
  <div id = "divinhoud" class = "clsinhoud">
    <div id = "divbloginvoer" class = "clsbloginvoer">
        <center><br>
        <table>
        <tr>
          <td>
            Voeg categorie toe:
          </td>
          <td>
            <input type = "text" id = "txtNewCategorie" name = "Newcategorie">
          </td>
          <td>
            <button onClick="JavaScript: MaakCategorie();">OK</button>
          </td>
          <td>
            <button onclick="window.location.href='Beheerartikelen.php'"> Beheer Artikelen</button>
          </td>
        </tr>
        </table>
        <fieldset>
          <h1>Schrijf artikel:</h1>
        <table>
        <tr>
          <td><input type="checkbox" id= "reactiestoestaan" value="1">Reacties toegestaan</td>
        </tr>
        </table>
        <table>
        <tr>
          <td>Naam artikel</td><td><b>Categorie:</b></td>
        </tr>
        <tr>
          <td><input type = "text" id = "artikelNaam" name = "artikelNaam" size= "60%" ></td>
          <td>
            <?php
              include 'haalcatogorieen.php';
            ?>
          </td>

        </tr>
        <table>
        <br>
        artikel:<br>
        <textarea id = "artContent" rows = "10" cols = "140"></textarea><br>
        <input type = "submit" name = "Plaatsartikel" value = "plaats artikel" onClick="JavaScript: PlaatsArtikel();">
        </fieldset></center>
    </div>
  </div>

</body>
</html>
