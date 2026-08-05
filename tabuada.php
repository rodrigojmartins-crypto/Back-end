<?php 
#faça um codigo que calcule a tabuadaem em uma variavel com o nome de %tabuada,
#aplique o laço de repetição FOR

$numero = 7; 
$tabuada = "";

for ($i = 1; $i <= 10; $i++) {
    $tabuada .= "$numero x $i = " . ($numero * $i) . "<br>";
}

echo $tabuada;

?>