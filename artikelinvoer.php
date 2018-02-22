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
      <fieldset>
      Voeg categorie toe:
      <input type = "text" id = "txtNewCategorie" name = "Newcategorie">
      <button onClick="JavaScript: MaakCategorie();">OK</button>

      <span id = "spanBeheerartikelen"><button onclick="window.location.href='Beheerartikelen.php'">Beheer Artikelen</button></span>
      </fieldset>
      <fieldset>

      <b>Categorieen:</b><br>
      <div id = "divcategorieen">
      <?php
        include 'haalcatogorieen.php';
      ?>
      </div>
      <div id = "NewArticle">

        <b><Font Size = "5">Schrijf artikel:</font></b><br><br>
        <b><Font Size = "3">Titel: </font></b><input type = "text" id = "artikelNaam" name = "artikelNaam" size= "60%" >
        Reacties toegestaan:<input type="checkbox" id= "reactiestoestaan" value="1"><br><br>
        <b><Font Size = "3">Artikel:</font></b><br>
         <textarea id = "artContent" rows = "10" cols = "140"></textarea><br><br>
         <input type = "submit" name = "Plaatsartikel" value = "plaats artikel" onClick="JavaScript: PlaatsArtikel();">
       </div>
    </fieldset>
  </div>

</body>
</html>
