<!DOCTYPE = html>
<html>
<head>
<title>GorillaBlog</title>

<meta charset = utf-8>
<meta name = description  content="gorillablog"

<meta name = keywords content = "gorillablog">

<link rel="stylesheet" href="blogstyle.css">
<script src= "Beheerartikelen.js"></script>

</head>
<body>
  <center><h1>Beheer Artikelen<h1><center>
  <div id = "divcontainer">

    <div id = "divheader" class = "clsheader">
      <center>GorillaBlog</center>
    </div>
    <br><br>
    <div id = "divartikelinvoer" class = "clsinhoud">
    <?php
      $blnSchrijfrechten = false;
      include "sessiecontrole.php";
      if ($blnSchrijfrechten) {
        include 'haalalleartikelentabel.php';
      }
      else {
        echo "U heeft helaas geen schrijfrechten";
      }

    ?>
    </div>
  </div>
</body>
</html>
