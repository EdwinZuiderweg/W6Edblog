<!DOCTYPE = html>
<html>
<head>
<title>GorillaBlog</title>

<meta charset = utf-8>
<meta name = description  content="gorillablog"

<meta name = keywords content = "gorillablog">

<link rel="stylesheet" href="blogstyle.css">

<script language= JavaScript" type="text/javascript">

  //********************************************
  function ReactiesAanUitzetten(artnr,ReactOnOff) {
    //alert(artnr +", " + ReactOnOff);
    var blnDoorgaan;
    blnDoorgaan = true;
    if (artnr != "") {
      if (ReactOnOff == "nee") {
        blnDoorgaan = confirm("Weet u zeker dat u reageren op dit artikel uit wilt zetten?");
      }
      if (blnDoorgaan == true) {
        var blnReactiestoestaan;
        if (ReactOnOff == "ja") {
          blnReactiestoestaan = true;
        }
        if (ReactOnOff == "nee") {
          blnReactiestoestaan = false;
        }
        var xhttp = new XMLHttpRequest();
        var myURL = "updateartikel.php?artnr=" + artnr + "&reactiestoestaan=" + blnReactiestoestaan;

        xhttp.open("UPDATE", myURL, false);
        xhttp.send();
        alert(xhttp.responseText);
      }
      else {
        alert("Update gecancelled");
      }
    }

  }

  //********************************************
  function Verwijderartikel(artnr) {

    if (artnr != "") {
      //alert("so far so good!");
      var xhttp = new XMLHttpRequest();
      var myURL = "verwijderartikel.php?artnr=" + artnr;
      xhttp.open("DELETE", myURL, false);
      xhttp.send();
      alert(xhttp.responseText);
    }

    //probeer de rij voor dit artikel dynamisch uit de tabel te halen
    var xhttp = new XMLHttpRequest();
    var myURL = "haalalleartikelentabel.php";
    xhttp.open("GET", myURL, false);
    xhttp.send();
    var divcontainer = document.getElementById("divcontainer");
    divcontainer.innerHTML = xhttp.responseText;
  }

  //********************************************
  function Verwijderreactie(reactienr) {
    if (reactienr != "") {
      //alert("so far so good!");
      var xhttp = new XMLHttpRequest();
      var myURL = "verwijderreactie.php?reactienr=" + reactienr;
      xhttp.open("DELETE", myURL, false);
      xhttp.send();
      alert(xhttp.responseText);
    }

    //probeer de rij voor deze reactie dynamisch uit de tabel te halen
    var xhttp = new XMLHttpRequest();
    var myURL = "haalalleartikelentabel.php";
    xhttp.open("GET", myURL, false);
    xhttp.send();
    var divcontainer = document.getElementById("divcontainer");
    divcontainer.innerHTML = xhttp.responseText;
  }

</script>
</head>
<body>
  <center><h1>Beheer Artikelen<h1><center>
  <div id = "divcontainer">
    <?php
      include 'haalalleartikelentabel.php';
    ?>
  </div>
</body>
</html>
