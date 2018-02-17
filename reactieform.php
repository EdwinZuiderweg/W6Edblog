 <?php
    $divcommentform = "divcommentform" . $rijnr;
    $artcommentform = "artcommentform" . $row["Artnr"];
    $divartnr =  $row["Artnr"];

    echo "<div id = \"" . $divcommentform . "\" class = \"clscommentform\">";
    echo "<textarea id = \"" . $artcommentform . "\"></textarea>";
    $echostr = "<input type = \"submit\" name = \"Plaatscomment\" value = \"geef reactie\"";
    $echostr.=  "onClick=\"JavaScript: Plaatscomment(" . $divartnr . ");\">";
    echo $echostr;    

    echo "</div>";
?>
