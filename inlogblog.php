
<!DOCTYPE = html>
<html>
<head>
<title>GorillaBlog</title>

<meta charset = utf-8>

<meta name = "description"  content="gorillablog">
<meta name = "keywords" content = "gorillablog">

<link rel="stylesheet" href="blogstyle.css">

  <script>
    function Maakformulier(formsoort) {
      if (formsoort == 1) {  //inlogformulier
        var xhttp = new XMLHttpRequest();
        var myURL = "inlogform.php";
        xhttp.open("GET", myURL, false);
        xhttp.send();
        var formulier = document.getElementById("divformulier");
        formulier.innerHTML = xhttp.responseText;
      }
      if (formsoort == 2) {  //registratieformulier
        var xhttp = new XMLHttpRequest();
        var myURL = "registratieform.php";
        xhttp.open("GET", myURL, false);
        xhttp.send();
        var formulier = document.getElementById("divformulier");
        formulier.innerHTML = xhttp.responseText;
      }
    }

    function Verwijderfoutboodschap() {
      var foutdiv = document.getElementById("divfoutboodschap");
      foutdiv.innerHTML = "";
    }
  </script>

</head>
<body>

  <div id = "divheader" class = "clsheader">
    <center>GorillaBlog</center>
  </div>
   <br>
   <center>
   <div id = "divinlog" class = "clsmenu">
     <button class = "btnlogin" onClick= "JavaScript: Maakformulier(1)">Inloggen</button >
     <button class = "btnlogin" onClick= "JavaScript: Maakformulier(2)">Registreer</button >
     <br>
     <fieldset>
     <div id = "divformulier">
      <?php
         include 'inlogform.php';
      ?>
   </div>
   </fieldset>
 </div><br><br>
     <?php
       include_once "validatie.php";
     ?>
 </center>


</body>
