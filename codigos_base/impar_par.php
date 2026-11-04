<?php
function parOUimpar($num) {
    if ($num %2 == 0) {
        return "par";
    } else {
        return "Impar";
    }
}
echo parOUimpar(7);
?>