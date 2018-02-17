<<<<<<< HEAD

=======
<?php
  include_once "inlogvalidatie.php";  
?>
>>>>>>> aea703f2777a1c587c988851f5d5a5bed7a7ecc1
<!DOCTYPE = html>
<html>
<head>
<title>GorillaBlog</title>

<meta charset = utf-8>

<meta name = "description"  content="gorillablog">
<meta name = "keywords" content = "gorillablog">

<link rel="stylesheet" href="blogstyle.css">
<<<<<<< HEAD
  <script>

     function Verwijderfoutboodschap() {
        var foutdiv = document.getElementById("divfoutboodschap");
        foutdiv.innerHTML = "";
     }
  </script>
=======
>>>>>>> aea703f2777a1c587c988851f5d5a5bed7a7ecc1
</head>
<body>

  <div id = "divheader" class = "clsheader">
    <center>GorillaBlog</center>
  </div>
   <br>
   <center>
   <div id = "divinlog" class = "clsmenu">
     <h2>Inloggen:</h2>
     <fieldset>
     <form name = "inlogform" method = "post">
        Gebruikersnaam: <br>
<<<<<<< HEAD
        <input type = "text" name= "username" onfocus="Verwijderfoutboodschap()"><br>
        Wachtwoord: <br>
        <input type = "password" name = "password" onfocus="Verwijderfoutboodschap()"><br><br>
        <input type = "submit" name = "btninloggen" value ="inloggen" >
     </form>
   </fieldset>
 </div><br><br>
     <?php
       include_once "inlogvalidatie.php";
     ?>

 </center>

=======
        <input type = "text" name= "username"><br>
        Wachtwoord: <br>
        <input type = "password" name = "password"><br><br>
        <input type = "submit" name = "btninloggen" value ="inloggen" >
     </form>
   </fieldset>
   </div>
 </center>
>>>>>>> aea703f2777a1c587c988851f5d5a5bed7a7ecc1
</body>
