var shortcuts = {
    "gr" : "Groningen",
    "cg" : "Code Gorilla",
    "os" : "Olympische Spelen"
}

window.onload = function() {
    var ta = document.getElementById("artContent");
    var timer = 0;
    var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");

    update = function() {
      ta.value = ta.value.replace(re, function($0, $1) {
         return shortcuts[$1.toLowerCase()];
      });
    }

    ta.onkeydown = function() {
      clearTimeout(timer);
      timer = setTimeout(update, 200);
    }
}

//******************************************************************************************
function OpenBeheerArtikelen(Gebruikersnaam, Wachtwoord) {
  var myURL = "sessiestarter.php?username=" + Gebruikersnaam + "&password="  + Wachtwoord;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", myURL, false);
  xhttp.send();
  var blnsessiegestart  =xhttp.responseText;
  if (blnsessiegestart) {
    window.open("Beheerartikelen.php","_self");
  }
  else {
    alert("er ging iets mis");
  }
   //alert("test");

}

//******************************************************************************************
function PlaatsArtikel() {
  var Artnaam = document.getElementById("artikelNaam");
  var Inhoud = document.getElementById("artContent");
  //var Catid = document.getElementById("categorie");
  var MagReageren =  document.getElementById("reactiestoestaan");

  //probeer de checklist met categorieen uit te lezen.
  var catsselected = new Array();
  var catselnr;


  checkboxes = document.getElementsByName('categorie_lijst');
  catselnr = 0;
  for (var i=0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      catsselected.push(checkboxes[i].value);
    }
  }

  MagReageren.checked;
  //ook controleren of er minimaal 1 categorie is geselecteerd

  if ((Artnaam.value != "") && (Inhoud.value != "") && (catsselected.length > 0)) {
    //maak eerst een nieuw artikel aan en vraag id terug. Maak dan de "categorieartikel" aan
    var xhttp = new XMLHttpRequest();
    var myURL = "blogapi.php?name=";
    myURL += Artnaam.value + "&artikel=" + Inhoud.value + "&allowreacties=" + MagReageren.checked;

    xhttp.open("POST", myURL, false);
    xhttp.send();
    var artid = xhttp.responseText;
    //plaats nu de "artcats" (koppeltabel). Een record voor elke geselecteede categorie.
    myURL = "plaatsartcats.php?artnr=" + artid;
    myURL += "&catlijst=" + catsselected;
    //alert(myURL);
    xhttp.open("POST", myURL, false);
    xhttp.send();
    alert(xhttp.responseText);
    //Artnaam.value = "";
    //Inhoud.value = "";
  }
}

//******************************************************************************************
function MaakCategorie() {
  var Catnaam = document.getElementById("txtNewCategorie");
  if (Catnaam.value != "") {
    var myURL = "addcats.php?catnaam=";
    myURL +=  Catnaam.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", myURL, false);
    xhttp.send();
    if (xhttp.responseText == "insertOK") { //voeg hem ook toe aan checkboxlijst
      var divcatlijst = document.getElementById('divcategorieen');
      myURL = "haalcatogorieen.php";
      xhttp = new XMLHttpRequest();
      xhttp.open("GET", myURL, false);
      xhttp.send();
      divcatlijst.innerHTML = xhttp.responseText;
    }
  }
}
