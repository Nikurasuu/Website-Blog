<?php
function sternebewertung($punkte) {
    $max_punkte = 5;
    echo("<img hidden>");
    return str_repeat('<img src="star.png" width="20" height="20">' , $punkte) .
        str_repeat('<img src="nostar.png" width="20" height="20">' , ($max_punkte - $punkte));
}
?>