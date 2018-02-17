<!DOCTYPE = html>
<html>
<head>

<title>GorillaBlog</title>

<meta charset = utf-8>

<meta name = description  content="gorillablog">
<meta name = keywords content = "gorillablog">
<link rel="stylesheet" href="blogstyle.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script>
  function Selectartcat(catnr) { //haal de artikelen per geselecteerde categorie
    if (catnr!= "") {
        var xhttp = new XMLHttpRequest();
        var myURL = "haalcatartikelen.php?catid=" + catnr;
        xhttp.open("GET", myURL, false);
        xhttp.send();
        var artikeldiv = document.getElementById("divartikelen");
        artikeldiv.innerHTML = xhttp.responseText;
    }
  }

  //******************************************************************************************
  function Plaatscomment(artnr) {
    var txtcomment = "artcommentform" + artnr;
    var Inhoud = document.getElementById(txtcomment);
    alert("so far so good!");
    if (Inhoud.value != "") {
      var xhttp = new XMLHttpRequest();
      var myURL = "plaatsreactie.php?reactie=";
      myURL += Inhoud.value + "&artnr=" + artnr;
      xhttp.open("POST", myURL, false);
      xhttp.send();
      alert(xhttp.responseText);
      Inhoud.value = "";
    }
  }

</script>

Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div id = "divheader" class = "clsheader">
    <center>GorillaBlog</center>
    <button type="button" class="btn btn-success">Success</button>
  </div>
  <div id = "divcontainer">
  <div id = "divmenu" class = "clsmenu">
    <center><b>Filter categorie:</b></center><br>
      <!--<select id = "categorie" name = "selcat" onChange= "Selectartcat(this.value)">-->
      <?php
        include 'haalcatsblog.php';
      ?>

      <input type="radio" name="categorie" value="allecats" onClick = "Selectartcat(this.value)">Alles

      <!--</select>-->

  </div>
  <div id = "divartikelen" class = "clsvartikelen">
  <?php
    include 'haalalleartikelen.php';
  ?>
  </div>
  </div>
</body>
</html>
